<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'users_profile';
    protected $fillable = [
        'user_id',
        'phone_number',
        'about',
        'gender',
        'date_of_birth',
        'education',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}

