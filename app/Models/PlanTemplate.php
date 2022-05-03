<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanTemplate extends Model
{
    use HasFactory;

    /**
     * Get AndOr Create Plan Template
     * 
     * @param int $user_id
     * 
     * @return PlanTemplate
     */
    public static function getAndOrCreate(int $user_id)
    {
        $plan_template = Self::where('user_id', $user_id)->first();
        if (!$plan_template) {
            $path = storage_path() . "/json/default-template.json";
            $default = json_encode(file_get_contents($path));

            $plan_template = new Self();
            $plan_template->user_id = $user_id;
            $plan_template->template = $default;
            $plan_template->save();
        }
       
        return $plan_template;
    }
}
