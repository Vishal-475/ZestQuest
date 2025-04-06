@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Recipe</h2>
        <div class="card p-4 shadow-sm">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('recipes.update', $recipe->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Recipe Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ $recipe->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea name="description" class="form-control" required>{{ $recipe->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="ingredients" class="form-label">Ingredients:</label>
                    <textarea name="ingredients" class="form-control" required>{{ $recipe->ingredients }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="instructions" class="form-label">Instructions:</label>
                    <textarea name="instructions" class="form-control" required>{{ $recipe->instructions }}</textarea>
                </div>

                <!-- Category Selection -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category:</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $recipe->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Recipe</button>
            </form>
        </div>
    </div>
@endsection
