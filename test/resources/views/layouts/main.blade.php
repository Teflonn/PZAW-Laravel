<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            module.exports = {

//<a @class(['active' => request()->routeIs('home')]) href="{{ route('home') }}">Strona główna</a>

darkMode: 'class',
  theme: {

    extend: {

      backgroundColor: {
        'slate-900': '#121212',
      },
      textColor: {
        'white': '#ffffff',
      },
    },
  },

  variants: {},
  plugins: [],

            }
/*
  extend: {

      colors: {
        'cambridge': '#92b4a7',
        'jet': '#2f2f2f',
        'sage': '#bdc4a7',
        'cream': '#f3f9d2',
        'ciner': '#93827f',
      },

},

}
*/

        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>{{ config('app.name') }}</title>

        <style type="text/tailwindcss">
    @layer components {
      .heading {
        @apply text-4xl uppercase font-bold text-slate-900 dark:text-slate-100 ;
      }
    }
    .nav{
     @apply  inline-block p-10 bg-[#2F2F2F] text-slate-300 hover:text-slate-700 hover:bg-[#93827F] transition-all rounded-md
    }
    nav{
      @apply bg-[#2F2F2F] h-3/4  ;
    }
    .active{

      @apply hover:text-blue-500  bg-red-600;
    }
    .nav-button {
            @apply inline-block p-2 px-4 text-slate-300 rounded-md transition-all  bg-[#93827F] hover:bg-[#2F2F2F];
        }

    </style>
    </head>
    <body class = " bg-[#BDC4A7] dark:bg-slate-900 dark:text-slate-100 flex flex-col min-h-screen">
   

    

    <nav  class="sticky top-0 z-50 flex items-center justify-between p-4 ">
      <div class="flex items-center">
    <img src="{{ asset('images/logo_pzaw.png') }}" alt="Opis obrazka" class="w-28 h-auto mr-4">
        <ul class="flex space-x-4">

            <li class="nav"><a href="#"><i class="fas fa-home"></i><a href="{{ route('home') }}" >Strona Główna</a></li>
            <li  class="nav"><a href="#"><i class="fa-solid fa-address-card"></i><a href="{{ route('about_us') }}">O nas</a></li>
            <li  class="nav"> <a href="#"><i class="fa-solid fa-newspaper"></i><a href="{{ route('publications.index') }}"> Publikacje</a></li>
            <li class="nav"><a href="#"> <i class="fa-solid fa-mask"></i><a href="{{route('quotes')}}">Bohaterowie</a>
          </ul>
  </div>
  <a href="{{ route('register')}}" class="nav-button">Register</a>

  @auth
	<h1>Witaj <strong>{{ Auth::user()->name }}</strong>!</h1>
  <form action="{{ route('logout.auth') }}" method="POST">
    		@csrf
    		<input type="submit" value="Wyloguj" class="nav-button" />
	</form>

@else
	<a href="{{ route('login.auth') }}" class="nav-button">Log in</a>
@endauth
    </nav>
    <x-alerts></x-alerts> 
        @yield('content')
        <footer class="bg-[#2F2F2F] text-slate-100 text-center p-2 mt-auto">
          <p> ©Copyright 2023 Damian Worytko
      </footer>
    </body>

</html>

