<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ingredients.index', [
            'ingredients' => Ingredient::where('user_id', Auth::id())->paginate(10)
        ]);
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
        ]);

        $ingredient = new Ingredient();
        $ingredient->name = $request->get('name');
        $ingredient->user_id = Auth::id();
        $ingredient->save();

        $message = ('Ingredient "' . $ingredient->name . '" Added!');
        return Redirect('/ingredients')
            ->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('ingredients.index', [
            'ingredients' => Ingredient::where('user_id', Auth::id())->paginate(10),
            'toEdit' => Ingredient::findOrFail($id)
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
        $ingredient = Ingredient::findOrFail($id);

        if ($ingredient->user_id != Auth::id()) {
            return Redirect('/ingredients')
                ->with('error', 'Auth Error.');
        }

        $request->validate([
            'name' => 'required|unique:ingredients|max:255',
        ]);

        $ingredient->name = $request->get('name');
        $ingredient->save();

        $messages = ('Ingredient "' . $ingredient->name . '" Updated!');
        return Redirect('/ingredients')
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
        $ingredient = Ingredient::findOrFail($id);

        if ($ingredient->user_id != Auth::id()) {
            return Redirect('/ingredients')
                ->with('error', 'Auth Error.');
        }

        $ingredient->delete();

        return Redirect('/ingredients')
            ->with('success', 'Ingredient Deleted!');
    }
}
