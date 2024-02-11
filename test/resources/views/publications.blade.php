@extends('layouts.main')

@section('content')
<div class="container">
    <div class="bg-green-600 w-max h-min p-2 my-3">
    <h1 class="heading">publikacje</h1>
</div>
    <ul>
        @foreach ($articles as $publication)
            <li>
                <div class="">
                <x-publication
                    title="{{ $publication['title'] }}"
                    author="{{ $publication['author'] }}"
                    date="{{ $publication['date'] }}"
                >
                    {{ $publication['content'] }}
                </x-publication>
</div>
            </li>
        @endforeach
    </ul>
</div>
@endsection