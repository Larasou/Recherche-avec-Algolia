@extends('layouts.default')

@section('content')
    <div class="my-10 max-w-3xl mx-auto">
        <h1 class="text-center">
           Mes projets
        </h1>

        <div class="mt-3 mb-5 flex justify-end">
            <a href="{{ route('projects.create') }}" class=" w-48 py-3 btn-rounded border border-black hover:border-grey-darker px-6 bg-grey-lighter hover:bg-grey-darker text-black hover:text-white">
                Ajouter un projet
            </a>
        </div>

        <div class="md:flex md:flex-wrap -mx-3">
            @forelse($projects as $project)
                <div class="md:w-1/2 lg:w-1/3 px-3 pb-6">
                    @include('projects.project-card')
                </div>
            @empty
                <div>
                    Pas de projet pour l'instant!
                </div>
            @endforelse
        </div>
    </div>

@stop
