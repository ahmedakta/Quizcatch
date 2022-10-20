<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'quizzes';
    protected $fillable = [
        'user_id',
        'image',
        'title',
        'slug',
        'rating',
        'explanation',
        'end_time',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function scopeFilter($query){
        if(request('search')){
        $query
               ->where('title','like', '%' . request('search') . '%')
               ->orWhere('explanation','like', '%' . request('search') . '%');
             }
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function questions(){
        return $this->hasMany('App\Models\Question');
    }
    public function result(){
        return $this->hasOne('App\Models\Result');
    }
    public function hasQuestions()
    {
        return $this->hasMany(Question::class);
    }
    public function comments()
    {
        return $this->hasMany('App\Models\QuizComment');
    }
}
