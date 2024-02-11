@extends('layouts.main')
@php
$action = route('publication.store');
    $title = null;
    $content = null;
    $author_id = null;
    $tytul = "Create Publication";

    if (! empty($publication)) {
        $action = route('publications.update', ['publication' => $publication->id]);
        $title = $publication->title;
        $content = $publication->content;
        $author_id = $publication->author_id;
        $tytul = "Edit Publication";
    }

@endphp

@section('content')



    <h1 class="text-2xl font-bold mb-4">{{ $tytul }}</h1>
    <div class="text-black content-center">
        <form action="{{ $action }}" method="POST" class="max-w-md space-y-4">
        @csrf
        @if (! empty($publication))
             @method('PUT')
        @endif

            

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" name="title" id="title" value='{{ $title}}' required
                       class="mt-1 p-2 w-full border rounded-md @error('title') border-red-500 @enderror">
                
                @error('title')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content:</label>
                <textarea name="content" id="content" cols="30" rows="10"  required 
                          class="mt-1 p-2 w-full border rounded-md @error('content') border-red-500 @enderror">{{$content}}</textarea>
                
                @error('content')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="author_id" class="block text-sm font-medium text-gray-700">Author:</label>
                <select name="author_id" required
                        class="mt-1 p-2 w-full border rounded-md @error('author_id') border-red-500 @enderror">
                        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ $author_id == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
                    
                </select>

                @error('author_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection