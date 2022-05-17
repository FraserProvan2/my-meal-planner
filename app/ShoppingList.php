<?php

namespace App;

use App\Models\Meal;
use App\Models\MealPlan;
use Illuminate\Support\Facades\Auth;

class ShoppingList
{
    protected $plan;

    public function __construct(MealPlan $plan) {
        $this->plan = json_decode($plan->plan, true);
    }

    /**
     * Gets shopping list
     */
    public function getList()
    {
        $meals = $this->getMeals();

        dd($meals);

        return 123;
    }

    /**
     * Gets shopping list meals
     * 
     * @return Array
     */
    private function getMeals()
    {
        $meal_ids = [];

        foreach($this->plan as $day) {
            foreach($day as $meal_id) {
                if ($meal_id != 0) {
                    $meal_ids[] = $meal_id;
                }
            }
        }

        $meals = [];
        foreach($meal_ids as $id) {
            $meals[] = Meal::where('user_id', Auth::id())->find($id);
        }
        
        return $meals;
    }
}
