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
     * 
     * @return Array
     */
    public function getList()
    {
        // Sort meals ingredients into structure for calculating
        $list = [];
        foreach($this->getMeals() as $meal) {
            foreach($meal->ingredients as $link) {
                $list[$link['ingredient']->id]['name'] = $link['ingredient']->name;
                $list[$link['ingredient']->id]['qty'][] = $link['qty'];
            }
        }

        // Add total to ingredient total if numeric
        foreach($list as $id => $ingredient) {
            $amount = 0;
            foreach($ingredient['qty'] as $qty) {
                if (is_numeric($qty)) {
                    $amount = $amount + $qty;
                }
            }

            // Set qty total to list array 
            if (is_numeric($qty)) {
                $list[$id]['qty'] = $amount;
            }
        }

        return $list;
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
