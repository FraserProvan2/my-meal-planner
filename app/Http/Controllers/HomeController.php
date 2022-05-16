<?php

namespace App\Http\Controllers;

use App\Models\MealPlan;
use App\Models\PlanTemplate;
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
        $plan = MealPlan::where('user_id', Auth::id())->first();
        if (!$plan) {
            $plan = null;
        } else{
            $plan = $plan->withMealData();
        }

        return view('home', [
            'template' => PlanTemplate::getAndOrCreate(Auth::id()),
            'plan' => $plan,
        ]);
    }
}
