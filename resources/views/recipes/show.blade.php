@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $recipe->name }}</h1>
        <p><strong>Description:</strong> {{ $recipe->description }}</p>
        <p><strong>Ingredients:</strong> {{ $recipe->ingredients }}</p>
        <p><strong>Instructions:</strong> {{ $recipe->instructions }}</p>
        <a href="/recipes" class="btn btn-primary">Back to Recipes</a>
    </div>
@endsection
