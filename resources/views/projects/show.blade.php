@extends('layouts.default')

@section('content')
    <div class="my-10 max-w-3xl mx-auto">
        <h1 class="text-center">
            {{ $project->name }}
        </h1>

        <div class="mt-5 flex flex-col">
            <div class="mt-3 text-lg">
                {!! $project->body !!}
            </div>

            <div class="mt-5 text-grey-darker">
                Publié par
                <a href="" class="font-bold text-blue-dark no-underline">
                    {{ $project->user->name }}
                </a>
            </div>

            <div class="my-5 -mx-2 flex flex-wrap">
                @foreach($project->tags as $tag)
                    <a href="{{ route('search.show', $tag->name) }}" class="btn-rounded mx-2 px-4 py-1 border border-purple text-purple hover:bg-purple hover:text-white">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="mt-5 flex flex-col">
            <h3 class="text-2xl">
                {{ $project->comments->count() }} {{ str_plural('Commentaire', $project->comments->count()) }}
            </h3>
            <form action="{{ route('projects.addcomment', [$project->category, $project]) }}" method="post" class="my-5">
                @csrf
                <textarea name="body" id="body"
                          rows="5"
                          class="w-full bg-grey-light focus:bg-grey-lightest"
                          placeholder="Mon commentaire..."
                ></textarea>
                {!! $errors->first('body', '<p class="text-red font-bold">:message</p>') !!}
                <button class="mt-3 py-3 px-6 bg-purple-dark text-white rounded-lg text-lg font-bold">
                    Envoyer !
                </button>
            </form>

            @foreach($project->comments()->latest()->get() as $comment)
                <div class="mb-3 p-3 border-2 border-grey-lighter rounded-lg">
                    <div class="text-lg">
                        {!! $comment->body !!}
                    </div>

                    <div class="mt-3 text-grey-darker">
                        Publié par
                        <a href="" class="font-bold text-blue-dark no-underline">
                            {{ $project->user->name }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@stop
