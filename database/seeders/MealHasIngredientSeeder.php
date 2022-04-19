<?php

namespace Database\Seeders;

use App\Models\MealHasIngredient;
use Illuminate\Database\Seeder;

class MealHasIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meal_has_ingredients = [
            // Meal 1
            [ 'meal_id' => 1, 'ingredient_id' => 1, 'qty' => 2 ],
            [ 'meal_id' => 1, 'ingredient_id' => 2, 'qty' => 2 ],
            [ 'meal_id' => 1, 'ingredient_id' => 3, 'qty' => '400g' ],
            [ 'meal_id' => 1, 'ingredient_id' => 4, 'qty' => 10 ],

            // Meal 2
            [ 'meal_id' => 2, 'ingredient_id' => 1, 'qty' => 5 ],
            [ 'meal_id' => 2, 'ingredient_id' => 2, 'qty' => 7 ],

            // Meal 3
            [ 'meal_id' => 3, 'ingredient_id' => 1, 'qty' => 2 ],
            [ 'meal_id' => 3, 'ingredient_id' => 3, 'qty' => '400g' ],

            // Meal 4
            [ 'meal_id' => 4, 'ingredient_id' => 2, 'qty' => 2 ],
            [ 'meal_id' => 4, 'ingredient_id' => 3, 'qty' => '400g' ],

            // Meal 5
            [ 'meal_id' => 5, 'ingredient_id' => 3, 'qty' => '900g' ],
        ];

        foreach($meal_has_ingredients as $meal_has_ingredient) {
            MealHasIngredient::create($meal_has_ingredient);
        }
    }
}
