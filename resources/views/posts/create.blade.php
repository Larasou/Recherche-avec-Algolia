@extends('layouts.default')

@section('content')
    <div class="my-10 max-w-3xl mx-auto">
        <h1 class="text-center">
            Ajouter un nouveau article
        </h1>

        <div class="mt-5 flex flex-col items-center justify-center">
            <form class="w-4/5" action="/posts" method="POST">
                @csrf

                <div class="flex items-center justify-between my-5">
                    <div class="w-full mr-5">
                      <input type="text"
                             name="name"
                             placeholder="Title de l'article"
                             class="w-full rounded-lg py-3 px-5 bg-grey focus:bg-grey-light">
                      {!! $errors->first('name', '<p class="text-red">:message</p>') !!}
                    </div>
                    <div class="w-full">
                        <select name="category_id" id="category_id"
                                class="w-full rounded-lg py-3 px-5 bg-grey focus:bg-grey-light">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('category_id', '<p class="text-red">:message</p>') !!}
                    </div>
                </div>

                <div class="my-5">
                    <textarea
                        name="description"
                        placeholder="Description de l'article"
                        rows="5"
                        class="w-full rounded-lg py-3 px-5 bg-grey focus:bg-grey-light"></textarea>
                    {!! $errors->first('description', '<p class="text-red">:message</p>') !!}
                </div>

                <div class="my-5">
                    <textarea
                        name="body"
                        placeholder="Contenu de l'article"
                        rows="13"
                        class="w-full rounded-lg py-3 px-5 bg-grey focus:bg-grey-light"></textarea>
                    {!! $errors->first('body', '<p class="text-red">:message</p>') !!}
                </div>

                <div class="mt-3">
                    <button class=" rounded-full text-xl font-bold py-3 px-6 bg-blue hover:bg-blue-dark text-white">
                        Ajouter l'article
                    </button>
                </div>
            </form>
        </div>
    </div>

@stop
