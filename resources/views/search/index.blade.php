@extends('layouts.default')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@stop

@section('content')
    <ais-index app-id="{{ config('scout.algolia.id') }}"
               api-key="{{ config('scout.algolia.key') }}"
               index-name="{{ (new \App\Search\Larasou())->searchableAs() }}">

        <header class="bg-search">
            <div class="container mx-auto h-full">
                <div class="px-3  flex items-center justify-center h-full">
                    <div class="w-full border-2 rounded-full bg-white px-6 border-blue-dark flex items-center">
                        <i class="text-3xl text-blue-dark mr-3 fas fa-search"></i>

                        <ais-input  placeholder="Recherche..."
                                    class="text-2xl w-full py-3 md:py-4 outline-none font-semibold text-black"></ais-input>

                    </div>
                </div>
            </div>
        </header>

        <div class="flex items-start">
        <div class="w-1/6">
            <div class="p-3 mx-8 mb-5">
                <h3 class="text-3xl mb-5">
                    Type
                </h3>
                <ais-refinement-list
                    attribute-name="type"
                    :limit="7"
                > </ais-refinement-list>
            </div>

            <div class="p-3 mx-8 mb-5">
                <h3 class="text-3xl mb-5">
                    Catégories
                </h3>
                <ais-refinement-list
                    attribute-name="category.name"
                    :limit="7"
                > </ais-refinement-list>
            </div>

            <div class="p-3 mx-8 mb-5">
                <h3 class="text-3xl mb-5">
                    Utilisateurs
                </h3>
                <ais-refinement-list
                    attribute-name="username"
                    :limit="7"
                > </ais-refinement-list>
            </div>
        </div>

            <div class="container">
                <ais-results>
                    <template slot-scope="{ result }">
                        <div class="mb-5 p-3 border border-grey-light rounded-lg">
                            <h3 class="mb-5 text-3xl">
                                <a :href="result.path" class="text-black hover:underline">
                                    @{{ result.name }}
                                </a>
                            </h3>

                            <div class="text-lg">
                                @{{ result.description }}
                            </div>
                        </div>
                    </template>
                </ais-results>
            </div>
        </div>

    </ais-index>
@stop
