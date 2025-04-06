<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    // Apply authentication only to routes that modify data
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index', 'create']);
    }

    // Display all recipes with pagination
    public function index()
    {
        $recipes = Recipe::with(['category', 'tags'])->paginate(10);
        return view('recipes.index', compact('recipes'));
    }

    // Show a single recipe
    public function show(Recipe $recipe)
    {
        // Ensure category_id exists before querying
        $relatedRecipes = [];
        if (!is_null($recipe->category_id)) {
            $relatedRecipes = Recipe::where('category_id', $recipe->category_id)
                                    ->where('id', '!=', $recipe->id)
                                    ->inRandomOrder()
                                    ->limit(3)
                                    ->get();
        }

        return view('recipes.show', compact('recipe', 'relatedRecipes'));
    }

    // Show the create form
    public function create()
    {
        $categories = Category::all();
        return view('recipes.create', compact('categories'));
    }

    // Store a new recipe
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->hasFile('image') 
            ? $request->file('image')->store('recipe_images', 'public') 
            : null;

        Recipe::create([
            'name' => $request->name,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'category_id' => $request->category_id ?? null, // Allow null category
            'image' => $imagePath,
        ]);

        return redirect()->route('recipes.index')->with('success', 'Recipe added successfully!');
    }

    // Show the edit form
    public function edit(Recipe $recipe)
    {
        $categories = Category::all();
        return view('recipes.edit', compact('recipe', 'categories'));
    }

    // Update an existing recipe
    public function update(Request $request, Recipe $recipe)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($recipe->image) {
                Storage::disk('public')->delete($recipe->image);
            }
            $data['image'] = $request->file('image')->store('recipe_images', 'public');
        }

        $recipe->update($data);

        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully!');
    }

    // Delete a recipe
    public function destroy(Recipe $recipe)
    {
        if ($recipe->image) {
            Storage::disk('public')->delete($recipe->image);
        }

        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully!');
    }
}
