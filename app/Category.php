<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name']  = $name;
        $this->attributes['slug'] = str_slug($this->name);
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function projects()
    {
        return $this->hasMany('App\Project');
    }
}
