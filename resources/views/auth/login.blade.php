@extends('layouts.auth')  {{-- ✅ Change from layouts.app to layouts.auth --}}

@section('content')
<div class="w-full max-w-md bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-center text-gray-700 dark:text-white">Login</h2>

    <form method="POST" action="{{ route('login') }}" class="mt-6">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" name="email" id="email" required autofocus
                class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
            <input type="password" name="password" id="password" required
                class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mt-4 flex justify-between items-center">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="text-blue-500">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">Remember me</span>
            </label>
            <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">Forgot Password?</a>
        </div>

        <div class="mt-6">
            <button type="submit"
                class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Login</button>
        </div>
    </form>

    <p class="mt-4 text-sm text-center text-gray-600 dark:text-gray-300">Don't have an account? 
        <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
    </p>
</div>
@endsection
