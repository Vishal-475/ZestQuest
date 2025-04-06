@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Recipe Image -->
            @if ($recipe->image)
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}" class="w-full h-64 object-cover">
            @endif

            <div class="p-6">
                <h2 class="text-3xl font-bold mb-4">{{ $recipe->name }}</h2>
                
                <!-- Recipe Creation Date -->
                <p class="text-sm text-gray-500 mb-2">Added on: {{ $recipe->created_at->format('M d, Y') }}</p>
                
                <!-- Recipe Category -->
                <p class="text-gray-600 mb-2">
                    <strong>Category:</strong> {{ $recipe->category->name ?? 'Uncategorized' }}
                </p>

                <!-- Recipe Description -->
                <p class="text-gray-700 mb-4">{{ $recipe->description }}</p>

                <!-- Ingredients -->
                <h3 class="text-xl font-semibold mb-2">Ingredients:</h3>
                <p class="text-gray-700 mb-4">{{ $recipe->ingredients }}</p>

                <!-- Instructions -->
                <h3 class="text-xl font-semibold mb-2">Instructions:</h3>
                <p class="text-gray-700 mb-4">{{ $recipe->instructions }}</p>

                <!-- Tags -->
                @if ($recipe->tags->isNotEmpty())
                    <div class="mt-4">
                        <strong>Tags:</strong>
                        <div class="flex flex-wrap gap-2 mt-2">
                            @foreach ($recipe->tags as $tag)
                                <span class="bg-blue-500 text-white text-sm px-3 py-1 rounded-full">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Buttons -->
                <div class="mt-6 flex justify-between items-center">
                    <a href="{{ route('recipes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                        Back to Recipes
                    </a>
                    <div class="flex space-x-2">
                        <a href="{{ route('recipes.edit', $recipe->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                            Edit
                        </a>
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this recipe?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Recipes -->
        @if (!empty($relatedRecipes) && count($relatedRecipes) > 0)
            <div class="mt-8">
                <h3 class="text-2xl font-semibold mb-4">Related Recipes</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($relatedRecipes as $related)
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <a href="{{ route('recipes.show', $related->id) }}">
                                @if ($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}" class="w-full h-40 object-cover">
                                @endif
                                <div class="p-4">
                                    <h4 class="text-lg font-semibold">{{ $related->name }}</h4>
                                    <p class="text-sm text-gray-600">{{ Str::limit($related->description, 60) }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
