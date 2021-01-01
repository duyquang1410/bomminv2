<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'username', 'email', 'password', 'phonenumber',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function position()
    {
        return $this->belongsTo('App\Position', 'level', 'id');
    }

    // 1 user co thể post nhieefu bài :
    public function Post()
    {
        return $this->hasMany('App\Post');
    }

    public function Student()
    {
        return $this->hasMany("App\Student");
    }

    public function Teacher()
    {
        return $this->hasMany("App\Teacher");
    }
}

?>