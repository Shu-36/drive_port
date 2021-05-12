<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
       return $this->hasMany('App\Post'); 
    }
   public function getLists()
   {
       $categories = Category::orderBy('id', 'asc')->pluck('name', 'id');
       
       return $categories;
   }
}
