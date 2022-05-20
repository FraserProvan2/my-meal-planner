<?php

namespace Tests\Unit;

use App\Models\MealPlan;
use App\Models\User;
use App\ShoppingList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ShoppingListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_shopping_list()
    {
        $this->seedDatabase();
        $user = User::find(1);
        $this->actingAs($user)->assertAuthenticated();
        $this->mimicPlanTemplateHit($user->id);

        $this->get('/meal-plan/generate')
            ->assertStatus(302);

        $plan_record = MealPlan::where('user_id', Auth::id())->first();
        $shopping_list = (new ShoppingList($plan_record))->getList();

        $this->assertIsArray($shopping_list);
        $first_record_id = array_key_first($shopping_list);
        $this->assertArrayHasKey('name', $shopping_list[$first_record_id]);
        $this->assertArrayHasKey('qty', $shopping_list[$first_record_id]);
    }
}
