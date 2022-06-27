<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
    // public function scopeSaves($query,$id)
    // {
    //     $saves = Save::query()
    //         ->with(['post' => function ($query) {
    //             $query->select('id', 'content');
    //         }])
    //         ->where('user_id',$id)->orderBy('created_at','DESC')->get();
    //         // dd(sizeof($results));
    //     return $saves;
    // }
}
