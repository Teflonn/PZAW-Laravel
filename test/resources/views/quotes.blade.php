@extends('layouts.main')

@section('content')
<div class="container">
    <div class="bg-gradient-to-b from-1% from-yellow-400 to-50% from-50% to-[#BDC4A7] to-100% ">
    <h1 class="heading">Galeria Bohaterów</h1>
    

    <ul class="flex space-x-4 h-96 p-4 place-content-center">

        @foreach ($quotes as $quote_card)
        
            <li class="!rounded-lg !bg-slate-100 p-4 text-center" >
                <x-quote_card
                    hero="{{ $quote_card['hero'] }}"
                    role="{{ $quote_card['role'] }}"
                    quote="{{ $quote_card['quote'] }}"
                    image="{{$quote_card['image'] }}"
                >
                    
                </x-quote_card>
            </li>
        @endforeach
    </ul>
</div>
</div>
@endsection