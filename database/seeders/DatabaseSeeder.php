<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(IngredientsSeeder::class);
        $this->call(MealsSeeder::class);
        $this->call(MealHasIngredientSeeder::class);
    }
}
