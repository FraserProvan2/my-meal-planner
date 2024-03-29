<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanTemplate extends Model
{
    protected $fillable = ['user_id', 'template'];

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
            $plan_template = new Self();
            $plan_template->user_id = $user_id;
            $plan_template->template = json_encode(Self::getDefaultTemplate());
            $plan_template->save();
        }

        return $plan_template;
    }

    /**
     * Get template as json
     * 
     * @return Json template
     */
    public function getTemplateJson()
    {
        return json_decode($this->template);
    }

    /**
     * Returns default plan template
     * 
     * @return Array
     */
    public static function getDefaultTemplate()
    {
        return [
            "monday"    => ["breakfast" => 0, "lunch" => 1, "dinner" => 1],
            "tuesday"   => ["breakfast" => 0, "lunch" => 1, "dinner" => 1],
            "wednesday" => ["breakfast" => 0, "lunch" => 1, "dinner" => 1],
            "thursday"  => ["breakfast" => 0, "lunch" => 1, "dinner" => 1],
            "friday"    => ["breakfast" => 0, "lunch" => 1, "dinner" => 1],
            "saturday"  => ["breakfast" => 0, "lunch" => 1, "dinner" => 1],
            "sunday"    => ["breakfast" => 0, "lunch" => 1, "dinner" => 1],
        ];
    }
}
