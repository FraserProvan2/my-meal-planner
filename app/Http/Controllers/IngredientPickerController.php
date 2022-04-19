<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Meal;
use App\Models\MealHasIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class IngredientPickerController extends Controller
{
    /**
     * Get all users created ingredients
     * 
     * @return JsonResponse
     */
    public function getIngredients()
    {
        return new JsonResponse(
            Ingredient::where('user_id', Auth::id())->get()
        );
    }

    /**
     * Get all ingredients for the meal
     * 
     * @param int $mealId
     * 
     * @return JsonResponse
     */
    public function getMealsIngredients($mealId)
    {
        return new JsonResponse(
            (Meal::findOrFail($mealId))->ingredients
        );
    }

    /**
     * Add ingredient to meal
     * 
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function addIngredient(Request $request)
    {
        $request->validate([
            'meal_id' => 'required|integer',
            'ingredient_id' => 'required|integer',
            'qty' => 'required',
        ]);

        $meal = Meal::findOrFail($request->get('meal_id'));
        if ($meal->user_id != Auth::id()) {
            return Redirect('/meals')
                ->with('error', 'Auth Error.');
        }

        $meal_has_ingredient = new MealHasIngredient();
        $meal_has_ingredient->meal_id = $request->get('meal_id');
        $meal_has_ingredient->ingredient_id = $request->get('ingredient_id');
        $meal_has_ingredient->qty = $request->get('qty');
        $meal_has_ingredient->save();

        return new JsonResponse('Ingredient Added', 201);
    }

    /**
     * Remove ingredient from meal
     * 
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function removeIngredient(Request $request)
    {
        $request->validate([
            'meal_id' => 'required|integer',
            'ingredient_id' => 'required|integer',
            'link_id' => 'required|integer'
        ]);

        $meal = Meal::findOrFail($request->get('meal_id'));
        if ($meal->user_id != Auth::id()) {
            return Redirect('/meals')
                ->with('error', 'Auth Error.');
        }

        $link = MealHasIngredient::where('meal_id', $request->get('meal_id'))
            ->where('ingredient_id', $request->get('ingredient_id'))
            ->where('id', $request->get('link_id'));
        
        if (!$link) {
            return new JsonResponse('Failed to find Ingreident', 400);
        }

        $link->delete();
        return new JsonResponse('Ingredient Removed', 200);
    }
}
