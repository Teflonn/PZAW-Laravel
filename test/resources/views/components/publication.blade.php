@props(['title', 'date', 'author'])
<div class="publication">
    <div class="bg-green-600 w-max h-min p-2 my-3">
    
    <h1 class="text-3xl uppercase font-bold dark text-slate-100 dark:text-slate-900">{{ $title }}</h1>
</div>
    <p><strong>Autor:</strong> {{ $author }}</p>
    <p><strong>Data utworzenia:</strong> {{ $date }}</p>
    <p>{{ $slot }}</p>
</div>
<div>




</div>