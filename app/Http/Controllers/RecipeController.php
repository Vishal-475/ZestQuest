<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function show($id)
    {
        $recipe = \App\Models\Recipe::findOrFail($id);
        return view('recipes.show', compact('recipe'));
    }

    // Display the form for creating a recipe
public function create()
{
    return view('recipes.create');
}

// Store the new recipe

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'ingredients' => 'required|string',
        'instructions' => 'required|string',
    ]);

    Recipe::create($request->all());

    return redirect()->route('recipes.index')->with('success', 'Recipe added successfully!');
}

// Display the edit form for a recipe
public function edit($id)
{
    $recipe = \App\Models\Recipe::findOrFail($id);
    return view('recipes.edit', compact('recipe'));
}

// Update the recipe
public function update(Request $request, $id)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'ingredients' => 'required|string',
        'instructions' => 'required|string',
    ]);

    $recipe = \App\Models\Recipe::findOrFail($id);
    $recipe->update($data);

    return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully!');
}
// Delete a recipe
public function destroy($id)
{
    $recipe = \App\Models\Recipe::findOrFail($id);
    $recipe->delete();

    return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully!');
}


    
    
        
}

