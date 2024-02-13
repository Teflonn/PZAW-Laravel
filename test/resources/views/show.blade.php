@extends('layouts.main')

@section('content')
    <div class="bg-[#5a5c4d] dark:bg-[] w-1/3 mx-auto whitespace-normal h-max p-4 rounded-md">
        @auth
        @if(auth()->user()->id == $publication->author_id)
    <a href="{{ route('publications.edit', ['publication' => $publication->id]) }}" >Edytuj</a>
    <form action="{{ route('publications.destroy', ['publication' => $publication->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Usuń</button>
    @endif
</form>
@endauth
    <p class="text-3xl font-bold"> {{ $publication->title }}</p>
    <p>{{ $publication->content }}</p>
    <p>Autor: <p>
    @if ($publication->author)
                @if ($publication->author->trashed())
                    <s>{{ $publication->author->name }}</s>
                    <span style="color: red;">(Usunięty)</span>
                @else
                    {{ $publication->author->name }}
                @endif
            @else
                <span style="color: red;">(Brak autora)</span>
            @endif</p>
    <p>Utworzono: {{$publication->created_at}}</p>
    <h1><strong> Komentarze:</strong></h1>
                @if ($publication->comments->count() > 0)
                    <ul>
                    <form action="{{ route('comments.store', $publication->id) }}" method="post">
        @csrf<div class="flex flex-row">
        <textarea name="content" id="content" rows="2" cols="25" placeholder="Wpisz swój komentarz" class="text-black"></textarea>
        <button type="submit" class="inline-block p-1 px-4 mb-1.5 text-slate-300 rounded-md transition-all bg-[#93827F] hover:bg-gray-900 ">Dodaj komentarz</button>


    </form>
    
   
    </div>
    <div class="bg-[#969982] rounded-md">
                        @foreach ($publication->comments as $comment)
                            <li>
                                <strong>{{ $comment->author->name }}</strong>
                                <p>{{ $comment->content }}</p>
                                <small>{{ $comment->created_at->diffForHumans() }}</small>
                                <form action="{{ route('comments.delete', ['comment' => $comment->id]) }}" method="post">
        @method('DELETE')

        @csrf
        <input type="submit" value="Usun" class="nav-button" />
        </form>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Brak komentarzy.</p>
                @endif
    </div>
</div>



   
@endsection