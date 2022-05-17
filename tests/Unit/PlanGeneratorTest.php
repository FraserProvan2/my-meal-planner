<?php

namespace Tests\Unit;

use App\Models\PlanTemplate;
use App\Models\User;
use App\PlanGenerator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlanGeneratorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_shuffled_meals_returns_expected_structure()
    {
        $this->seedDatabase();
        $user = User::find(1);
        $this->actingAs($user)->assertAuthenticated();
        $this->mimicPlanTemplateHit($user->id);

        $plan_generator = new PlanGenerator();
        $plan = $plan_generator->generate();

        $this->assertArrayHasKey('monday', $plan);
        $this->assertArrayHasKey('tuesday', $plan);
        $this->assertArrayHasKey('wednesday', $plan);
        $this->assertArrayHasKey('thursday', $plan);
        $this->assertArrayHasKey('friday', $plan);
        $this->assertArrayHasKey('saturday', $plan);
        $this->assertArrayHasKey('sunday', $plan);

        $this->assertIsInt($plan['monday']['breakfast']);
        $this->assertIsInt($plan['monday']['lunch']);
        $this->assertIsInt($plan['monday']['dinner']);
    }
}
