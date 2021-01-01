<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";
    protected $guarded = [];

    public function Room()
    {
        return $this->belongsTo('App\Room', 'room_id', 'id');
    }

    // 1 user co thể post nhieefu bài :
    public function BillDetail()
    {
        return $this->hasMany('App\BillDetail');
    }
}
