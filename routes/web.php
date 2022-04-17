<?php

use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\MealsController;
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

    // Ingredients
    Route::resource('meals', MealsController::class);
});
