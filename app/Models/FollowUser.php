<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUser extends Model
{
    use HasFactory;
    protected $table = 'follow';
    protected $fillable = [
        'user_id',
        'followed_id',
    ];

    public function user(){
        return $this->belongTo('App\Models\User','user_id');
    }
}
