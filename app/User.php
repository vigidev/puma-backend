<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid', 'name', 'email', 'password', 'position', 'roles'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function about()
    {
        return $this->hasMany('App\About', 'uid');
    }

    public function news_created()
    {
        return $this->hasMany('App\News', 'uid');
    }

    public function news_updated()
    {
        return $this->hasMany('App\News', 'uid');
    }

    public function newscategory_created()
    {
        return $this->hasMany('App\NewsCategory', 'uid');
    }

    public function newscategory_updated()
    {
        return $this->hasMany('App\NewsCategory', 'uid');
    }
}
