@extends('layouts.main')
    @section('content')
    <h1 class="max-w-md mx-auto mt-4 p-4 text-xl"> Rejestracja</h1>
    <form action="{{ route('register.store')}}" method="POST" class="text-gray-700 max-w-md mx-auto mt-4 p-4 bg-white rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-semibold mb-1">Name:</label>
            <input type="text" name="name" id="name" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-semibold mb-1">Email:</label>
            <input type="email" name="email" id="email" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-semibold mb-1">Password:</label>
            <input type="password" name="password" id="password" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
            @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-semibold mb-1">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">Zarejestruj</button>
    </form>

    @endsection