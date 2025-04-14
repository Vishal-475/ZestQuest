@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
            <h2 class="text-3xl font-bold text-blue-600 mb-6 text-center">Edit Recipe</h2>

            <form method="POST" action="{{ route('recipes.update', $recipe) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Recipe Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $recipe->name) }}" required
                           class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                    <textarea name="description" id="description" rows="4" required
                              class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('description', $recipe->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                    <select name="category_id" id="category_id"
                            class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($recipe->category_id == $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="tags" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tags</label>
                    <select name="tags[]" id="tags" multiple
                            class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" 
                                @if ($recipe->tags->pluck('id')->contains($tag->id)) selected @endif>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
                    @if ($recipe->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}" class="h-32 rounded">
                        </div>
                    @endif
                    <input type="file" name="image" id="image"
                           class="block w-full text-sm text-gray-900 dark:text-white bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('recipes.index') }}" class="text-gray-500 hover:underline">Cancel</a>
                    <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                        Update Recipe
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
