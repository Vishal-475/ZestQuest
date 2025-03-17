<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
</head>
<body>
    <h1>Recipe List</h1>
    <ul>
        @foreach ($recipes as $recipe)
            <li>
                <h3>{{ $recipe->name }}</h3>
                <p><strong>Description:</strong> {{ $recipe->description }}</p>
                <p><strong>Ingredients:</strong> {{ $recipe->ingredients }}</p>
                <p><strong>Instructions:</strong> {{ $recipe->instructions }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>
