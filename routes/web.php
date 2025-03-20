<?php
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;

Route::get('/recipes', function () {
    $recipes = Recipe::all();
    return view('recipes.index', compact('recipes'));
});

Route::get('/recipes/create', function () {
    return view('recipes.create');
});

Route::post('/recipes', function (\Illuminate\Http\Request $request) {
    $recipe = new \App\Models\Recipe;
    $recipe->name = $request->name;
    $recipe->description = $request->description;
    $recipe->ingredients = $request->ingredients;
    $recipe->instructions = $request->instructions;
    $recipe->save();

    return redirect('/recipes');
});

use App\Http\Controllers\RecipeController;

// Route to list all recipes
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');

// Route to show details of a recipe
Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');


// Display the form for creating a new recipe
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');

// Handle the submission of the create form
Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');


// Display the form for editing a recipe
Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
// Handle update form submission
Route::put('/recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');
// Delete a recipe
Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

