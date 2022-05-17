<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GenerateMealControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function no_auth_gets_redirect()
    {
        $this->get('/meal-plan/generate')
            ->assertStatus(302);
    }

    /** @test */
    public function redirect_with_error_if_has_no_meals()
    {
        User::factory()->count(1)->create();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $this->get('/meal-plan/generate')
            ->assertStatus(302);
    }

    /** @test */
    public function successuflly_creates_meal_plan()
    {
        $this->seedDatabase();
        $user = User::find(1);
        $this->actingAs($user)->assertAuthenticated();
        $this->mimicPlanTemplateHit($user->id);

        $this->get('/meal-plan/generate')
            ->assertStatus(302);

        $this->assertDatabaseHas('meal_plans', [
            'id' => 1,
            'user_id' => 1,
        ]);
    }
}
