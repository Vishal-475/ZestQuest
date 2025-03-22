@extends('layouts.app')

@section('content')
    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold text-blue-600">Welcome to Your Dashboard</h1>
                <p class="text-gray-700 dark:text-gray-300 mt-2">Manage your recipes and settings from here.</p>
                
                <div class="mt-6">
                    <a href="{{ url('/recipes') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                        View Recipes
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
