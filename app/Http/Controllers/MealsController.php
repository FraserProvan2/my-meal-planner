<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('meals.index', [
            'meals' => Meal::where('user_id', Auth::id())->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'servings' => 'required|integer',
        ]);

        $meal = new Meal();
        $meal->name = $request->get('name');
        $meal->servings = $request->get('servings');
        $meal->steps = $request->get('steps');
        $meal->user_id = Auth::id();
        $meal->save();

        return Redirect('meals/' . $meal->id)
            ->with('success', 'Meal created! Now you can add Ingredients used');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('meals.show', [
            'meal' => Meal::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $meal = Meal::findOrFail($id);

        if ($meal->user_id != Auth::id()) {
            return Redirect('/meals')
                ->with('error', 'Auth Error.');
        }

        $request->validate([
            'name' => 'required|max:255',
            'servings' => 'required|integer',
        ]);

        $meal->name = $request->get('name');
        $meal->servings = $request->get('servings');
        $meal->steps = $request->get('steps');
        $meal->user_id = Auth::id();

        if ($request->get('in_breakfast') == 'on') {
            $meal->in_breakfast = 1;
        } else { $meal->in_breakfast = 0; }

        if ($request->get('in_lunch') == 'on') {
            $meal->in_lunch = 1;
        } else { $meal->in_lunch = 0; }

        if ($request->get('in_dinner') == 'on') {
            $meal->in_dinner = 1;
        } else { $meal->in_dinner = 0; }

        $meal->save();

        $messages = ('Meal "' . $meal->name . '" Updated!');
        return Redirect('/meals/' . $meal->id)
            ->with('success', $messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal = Meal::findOrFail($id);

        if ($meal->user_id != Auth::id()) {
            return Redirect('/meals')
                ->with('error', 'Auth Error.');
        }

        $meal->delete();

        return Redirect('/meals')
            ->with('success', 'Meal Deleted!');
    }
}
