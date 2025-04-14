@extends('layouts.auth') {{-- Use the same layout for visual consistency --}}

@section('content')
<div class="w-full max-w-3xl bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md text-center">
    <h1 class="text-3xl font-bold text-blue-600 mb-4">Welcome to Your Dashboard</h1>
    <p class="text-gray-700 dark:text-gray-300 text-lg">Manage your recipes and settings from here.</p>

    <div class="mt-6">
        <a href="{{ route('recipes.index') }}" 
           class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition">
            View Recipes
        </a>
    </div>
</div>
@endsection
