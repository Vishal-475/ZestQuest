<?php
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;

Route::get('/recipes', function () {
    $recipes = Recipe::all();
    return view('recipes.index', compact('recipes'));
});
