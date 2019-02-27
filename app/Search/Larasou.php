<?php

namespace App\Search;

use Algolia\ScoutExtended\Searchable\Aggregator;

class Larasou extends Aggregator
{
    /**
     * The names of the models that should be aggregated.
     *
     * @var string[]
     */
    protected $models = [
        'App\Post',
        'App\Project',
    ];
}
