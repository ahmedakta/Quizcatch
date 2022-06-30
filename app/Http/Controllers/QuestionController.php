<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Option;
use App\Models\Question;
use App\Models\Profile;
use App\Models\Quiz;
use App\Models\Tournament;


class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(Request $request)
    {
        // $quiz_slug = $request->route('quiz_slug');
            // dd($request->id);
        // dd('this');
        // dd($request->id);
        $quiz_id = $request->id;
        $quiz = Quiz::find($request->id);
        if(!$quiz){
            return redirect()->back();
        }
        if ($quiz->user_id != Auth::user()->id) {
            return redirect()->back();
        }
        $key = 0;
        $active_tabs = 1;
        $posts = Post::all()->sortByDesc('created_at');
        $id = Auth::user()->id;
        $user = User::find($id);
        $quiz_count =Quiz::where('user_id',$id)->get()->count();
        if ($quiz_count == null) {
            return redirect()->route('quiz.create');
        }
        $profile =Profile::where('user_id',$id)->first();
        $quizzes = Quiz::all();
        // dd($user->name);
        return view('home.questions.form',compact('posts','quiz','key','user','quizzes','profile','quiz_count','active_tabs','quiz_id'));
    }
    public function myQuizzes()
    {
      
        $key = 0;
        $posts = Post::all()->sortByDesc('created_at');
        $id = Auth::user()->id;
        $user = User::find($id);
        $quiz_count =Quiz::where('user_id',$id)->get()->count();
        $myQuizzes =Quiz::where('user_id',$id)->get();
        if ($quiz_count == 0) {
            return redirect()->route('quiz.create');
        }
        $profile =Profile::where('user_id',$id)->first();
        // dd($user->name);
        return view('home.quizzes.quizzes',compact('posts','key','user','myQuizzes','profile','quiz_count'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        if($request->has('image')){
        //     $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        // ]);
            $photo = $request->image;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/quizzes/questions/images',$newPhoto);
            $question = Question::create([
                'quiz_id'  => $request->quiz_id,
                'image'=>'uploads/quizzes/questions/images/'.$newPhoto,
                'title'=>$request->title,
                'explanation'=>'',
                'hint'=>$request->hint,
            ]);
            $question->save();
            // dd($question->id);

            $options_data = [
                ["question_id"=>$question->id,"option_text" => $request['option_1'], "iscorrect"=>0],
                ["question_id"=>$question->id,"option_text" => $request['option_2'], "iscorrect"=>0],
                ["question_id"=>$question->id,"option_text" => $request['option_3'], "iscorrect"=>0],
                ["question_id"=>$question->id,"option_text" => $request['option_4'], "iscorrect"=>0],
            ];
            $option = new Option();
            $options_data[$request->iscorrect]['iscorrect'] = 1;
            $option->insert($options_data);
        }else{
            $key = 0;
            $id = Auth::user()->id;
            $quiz_count =Quiz::where('user_id',$id)->get()->count();
            $profile =Profile::where('user_id',$id)->first();
            $user = User::find($id);
            $data = $request->all();
            $data['quiz_id'] == $request->id;
            $question = new Question();
            $question->fill($data);

            $question->save();
            $options_data = [
                ["question_id"=>$question->id,"option_text" => $request['option_1'],"iscorrect"=>0],
                ["question_id"=>$question->id,"option_text" => $request['option_2'],"iscorrect"=>0],
                ["question_id"=>$question->id,"option_text" => $request['option_3'],"iscorrect"=>0],
                ["question_id"=>$question->id,"option_text" => $request['option_4'],"iscorrect"=>0],
            ];
            // $question->request['iscorrect'] == 1;
            $option = new Option();
            $options_data[$request->iscorrect]['iscorrect'] = 1;
            // dd($question->options()->find($request->iscorrect));
            $option->insert($options_data);
            // dd($question->options()->find($request->iscorrect));
        }
        return redirect()->back();
    }
}
