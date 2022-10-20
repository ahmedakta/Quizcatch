<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_user extends Model
{
    use HasFactory;
    protected $table = 'user_users_class';
    protected $fillable = [
        'user_id',
        'user_class_id',
    ];
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
