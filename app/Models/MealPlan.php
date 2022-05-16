<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    use HasFactory;

    /**
     * Returns data in Plan Template format
     * 
     * @return Array
     */
    public function withMealData()
    {
        $plan = json_decode($this->plan, true);

        foreach($plan as $day => $meal_slots) {
            foreach($meal_slots as $meal_name => $value) {
                $plan[$day][$meal_name] = Meal::find($value);
            }
        }

        return $plan;
    }
}
