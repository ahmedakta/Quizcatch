<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Profile;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Question;
use App\Models\Option;
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
        $quizzes = Quiz::where('user_id',$id)->orderBy('created_at','DESC')->get()->all();
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
                'end_time' => $request->end_time,
                'explanation'=>$request->explanation,
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
            $quiz = new Quiz();
            $quiz->fill($data);
            $quiz->save();
        }
        // return  redirect()->route('quizzes');
        return  redirect()->route('questions.form',['id'=>$quiz->id,'slug'=>$quiz->slug]);

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
    public function quiz_catch($quiz_id,$quiz)
    {
        // dd($quiz->questions()->count());
        $quiz =Quiz::find($quiz_id);
        if($quiz ==null){
            return redirect()->back();
        }
        if($quiz->questions()->count() == 0){
            return redirect()->back();
        }
        // dd($quiz);
        // $questions = $quiz->questions()->with(['options'=>function($query){
        //     $query->select('option_text','iscorrect');
        // }])->get();
        // dd($quiz->questions()->get());
        $questions = $quiz->questions()->with(['options'])->get();
        // dd($quiz->questions()->count());
        return view('home.quizzes.quiz',compact('questions'));
        // dd($questions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        ///
    }
    public function submitQuiz(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::user()->id;
        $quiz_id = $request->quiz_id;
        $request->validate([
            "selected" => "array",
        ]);
        $score = 0;
        if($request->selected == null){
            $result = Result::create([
                'user_id'=>$user_id,
                'quiz_id'=>$quiz_id,
                'result'=>$score, 
            ]);
            $result->save();
        }else{
            foreach ($request->selected as $p) {
                $find = Option::find($p);
                if($find->iscorrect == 1){
                    $score++;
                }
                // dd($find);
                // echo $p;
            }
            $result = Result::create([
                'user_id'=>$user_id,
                'quiz_id'=>$quiz_id,
                'result'=>$score, 
            ]);
            $result->save();
        }
        return redirect()->route('quiz.my-results');

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

    public function quiz_result($quiz_slug)
    {
        $quiz = Quiz::where('slug',$quiz_slug)->get()->first();
        $owner = $quiz->user_id;
        if($owner == Auth::user()->id){
            $key = 0;
            $active_tabs = null;
            $id = Auth::user()->id;
            $quiz_count = Quiz::where('user_id',$id)->get()->count();
            $quizzes = Quiz::where('user_id',$id)->with('result')->get();
            $profile =Profile::where('user_id',$id)->first();
            $user = User::find($id);
    
            $results = Result::where('quiz_id',$quiz->id)->get()->all();
            return view('home.quizzes.results',compact('key','active_tabs','profile','user','quiz_count','quizzes','results','quiz'));
        }
        return redirect()->back()->with('message', "You Cant See This Quiz Results");            
        // dd($quiz_id);
    }
    public function my_results()
    {
            $id = Auth::user()->id;
            $user = User::find($id);
            $key = 0;
            $active_tabs = null;
            $quiz_count = Quiz::where('user_id',$id)->get()->count();
            $quizzes = Quiz::where('user_id',$id)->with('result')->get();
            $profile =Profile::where('user_id',$id)->first();
    
            // $results = Result::results('user_id',$id)->get()->all();
            $results = Result::results($id);
            // $dneme = Result::find(1)->get();
            return view('home.quizzes.my-results',compact('key','active_tabs','profile','user','quiz_count','quizzes','results'));
     
        // dd($quiz_id);
    }


    public function destroy(Request $request)
    {
        // dd('quiz');
        // $quiz = Quiz::findOrFail($quiz->id);
        // // dd($quiz->title);
        // if($quiz->user_id == Auth::user()->id){
        //     $quizDeleted = $quiz->Delete();
        //     if ($quizDeleted) {
        //         return back()->with('message','deleted');
        //     }
        // }else{
        //     return back()->with('message', 'Seems to have gotten a problem');
        // }
        $quiz = Quiz::find($request->quiz_id);
        // dd($quiz->title);
        if($quiz->user_id == Auth::user()->id){
                $quiz->Delete();
        }
    }
}
