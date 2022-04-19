<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $appends = ['ingredients'];

    /**
     * Get all of the ingredient for the meal
     * 
     * @return Array
     */
    public function getIngredientsAttribute()
    {
        $ingredients = [];
        $links = MealHasIngredient::where('meal_id', $this->id)->get();

        foreach($links as $link) {
            try {
                $ingredients[] = [
                    'ingredient' => Ingredient::find($link->ingredient_id),
                    'qty' => $link->qty,
                    'link_id' => $link->id
                ];
                
            } catch (Exception $e) {
                // do something
            }
        }
        
        return $ingredients;
    }
}
