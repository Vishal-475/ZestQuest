@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Add a New Recipe</h2>
        <div class="card p-4 shadow-sm">
            <form action="{{ route('recipes.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Recipe Name:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="ingredients" class="form-label">Ingredients:</label>
                    <textarea name="ingredients" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="instructions" class="form-label">Instructions:</label>
                    <textarea name="instructions" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">Add Recipe</button>
            </form>
        </div>
    </div>
@endsection
