<?php

namespace App;

use App\Models\Meal;
use App\Models\PlanTemplate;
use Illuminate\Support\Facades\Auth;

class PlanGenerator
{
    /**
     * Generate a new meal plan
     * 
     * @return Array
     */
    public function generate()
    {
        $plan_template = (array) $this->getPlanTemplate();
        $meals = $this->getShuffledMealsBySlot();

        foreach($plan_template as $day => $meal_slots) {
            foreach($meal_slots as $meal_name => $value) {
                if ($value == 0) {
                    continue;
                }

                if (!count($meals[$meal_name])) {
                    $meals = $this->getShuffledMealsBySlot();
                }

                $selected_meal = array_shift($meals[$meal_name]);
                $plan_template[$day][$meal_name] = $selected_meal->id;
            }
        }

        return $plan_template;
    }

    /**
     * Get shuffled meals by slot
     * 
     * @return array
     */
    private function getShuffledMealsBySlot()
    {
        $breakfast_options = [];
        $lunch_options = [];
        $dinner_options = [];

        $meals = Meal::where('user_id', Auth::id())->get();
        foreach($meals as $meal) {
            if ($meal->in_breakfast) $breakfast_options[] = $meal;
            if ($meal->in_lunch) $lunch_options[] = $meal;
            if ($meal->in_dinner) $dinner_options[] = $meal;
        }

        shuffle($breakfast_options);
        shuffle($lunch_options);
        shuffle($dinner_options);

        return [
            'breakfast' => $breakfast_options,
            'lunch' => $lunch_options,
            'dinner' => $dinner_options
        ];
    }

    /** 
     * Fetches users plan template
     * 
     * @return Array
    */
    private function getPlanTemplate()
    {
        $plan_template_json = (PlanTemplate::where('user_id', Auth::id())
            ->firstOrFail())->template;
    
        return json_decode($plan_template_json, true);
    }
}
