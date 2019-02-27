<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;

    protected $guarded = [];

    protected $with = ['user', 'category'];

    //protected $appends = ['path'];

    protected static function boot()
    {
        parent::boot();

        self::created(function ($model) {
            $model->update(['slug' => "a{$model->id}-" . str_slug($model->name)]);
        });

        self::deleting(function ($model) {
            $model->tags()->detach();
        });
    }

    public function searchableAs()
    {
        return config('scout.prefix') . 'articles';
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }


    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function path()
    {
        return route('posts.show', [$this->category, $this]);
    }

    public function getPathAttribute()
    {
        return $this->path(); // $post->path
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Applies Scout Extended default transformations:
        $array = $this->transform($array);

        // Add an extra attribute:
        $array['path'] = $this->path();
        $array['body'] = str_limit($this->body, 6299);
        $array['username'] = $this->user->name;
        $array['type'] = "Article";
        $array['user'] = $this->user;
        $array['category'] = $this->category;

        return $array;
    }
}
