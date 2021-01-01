<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suggestMoney extends Model
{
     protected $table = "suggestmoneys";

    public function User()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
