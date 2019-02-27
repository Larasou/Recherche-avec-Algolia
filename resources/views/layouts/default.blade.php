<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('meta-title', config('app.name'))</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    @yield('header')
</head>
<body>
<nav class="bg-navigation shadow-md">
    <div class="px-3 mx-auto flex flex-col md:flex-row items-center md:justify-between px-4 py-4 lg:py-6">
        <div class="mb-2 md:mb-0">
            <a href="/" class="text-white flex items-center text-3xl">
                <img width="50" src="{{ secure_asset('images/logo-algolia.png') }}" alt="{{ config('app.name') }}">

                <span class="ml-3 font-semibold text-3xl tracking-tight">
                   {{ config('app.name') }}
                </span>
            </a>
        </div>

        <div class="flex text-sm lg:text-2xl ">
            <a href="javascript:void(0)" class="mr-5 lg:mr-10  btn-rounded border font-bold hover:bg-white border-white py-2 px-4 lg:px-6 text-white hover:text-blue-dark">
                S'enregistrer
            </a>
            <a href="javascript:void(0)" class="btn-rounded border font-bold bg-white border-white py-2 px-4 lg:px-6 text-black">
                Connexion
            </a>
        </div>
    </div>

   <div class="nav-link">
       <div class="-mx-2">
           <a href="/">
               Actualités
           </a>
           <a href="{{ route('projects.index') }}">
               Projets
           </a>
           <a href="{{ route('search') }}">
               recherche
           </a>
       </div>
   </div>
</nav>

<div id="app">
    <main>
        @yield('content')
    </main>
</div>
<!-- Les restes du site... -->

<script src="{{ secure_asset('js/app.js') }}"></script>
@yield('footer')
</body>
</html>
