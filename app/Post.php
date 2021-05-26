<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = 
    [
        'title',
        'body',
        'user_id',
        'category_id'
     ];
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function user()
    {
        return $this->belongTo('App\User');
        
    }
   
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
