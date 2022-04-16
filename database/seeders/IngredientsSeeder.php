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
                'imgSrc' => 'https://images.ctfassets.net/6jpeaipefazr/1TOr5LlvLrYUqKCky4x7Xe/a93a8da6d9f1e52f2e8f5204c5374b56/co-op-red-peppers.jpg' 
            ],[ 
                'name' => 'Yellow Pepper', 
                'imgSrc' => 'https://www.bobtailfruit.co.uk/pub/media/catalog/product/l/a/large_94ce8779-3edd-4fa0-9abb-e73823170d23.jpg' 
            ],[ 
                'name' => 'Penne Pasta', 
                'imgSrc' => 'https://ecom-su-static-prod.wtrecom.com/images/products/11/LN_017162_BP_11.jpg' 
            ],[ 
                'name' => 'Meatballs', 
                'imgSrc' => 'https://www.ikea.com/gb/en/images/products/huvudroll-meatballs-frozen__0928072_pe789720_s5.jpg?f=s' 
            ],
        ];

        foreach($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }
    }
}
