<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Quiz;
use App\Models\Tournament;
class PostController extends Controller
{
    public function index()
    {
        $key = 1;
        $posts = Post::all();
        return view('home.post',compact('posts','key'));
    }
}
