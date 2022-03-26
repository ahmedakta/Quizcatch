<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Quiz;
use App\Models\Tournament;
class TournamentController extends Controller
{
    public function index()
    {
        $key = 2;
        $tournaments = Tournament::all();
        return view('home.tournament',compact('tournaments','key'));
    }
}
