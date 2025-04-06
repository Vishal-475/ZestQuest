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
                    
                    @if ($recipe->image)
                        <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}" class="img-fluid mb-3" style="max-height: 200px;">
                    @endif

                    <p class="card-text"><strong>Description:</strong> {{ $recipe->description }}</p>
                    
                    <p class="card-text"><strong>Category:</strong> {{ $recipe->category->name ?? 'Uncategorized' }}</p>
                    
                    <p class="card-text">
                        <strong>Tags:</strong> 
                        @if ($recipe->tags->count())
                            {{ implode(', ', $recipe->tags->pluck('name')->toArray()) }}
                        @else
                            <span class="text-muted">No tags</span>
                        @endif
                    </p>

                    <div class="d-flex justify-content-between">
                        <!-- View Details Button -->
                        <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-info">View Details</a>

                        <!-- Edit Button -->
                        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-primary">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
