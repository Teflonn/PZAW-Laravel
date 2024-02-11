@extends('layouts.main')
    @section('content')
    <h1 class="max-w-md mx-auto mt-4 p-4 text-xl"> Logowanie</h1>
    <form action="" method="POST" class="text-gray-700 max-w-md mx-auto mt-4 p-4 bg-white rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="login" class="block text-sm font-semibold mb-1">Login:</label>
            <input type="text" name="login" id="login" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
            @error('name')
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
            <label for="remember">Remember Me</label>
            <input type="checkbox" id="remember" name="remember" value="huh">
        </div>
        

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">Zaloguj</button>
    </form>

    @endsection