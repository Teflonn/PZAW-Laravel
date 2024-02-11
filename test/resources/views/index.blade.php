@extends('layouts.main')

@section('content')

    <h1 class="heading">Lista publikacji</h1>
    <ul>


        @foreach ($publications as $publication)
            <li>
                    <div class="text-left ps-10">
                    <div class="">
                    <a href="{{route('publications.show', ['id' => $publication->id])}}" class="text-3xl font-bold text-blue-900" ><p> {{ $publication->title }} </p></a>
                   <p class="text-2xl"> {{ $publication->zajawka}}</p>
                   <p>Utworzono: {{$publication->created_at}}</p>

            </div>
</div>
            </li>
        @endforeach
    </ul>
@endsection
