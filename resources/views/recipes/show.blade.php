@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
            <h2 class="text-3xl font-bold text-blue-600 mb-4">{{ $recipe->name }}</h2>

            @if ($recipe->image)
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}"
                     class="w-full h-auto rounded mb-6 shadow">
            @endif

            <p class="text-gray-700 dark:text-gray-300 text-lg mb-4">
                <strong>Description:</strong> {{ $recipe->description }}
            </p>

            <p class="text-gray-700 dark:text-gray-300 mb-2">
                <strong>Category:</strong> {{ $recipe->category->name ?? 'Uncategorized' }}
            </p>

            <p class="text-gray-700 dark:text-gray-300 mb-4">
                <strong>Tags:</strong>
                @if ($recipe->tags->count())
                    {{ implode(', ', $recipe->tags->pluck('name')->toArray()) }}
                @else
                    <span class="text-muted">No tags</span>
                @endif
            </p>

            <div class="flex justify-between mt-6">
                <a href="{{ route('recipes.edit', $recipe) }}"
                   class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition">
                    Edit
                </a>

                <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                        Delete
                    </button>
                </form>
            </div>

            <div class="mt-6">
                <a href="{{ route('recipes.index') }}" class="text-blue-500 hover:underline">
                    ← Back to Recipes
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
