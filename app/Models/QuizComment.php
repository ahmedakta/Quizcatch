<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizComment extends Model
{
    use HasFactory;
    protected $table = 'quiz_comments';
    protected $fillable = [
        'quiz_id',
        'content',
        'star_rating',
    ];
    public function quiz(){
        return $this->belongsTo('App\Models\Quiz','quiz_id');
    }
    //Quiz Comments has a comment.
    
    public function Comment()
    {
        return $this->belongsTo('App\Models\Comment');
    }
    
}
