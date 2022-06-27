<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
    public function quiz(){
        return $this->belongsTo('App\Models\Quiz','quiz_id');
    }
    public function scopeResults($query,$id)
    {
        $results = Result::query()
            ->with(['quiz' => function ($query) {
                $query->select('id', 'slug','title');
            }])
            ->where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
            // dd(sizeof($results));
        return $results;
    }
}
