<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Quiz;
use App\Models\Tournament;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        // dd($request);
        $key = 0;
        $quizzes = Quiz::all();
        return view('home.home',['type'=>'asd'],compact('quizzes','key'));
    }
    public function try()
    {
        return view('test');
    }
}
