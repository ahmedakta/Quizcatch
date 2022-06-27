<?php

namespace App\Models;

use GuzzleHttp\Psr7\Query;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class Accomplishment extends Model
{
    const ACTIVE = 1;
    const NOT_ACTIVE = 0;
    use HasFactory;
    protected $table = 'accomplishments';
    protected $fillable = [
        'user_id',
        'silver',
        'gold',
        'diamond',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function scopeAccomplishment($query,$quiz_count,$user_id)
    {
        $query = $query->where('user_id',$user_id)->first();
        if($quiz_count < 5){
            if(Auth::user()->id == $user_id){

                return 'you dont have reward.Make some quiz!';
            }
            return 'No reward';

        }
        if($quiz_count >= 20){
            // dd('rozetiniz yok');
            $query->diamond = Accomplishment::ACTIVE;
            $query->save();
            $photo = [URL::asset('media/reward/diamond.png'),URL::asset('media/reward/gold.png'),URL::asset('media/reward/silver.png')];
            // $photo = URL::asset('media/reward/diamond.png');
            return $photo;
        }
        if($quiz_count >= 10 ){
            // dd('rozetiniz yok');
            $query->gold = Accomplishment::ACTIVE;
            $query->save();
            $photo = [URL::asset('media/reward/gold.png'),URL::asset('media/reward/silver.png')];
            return $photo;
        }
        if($quiz_count >= 5){
            // dd('rozetiniz yok');
            // dd($query);
            $query->silver = Accomplishment::ACTIVE;
            $query->save();
            $photo = [URL::asset('media/reward/silver.png')];
            return $photo;
        }
       
       
        return $query->where('user_id',Auth::user()->id)->first();
    }
}
