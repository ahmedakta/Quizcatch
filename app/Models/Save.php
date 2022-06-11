<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    use HasFactory;
    protected $table = "saves";
    
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function post(){
        return $this->belongsTo('App\Models\Post','post_id');
    }
}
