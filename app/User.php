<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            if (app()->isLocal()){
                static::first()->update([
                    'name' => 'Soulouf',
                    'email' => 'soulouf@larasou.com',
                ]);
            }

        });
    }

    /** Un utilisateur possède un profil
     * Ex: $user->profile->firstname
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Profile');
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
