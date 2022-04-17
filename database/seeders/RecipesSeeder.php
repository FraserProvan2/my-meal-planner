<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipes = [
            [ 
                'name' => 'Katsu Curry', 
                'user_id' => 1,
                'steps' => 'lorem ipsum'
            ],[ 
                'name' => 'Thai Green Curry', 
                'user_id' => 1,
                'steps' => 'lorem ipsum'
            ],[ 
                'name' => 'Chicken Souvlaki', 
                'user_id' => 1,
                'steps' => 'lorem ipsum'
            ],[ 
                'name' => 'Pasta & Meatballs', 
                'user_id' => 1,
                'steps' => 'lorem ipsum'
            ],[ 
                'name' => 'Peri Chicken Burger', 
                'user_id' => 1,
                'steps' => 'lorem ipsum'
            ],
        ];

        foreach($recipes as $recipe) {
            Recipe::create($recipe);
        }
    }
}
