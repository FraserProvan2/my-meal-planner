<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MealsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function no_auth_gets_redirect()
    {
        $this->get('/meals')
            ->assertStatus(302);
    }

    /** @test */
    public function auth_can_view_index()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $this->get('/meals')
            ->assertStatus(200);
    }

    /** @test */
    public function auth_can_see_edit_form()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $this->get('/meals/1')
            ->assertStatus(200)
            ->assertSeeText('Update');
    }

    /** @test */
    public function auth_can_store_new()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $data = [
            'name' => 'newMeal',
            'steps' => 'someSteps',
            'servings' => 1
        ];

        $this->post('/meals', $data)
            ->assertStatus(200);

        $this->assertDatabaseHas('meals', $data);
    }

    /** @test */
    public function auth_can_update()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $data = [
            'name' => 'updatedName',
            'steps' => 'updatedSteps',
            'servings' => 5
        ];

        $this->patch('/meals/1', $data)
            ->assertStatus(302);

        $this->assertDatabaseHas('meals', $data);
    }

    /** @test */
    public function wrong_auth_cant_update()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(2))->assertAuthenticated();

        $data = [
            'name' => 'updatedName',
            'steps' => 'updatedSteps',
            'servings' => 5
        ];

        // User#2 is not author of Meal#1
        $this->patch('/meals/1', $data)
            ->assertStatus(302);

        $this->assertDatabaseMissing('meals', $data);
    }

    /** @test */
    public function auth_can_delete()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $this->delete('/meals/1')
            ->assertStatus(302);

        $this->assertDatabaseMissing('meals', [
            'name' => 'Red Pepper'
        ]);
    }

    /** @test */
    public function wrong_auth_cant_delete()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(2))->assertAuthenticated();

        // User#2 is not author of Meal#1
        $this->delete('/meals/1')
            ->assertStatus(302);

        $this->assertDatabaseHas('meals', [
            'name' => 'Pasta & Meatballs'
        ]);
    }
}
