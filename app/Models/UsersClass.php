<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersClass extends Model
{
    use HasFactory , Sluggable;
    protected $table = 'users_classes';
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $fillable = [
        'creator_id',
        'name',
        'private',
        'image',
        'slug',
        'description',
        'limit',
        'password',
    ];
    public function user(){ // Creator (Owner)
        return $this->belongsTo('App\Models\User','creator_id');
    }
    public function users(){ //Joined Users
        return $this->hasMany('App\Models\Class_user');
    }
}
