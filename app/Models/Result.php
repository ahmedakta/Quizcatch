<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $table = 'results';
    protected $fillable = [
        'user_id',
        'quiz_id',
        'result',        
    ];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function quizzes(){
        return $this->belongsTo('App\Models\Quiz','quiz_id');
    }
}
