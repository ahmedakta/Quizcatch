<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Question;
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
        // dd();
        // dd(request('search'));
        $key = 0;
        $active_tabs = 0;
        $quizzes = Quiz::latest()->get();
        $search = request('search');
        // $posts = $user->posts()->with('likes')->latest()->where('private','=',Post::PRIVATE_POST)->get(); 
        // dd($quizzes);
        $id = Auth::user()->id;
        // if ($ud == NULL) {
        //     return (route('login'));
        // }
        $profile =Profile::where('user_id',$id)->first();
        if($profile == null){
            $profile = new Profile();
            $profile->user_id = Auth()->user()->id;
            $profile->save();
        }
        $quiz_count =Quiz::where('user_id',$id)->get()->count();
        // $check =Question::whereNotNull('quiz_id')->get()->count();
        $user = User::find($id);
        // dd($profile->all());
        // dd($user->name);
        return view('home.home',['quizzes' =>Quiz::latest()->filter()->simplePaginate(6),
                                 'key'=>$key,
                                 'active_tabs'=>$active_tabs,
                                 'user'=>$user,
                                 'search'=>$search
                                 ,'profile'=>$profile
                                 ,'quiz_count'=>$quiz_count]);
        // return Quiz::latest()->filter()
        // ->pageinate();
    }
    public function getQuizzes()
    {
        return ;
        // if(request('search')){
        //     $quizzes->where('title','like', '%' . request('search') . '%');
        //     $quizzes->orWhere('explanation','like', '%' . request('search') . '%');
        // }
        // return $quizzes->get();
    }
}
