<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IngredientsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function no_auth_gets_redirect()
    {
        $this->get('/ingredients')
            ->assertStatus(302);
    }

    /** @test */
    public function auth_can_view_index()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $this->get('/ingredients')
            ->assertStatus(200);
    }

    /** @test */
    public function auth_can_see_edit_form()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $this->get('/ingredients/1')
            ->assertStatus(200)
            ->assertSeeText('Update');
    }

    /** @test */
    public function auth_can_store_new()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $data = ['name' => 'newIngredient'];

        $this->post('/ingredients', $data)
            ->assertStatus(302);

        $this->assertDatabaseHas('ingredients', $data);
    }

    /** @test */
    public function auth_can_update()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $data = ['name' => 'updatedName'];

        $this->patch('/ingredients/1', $data)
            ->assertStatus(302);

        $this->assertDatabaseHas('ingredients', $data);
    }

    /** @test */
    public function wrong_auth_cant_update()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(2))->assertAuthenticated();

        $data = ['name' => 'updatedName'];

        // User#2 is not author of Ingredient#1
        $this->patch('/ingredients/1', $data)
            ->assertStatus(302);

        $this->assertDatabaseMissing('ingredients', $data);
    }

    /** @test */
    public function auth_can_delete()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $this->delete('/ingredients/1')
            ->assertStatus(302);

        $this->assertDatabaseMissing('ingredients', [
            'name' => 'Red Pepper'
        ]);
    }

    /** @test */
    public function wrong_auth_cant_delete()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(2))->assertAuthenticated();

        // User#2 is not author of Ingredient#1
        $this->delete('/ingredients/1')
            ->assertStatus(302);

        $this->assertDatabaseHas('ingredients', [
            'name' => 'Red Pepper'
        ]);
    }
}
