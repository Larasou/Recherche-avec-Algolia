<a href="{{ $project->path() }}" class="card-project" style=" height: 225px;">
    <div>
        <h3 class="py-4 mb-3 text-black font-normal text-xl -ml-5 pl-5 border-l-4 border-grey-dark">
            {{ $project->name }}
        </h3>

        <div class="text-grey text-xs lg:text-sm">
            {{ str_limit($project->description, 100) }}
        </div>
    </div>
</a>

