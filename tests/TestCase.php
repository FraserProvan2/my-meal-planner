<?php

namespace Tests;

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
}