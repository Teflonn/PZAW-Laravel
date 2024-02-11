@extends('layouts.main')

@section('content')
<h1>{{ $user->name }}</h1>
<p>Email: {{ $user->email }}</p>
<p>Account created at: {{ $user->created_at }}</p>

<section>
    <div class="bg-gradient-to-tr from-emerald-800 to-amber-100 w-max h-min p-2 my-5">
    <h2>Opublikowane wpisy</h2>
    @foreach($user->publications as $publication)
        <a href="{{ route('publications.show', ['id' => $publication->id]) }}">
            {{ $publication->title }}
        </a>
        <br>
    @endforeach
</div>
</section>

@endsection