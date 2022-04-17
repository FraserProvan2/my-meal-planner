<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Meal;
use Illuminate\Database\Seeder;

class MealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meals = [
            [ 
                'name' => 'Pasta & Meatballs', 
                'user_id' => 1,
                'servings' => 2,
                'steps' => 'lorem ipsum'
            ],
            [ 
                'name' => 'Yellow & Red Pepper Mix', 
                'user_id' => 1,
                'servings' => 1,
                'steps' => 'lorem ipsum'
            ],
            [ 
                'name' => 'Pasta with Red Pepper', 
                'user_id' => 1,
                'servings' => 1,
                'steps' => 'lorem ipsum'
            ],
            [ 
                'name' => 'Pasta with Yellow Pepper', 
                'user_id' => 1,
                'servings' => 1,
                'steps' => 'lorem ipsum'
            ],
            [ 
                'name' => 'Penne Pasta on its own with nothing', 
                'user_id' => 1,
                'servings' => 1,
                'steps' => 'lorem ipsum'
            ]
        ];

        foreach($meals as $meal) {
            Meal::create($meal);
        }
    }
}
