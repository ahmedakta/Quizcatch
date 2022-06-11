<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Quiz;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($user_name)
    {
        // dd($user_name);
        $user = User::where('user_name',$user_name)->get()->first();
        if($user==null){
            return redirect()->back()->with('message', "User Not Found");            
        }
        $likes = Like::where('like',1)->get();
        $posts = Post::where('user_id',$user->id)->get()->sortByDesc('created_at');
        $quizzes = Quiz::where('user_id',$user->id)->get();
        $profile = $user->profile;
        return view('user.profile',compact('user','quizzes','profile','posts','likes'));




        // if ($user_name == Auth::user()->name) {
        //     $key = 3;
        //     $user_id = Auth::user()->id;
        //     $user = User::findOrFail($user_id);
        //     $profile = Profile::where('user_id',$user_id)->get()->first();
        //     $quizzes = Quiz::where('user_id',$user_id)->get();
        //     $likes = Like::where('like',1)->get();
        //     $posts = Post::where('user_id',$user_id)->get()->sortByDesc('created_at');
        //     if($user->profile == null) {

        //         $profile = Profile::create([
        //             'gender'=> '',
        //             'about' => 'Hi I Using QuizCatch',
        //             // 'name'=>$user->name,
        //             'user_id' => Auth::user()->id,                
        //             'date_of_birth' => '2011-12-02',
        //             'phone_number' =>'',
        //             'education'=> '',
        //             // 'email' =>$user->email,
        //             // 'phone_number' =>$user->phone_number,
        //         ]);
        //     }
        //     return view('user.profile',compact('key','user','quizzes','profile','posts','likes'));
        // }
        // dd($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $genderArray = ['male','female'];
        $user = User::findOrFail($user_id);;
        $profile = Profile::where('user_id',$user_id)->get()->first();
        return view('user.profile-edit',compact('user','profile','genderArray'));
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
    public function update(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $user->name = $request->name ;
        $user->profile->gender = $request->gender ;
        $user->profile->date_of_birth = $request->date_of_birth ;
        // $user->profile->photo='uploads/profile_photo/'.$newPhoto;
        $user->profile->about = $request->about ;
        $user->profile->phone_number = $request->phone ;
        $user->profile->education = $request->education ;
        $user->email = $request->email ;
        // $user->photo = $request->photo;
        $user->save();
        $user->profile->save();
        if ($request->has('new_password')) {
            //to do work on validate old password and new password confirmation.
            $user->password = Hash::make($request->new_password);
            $user->save();
            $user->profile->save();
        }
        if ($request->has('image')) {
            // dd(1);
            $photo = $request->image;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/profile/images',$newPhoto);  
            $user->profile->photo ='uploads/profile/images/'.$newPhoto;            
          
            $user->save();
            $user->profile->save();
        }
        return redirect()->back()->with('message', "Updated !");            
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
}
