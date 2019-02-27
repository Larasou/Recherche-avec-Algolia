<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Project extends Model
{
    use Searchable;

    protected $guarded = [];

    protected $with = ['user'];

    protected static function boot()
    {
        parent::boot();

        self::created(function ($model) {
            $model->update(['slug' => "p{$model->id}-" . str_slug($model->name)]);
        });

        self::deleting(function ($model) {
            $model->tags()->detach();
        });
    }

    public function path()
    {
        return route('projects.show', [$this->category, $this]);
    }

    public function getPathAttribute()
    {
        return $this->path(); // $post->path
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
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
        $array['type'] = "Projet";
        $array['user'] = $this->user;
        $array['category'] = $this->category;

        return $array;
    }
}
