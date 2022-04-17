<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = [
            [ 
                'name' => 'Red Pepper', 
                'user_id' => 1,
            ],[ 
                'name' => 'Yellow Pepper', 
                'user_id' => 1,
            ],[ 
                'name' => 'Penne Pasta', 
                'user_id' => 1,
            ],[ 
                'name' => 'Meatballs', 
                'user_id' => 1,
            ],
        ];

        foreach($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }
    }
}
