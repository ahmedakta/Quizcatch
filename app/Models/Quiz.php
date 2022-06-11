<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quizzes';
    protected $fillable = [
        'user_id',
        'image',
        'title',
        'slug',
        'to_be_continued',
        'explanation',
        'started_at',
        'stopped_at',
    ];
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
    public function hasQuestions()
    {
        return $this->hasMany(Question::class);
    }
}
