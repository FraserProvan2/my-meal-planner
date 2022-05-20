<?php

namespace App\Http\Controllers;

use App\Models\MealPlan;
use App\Models\PlanTemplate;
use App\ShoppingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $plan_record = MealPlan::where('user_id', Auth::id())->first();
        if (!$plan_record) {
            $plan = null;
            $shopping_list = null;
        } else {
            $plan = $plan_record->withMealData();
            $shopping_list = (new ShoppingList($plan_record))->getList();
        }

        return view('home', [
            'template' => PlanTemplate::getAndOrCreate(Auth::id()),
            'plan' => $plan,
            'shopping_list' => $shopping_list
        ]);
    }
}
