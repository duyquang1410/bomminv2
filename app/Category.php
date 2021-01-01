<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $guarded = [];

    public function Post()
    {
        return $this->belongsToMany(Post::class);
    }

     public function Course()
    {
        return $this->belongsToMany(Course::class);
    }


    public function getCategory()
    {
    	$category = Category::all()->toArray();
    	return $category;
    }
}


?>