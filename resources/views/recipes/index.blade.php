@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
    <div class="max-w-6xl mx-auto px-4">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-8">Recipe List</h1>

        <!-- Add Recipe Button -->
        <div class="flex justify-end mb-6">
            <a href="{{ route('recipes.create') }}"
               class="px-5 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                + Add New Recipe
            </a>
        </div>

        @forelse ($recipes as $recipe)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md mb-6 overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">{{ $recipe->name }}</h2>

                    @if ($recipe->image)
                        <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}"
                             class="w-full h-48 object-cover rounded mt-4 mb-4">
                    @endif

                    <p class="text-gray-700 dark:text-gray-300"><strong>Description:</strong> {{ $recipe->description }}</p>

                    <p class="text-gray-700 dark:text-gray-300 mt-2">
                        <strong>Category:</strong> {{ $recipe->category->name ?? 'Uncategorized' }}
                    </p>

                    <p class="text-gray-700 dark:text-gray-300 mt-2">
                        <strong>Tags:</strong>
                        @if ($recipe->tags->count())
                            {{ implode(', ', $recipe->tags->pluck('name')->toArray()) }}
                        @else
                            <span class="text-gray-400">No tags</span>
                        @endif
                    </p>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('recipes.show', $recipe) }}"
                           class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                            View Details
                        </a>

                        <a href="{{ route('recipes.edit', $recipe) }}"
                           class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">
                            Edit
                        </a>

                        <form action="{{ route('recipes.destroy', $recipe) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this recipe?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-600 dark:text-gray-300">No recipes found.</p>
        @endforelse
    </div>
</div>
@endsection
