<?php

use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\MealsController;
use App\Http\Controllers\PlanTemplateController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

// Auth Routes
Route::middleware(['auth'])->group(function () {
    // Home
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Ingredients
    Route::resource('ingredients', IngredientsController::class);

    // Meals
    Route::resource('meals', MealsController::class);

    // IngredientPicker
    Route::get('/meals-ingredients/{meal_id}', [App\Http\Controllers\IngredientPickerController::class, 'getMealsIngredients']);
    Route::get('/ingredient-picker', [App\Http\Controllers\IngredientPickerController::class, 'getIngredients']);
    Route::post('/ingredient-picker/add', [App\Http\Controllers\IngredientPickerController::class, 'addIngredient']);
    Route::post('/ingredient-picker/remove', [App\Http\Controllers\IngredientPickerController::class, 'removeIngredient']);

    // Plan Template
    Route::resource('plan-template', PlanTemplateController::class);

    // Generate Meal
    Route::get('/meal-plan/generate', [App\Http\Controllers\GenerateMealController::class, 'update'])->name('generate-meal-plan');
});
