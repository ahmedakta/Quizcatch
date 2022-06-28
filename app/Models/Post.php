<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const PRIVATE_POST = 1;
    const PUBLIC_POST = 0;
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'user_id',
        'image',
        'video',
        'private',
        'content',
        
    ];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function likes(){
        return $this->hasMany('App\Models\Like');
    }
    public function saves(){
        return $this->hasMany('App\Models\Save');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}


