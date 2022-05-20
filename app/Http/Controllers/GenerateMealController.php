<?php

namespace App\Http\Controllers;

use App\GeneratePlan;
use App\Models\Meal;
use App\Models\MealPlan;
use App\PlanGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class GenerateMealController extends Controller
{
    /**
     * Generate New Meal Plan
     */
    public function update()
    {
        $users_meals = Meal::where('user_id', Auth::id())->get();
        if (!$users_meals->count()) {
            return Redirect('/')->with('error', 'You must add some Meals first!');
        }

        $plan_generator = new PlanGenerator();

        // Delete existing plans
        MealPlan::where('user_id', Auth::id())
            ->delete();

        // Create meal plan
        $meal_plan = new MealPlan();
        $meal_plan->user_id = Auth::id();
        $meal_plan->plan = json_encode($plan_generator->generate());
        $meal_plan->save();

        return Redirect('/');
    }
}
