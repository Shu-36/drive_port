<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $fillable = 
    [
        'title',
        'body',
        'user_id'
     ];
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function users()
    {
        return $this->hasOne('App\User', 'foreign_key');
    }
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
