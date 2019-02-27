@extends('layouts.default')

@section('content')
    <div class="my-10 max-w-3xl mx-auto">
        <h1 class="text-center">
            Les articles
        </h1>

        <div class="mt-3  text-right">
            <a href="{{ route('posts.create') }}" class="py-3 rounded-lg px-6 bg-blue hover:bg-blue-dark text-white">
                Ajouter un article
            </a>
        </div>

        <div class="mt-3">
            <form action="{{ route('search') }}" method="GET">
                <div class="w-full border-2 rounded-full bg-white px-6 border-blue-dark flex items-center">
                    <i class="text-3xl text-blue-dark mr-3 fas fa-search"></i>

                    <input type="search" name="q"
                           placeholder="Recherche..."
                           class="text-2xl w-full py-3 md:py-4 outline-none font-semibold text-black">
                </div>
            </form>
        </div>


        <div class="mt-5 flex flex-col items-center justify-center">
            @foreach($posts as $post)
               <div class="my-5 p-5 border-2 border-grey-lighter rounded-lg">
                   <h3 class="text-2xl mb-5">
                       <a href="{{ $post->path }}" class="text-indigo-dark no-underline">
                           {{ $post->name }}
                       </a>
                   </h3>

                   <div class="mt-3 text-lg">
                       {!! $post->description !!}
                   </div>

                   <div class="mt-3 text-right text-grey-darker">
                       Publié par
                       <a href="" class="font-bold text-blue-dark no-underline">
                          {{ $post->user->name }}
                       </a>
                   </div>
               </div>
            @endforeach
        </div>
    </div>

@stop
