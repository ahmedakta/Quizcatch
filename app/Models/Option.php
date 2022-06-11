<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $table = 'questions_options';
    protected $fillable = [
        'question_id',
        'option_text',
        'iscorrect',
    ];
    public function question(){
        return $this->belongsTo('App\Models\Question','question_id');
    }
}
