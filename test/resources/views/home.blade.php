
    @extends('layouts.main')

@section('content')

<div class="flex justify-center  h-min-screen ">
<div class ="bg-gradient-to-tr from-emerald-800 to-amber-100 w-max h-min p-2 my-3 text-center">
<h1 class="heading">Witaj na naszej jak na razie pustej stronie!</h1>
<p>Dzisiaj jest {{ $date }}</p>
</div>
    <div class=" sticky top-64 bg-[#F3F9D2] w-1/3 mx-auto whitespace-normal h-max p-4 rounded-md dark:text-slate-700">
       

        <p class="text-3xl font-bold">{{ $latestPublication->title }}</p>
        <p>{{ $latestPublication->content }}</p>
        <p>Autor: {{ $latestPublication->author->name }}</p>
    </div>
</div>


@endsection
