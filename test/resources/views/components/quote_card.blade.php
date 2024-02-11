@props(['image','quote','hero','role'])
<figure>
    
<blockquote class="text-slate-900" >{{$quote}}</blockquote>
    <div class="text-center">
        
        <img src="{{$image}}" alt="tu mial byc obrazek :((( " class="rounded-full m-auto">
        <figcaption >
            <p class="text-left text-slate-400">{{$hero}}</p>
            <p class="text-left text-slate-400">{{$role}}</p>
        </figcaption>
    </div>

</figure>