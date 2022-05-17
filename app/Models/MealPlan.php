<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        foreach(json_decode($this->plan, true) as $day => $meal_slots) {
            foreach($meal_slots as $meal_name => $value) {
                $plan[$day][$meal_name] = Meal::where('user_id', Auth::id())->find($value);
            }
        }

        return $plan;
    }
}
