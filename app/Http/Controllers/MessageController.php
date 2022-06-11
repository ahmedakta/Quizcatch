<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use App\Models\User;
use App\Models\Message;
use App\Models\Quiz;

class MessageController extends Controller
{
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
            $key = 9;
            $active_tabs = null;
            $user = User::findOrFail(Auth::user()->id);
            $users  = User::all();
            $profile  =$user->profile;
            $messages = Message::all();
            $quiz_count =Quiz::where('user_id',Auth::user()->id)->get()->count();
        return view('user.messages',compact('key','active_tabs','user','quiz_count','users','profile','messages'));
    }
    public function about()
    {
        return view('home.about');
    }
    public function sendMail(Request $request)
    {
        Mail::to('quiizcatch@gmail.com')->send(new ContactEmail());
        return redirect()->back();
    }
}
