<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
     protected $table = "salarys";

    public function User()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
