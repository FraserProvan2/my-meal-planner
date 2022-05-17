<?php

namespace Tests;

use App\Models\PlanTemplate;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Seeds Database
     * 
     */
    public function seedDatabase()
    {
        return $this->artisan("db:seed");
    }

    /**
     * Mimics plan template hit
     * 
     * @param int $user_id
     * 
     * @return PlanTemplate
     */
    public function mimicPlanTemplateHit($user_id)
    {
        return PlanTemplate::create([
            'user_id' => $user_id,
            'template' => json_encode(PlanTemplate::getDefaultTemplate())
        ]);
    }
}