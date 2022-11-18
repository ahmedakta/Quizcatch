<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $quizzes = Quiz::count();
        $posts = Post::count();
        $tournaments = Tournament::count();
        $catched_quizzes = Result::count();
        return view('admin.admin',compact('users','posts','quizzes','tournaments','catched_quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function deleteUser(Request $request)
    {
        if (Auth::user()->role == 1) {
            $user = User::find($request->user_id);
            $user->delete();
        }
    }
    public function deleteQuiz(Request $request)
    {
        if (Auth::user()->role == 1) {
            $quiz = Quiz::find($request->quiz_id);
            $quiz->delete();
        }
    }
    public function deletePost(Request $request)
    {
        if (Auth::user()->role == 1) {
            $post = Post::find($request->post_id);
            $post->delete();
        }
    }
    public function quizzes(Request $request)
    {
        $users = User::count();
        $quizzes = Quiz::all();
        $posts = Post::count();
        $tournaments = Tournament::count();
        $catched_quizzes = Result::count();
        return view('admin.quizzes',compact('users','posts','quizzes','tournaments','catched_quizzes'));
    }
    public function posts(Request $request)
    {
        $users = User::count();
        $quizzes = Quiz::count();
        $posts = Post::all();
        $tournaments = Tournament::count();
        $catched_quizzes = Result::count();
        return view('admin.posts',compact('users','posts','quizzes','tournaments','catched_quizzes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updatePassword(Request $request)
    {
        // dd($request->all());
            # Validation
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ]);
    
    
            #Match The Old Password
            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->with("error", "Old Password Doesn't match!");
            }
    
    
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
    
            return back()->with("status", "Password changed successfully!");
    }
}
