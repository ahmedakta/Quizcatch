<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Profile;
use App\Models\Quiz;
use App\Models\Tournament;
class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);
        $key = 0;
        $quizzes = Quiz::all()->orderBy('created_at','DESC');
        $id = Auth::user()->id;
        $profile =Profile::where('user_id',$id)->first();
        $user = User::find($id);
        $quiz_count =Quiz::where('user_id',$id)->get()->count();
        dd($user->name);
        return view('home.home',compact('quizzes','key','user','profile','quiz_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Quiz();
        $key = 0;
        $active_tabs = null;
        $id = Auth::user()->id;
        $quiz_count =Quiz::where('user_id',$id)->get()->count();
        $profile =Profile::where('user_id',$id)->first();

        $user = User::find($id);

        return view('home.quizzes.form',compact('key','user','quiz_count','profile','model','active_tabs'));
    }
    public function my_quizzes()
    {
        $model = new Quiz();
        $key = 0;
        $active_tabs = null;
        $id = Auth::user()->id;
        $quizzes = Quiz::where('user_id',$id)->get()->all();
        $quiz_count = Quiz::where('user_id',$id)->get()->count();
        $profile =Profile::where('user_id',$id)->first();
        $user = User::find($id);
        return view('home.quizzes.my-quizzes',compact('key','user','quiz_count','profile','model','quizzes','active_tabs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // $imageName = time().'.'.$request->image->extension();
        // $request->image->move(public_path('images'), $imageName);

        if($request->has('image')){
            $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
            $photo = $request->image;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/quizzes/images',$newPhoto);
            $quiz = Quiz::create([
                'user_id'=>Auth::id(),
                'image'=>'uploads/quizzes/images/'.$newPhoto,
                'title'=>$request->title,
                'to_be_continued' => $request->to_be_continued,
                'slug'=>\Str::slug($request->title),
                'explanation'=>$request->explanation,
                'started_at'=>$request->started_at,
                'stopped_at'=>$request->stopped_at,
                // 'slug'=>str_slug($request->product_name),
                // 'category_id'=>$request->category_id,
            ]);
            $quiz->save();
        }else{
            $key = 0;
            $id = Auth::user()->id;
            $quiz_count =Quiz::where('user_id',$id)->get()->count();
            $profile =Profile::where('user_id',$id)->first();
            $user = User::find($id);
            $data = request()->all();
            $data['user_id']=Auth::user()->id;
            $data['slug']=\Str::slug($data['title']);
            $post = new Quiz();
            $post->fill($data);
            $post->save();
        }
        // return  redirect()->route('quizzes');
        return  redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($quiz_slug)
    {
        // dd($quiz_id);
        $key = 0;
        $active_tabs = null;
        $id = Auth::user()->id;
        $quiz_count = Quiz::where('user_id',$id)->get()->count();
        $profile =Profile::where('user_id',$id)->first();
        $user = User::find($id);
        $quiz = Quiz::where('slug',$quiz_slug)->get()->first();
        return view('home.quizzes.show',compact('quiz','key','active_tabs','profile','user','quiz_count'));
    }
    public function quiz_catch($quiz_id)
    {
        $quiz =Quiz::find($quiz_id);
        $questions = $quiz->questions()->with(['options'=>function($query){
            $query->select('option_text','iscorrect');
        }])->get();
        // dd($questions);
        return view('home.quizzes.quiz',compact('questions'));
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
}
