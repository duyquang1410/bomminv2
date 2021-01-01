<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $table = "coursecate";
    protected $guarded = [];

    public function Course()
    {
    	return $this->hasMany('App\Course');
    }

    public function Category()
    {
    	return $this->hasMany('App\Category');
    }
}

?>