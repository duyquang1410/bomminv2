<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeKeeping extends Model
{
    protected $table = "timekeepings";

     public function User()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

     public function Service()
    {
    	return $this->belongsTo('App\Service', 'service_id', 'id');
    }
}
