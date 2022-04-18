<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class IngredientPickerController extends Controller
{
    /**
     * 
     */
    public function getIngredients()
    {
        return new JsonResponse(
            Ingredient::where('user_id', Auth::id())->get()
        );
    }
}
