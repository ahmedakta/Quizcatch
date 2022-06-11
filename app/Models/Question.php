<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = [
        'quiz_id',
        'image',
        'title',
        'hint',
        'explanation',
        'imagepath',
    ];

    public function quiz(){
        return $this->belongsTo('App\Models\Quiz','quiz_id');
    }
    public function options(){
        return $this->hasMany('App\Models\Option');
    }
    public function haOptions()
    {
        return $this->hasMany(Option::class);
    }
}
