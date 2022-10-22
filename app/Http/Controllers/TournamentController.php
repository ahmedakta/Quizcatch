<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Profile;
use App\Models\Quiz;
use App\Models\Tournament;
class TournamentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // dd(1);
        // dd($user);
        $id = Auth::user()->id;
        $user = User::find($id);
        $quizzes = Quiz::all();
        $profile =Profile::where('user_id',$id)->first();
        $quiz_count =Quiz::where('user_id',$id)->get()->count();
        $key = 2;
        $active_tabs = null;
        $tournaments = Tournament::all();
        return view('home.tournaments.index',compact('tournaments','key','active_tabs','user','quizzes','profile','quiz_count'));
    }
    // make tournamnet
    public function create()
    {
        return view('home.tournaments.create');
    }
}
