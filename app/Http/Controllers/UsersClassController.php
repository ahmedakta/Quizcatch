<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Quiz;
use App\Models\User;
use App\Models\UsersClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersClassController extends Controller
{
    public function index()
    {
        $key = 30;
        $active_tabs = 0;
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        // $posts = Post::has('saves')->where('user_id',$id)->with('likes','saves')->latest()->get()->all(); 
        //  dd($posts[0]->user_id);
        $quiz_count =Quiz::where('user_id',$id)->get()->count();
        $profile =Profile::where('user_id',$id)->first();
        $classes = UsersClass::all();
        return view('class.index',compact('classes','key','active_tabs','user','profile','quiz_count'));
    }
    public function store(Request $request)
    {
        $classes = UsersClass::create([
            'creator_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'private' => $request->private,
            'limit' => $request->limit,
            'password' => Hash::make($request['password']),
        ]);
        if($request->has('image')){
            $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $photo = $request->image;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/classes/images',$newPhoto);
        $classes['image'] ='uploads/classes/images/'.$newPhoto;
        }
        $classes->save();
        return redirect()->route('class.index');
    }
    public function join(Request $request)
    {
        $input = $request;
        $user = User::find(Auth::user()->id);
        $class = UsersClass::where('slug',$input['class'])->get()->first();
        if($user->classes->find($class)) {
            // $joined = $user->classes()->first();
            // dd($joined->name);
            // $user->classes->find($class)->delete();
             return redirect()->back()->with('message','you current in this class');
        }
        if ($class->private == 1) {
            if (Hash::check(request('password'), $class->password)) {
                // dd('pasword is correct');
                $class->users()->attach($user);
            }else{
                return redirect()->back()->with('error','password wrong'); //must be error
            }
            return redirect()->back();
        }
        // dd($class->users->count());
        $class->users()->attach($user);
        return redirect()->back();
    }
    public function create()
    {
        $key = 30;
        $active_tabs = 0;
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        // $posts = Post::has('saves')->where('user_id',$id)->with('likes','saves')->latest()->get()->all(); 
        //  dd($posts[0]->user_id);
        $quiz_count =Quiz::where('user_id',$id)->get()->count();
        $profile =Profile::where('user_id',$id)->first();
        return view('class.create',compact('key','active_tabs','user','profile','quiz_count'));
    }
    public function show(UsersClass $class)
    {
        //create new class
        // dd($class->id);
        $key = 30;
        $active_tabs = null;
        $id = Auth::user()->id;
        $quiz_count = Quiz::where('user_id',$id)->get()->count();
        $profile =Profile::where('user_id',$id)->first();
        $user = User::find($id);
        $class = UsersClass::find($class->id);
        return view('class.show',compact('class','profile','quiz_count','key','active_tabs','user'));
    }
    public function delete($id)
    {
        //create new class
        $class = UsersClass::find($id);
        $class->delete();
        return redirect()->back()->with('message','deleted successfuly');
    }

}
