@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">Recipe List</h1>

        <!-- Add Recipe Button -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('recipes.create') }}" class="btn btn-success">Add New Recipe</a>
        </div>

        @foreach ($recipes as $recipe)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $recipe->name }}</h5>
                    <p class="card-text"><strong>Description:</strong> {{ $recipe->description }}</p>
                    <p class="card-text"><strong>Ingredients:</strong> {{ $recipe->ingredients }}</p>
                    <p class="card-text"><strong>Instructions:</strong> {{ $recipe->instructions }}</p>

                    <div class="d-flex justify-content-between">
                        <!-- Edit Button -->
                        <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-primary">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
