<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\User;
use App\Models\Save;
use App\Models\Profile;
use App\Models\Quiz;
use App\Models\Tournament;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $key = 1;
        $active_tabs = 1;
        // $posts = Post::where('private','=',Post::PUBLIC_POST)->get()->sortByDesc('created_at');
        $posts = Post::with('likes')->where('private','=',Post::PUBLIC_POST)->latest()->get(); 
        $id = Auth::user()->id;
        // $likes = $posts->likes();
        $user = User::find($id);
        $quiz_count =Quiz::where('user_id',$id)->get()->count();
        $likes = Like::where('like',1)->count();
        $dislikes = Like::where('like',0)->count();
        $profile =Profile::where('user_id',$id)->first();
        $quizzes = Quiz::all();
        // dd($user->name);
        return view('home.post',compact('posts','key','active_tabs','user','quizzes','profile','quiz_count','likes','dislikes'));
    }
    public function private_posts()
    {
        $key = 4;
        $active_tabs = 1;
        
        $id = Auth::user()->id;
        // $user = User::find($id);
        $user = User::findOrFail($id);
        // $posts = $user->posts()->where('private','=',Post::PRIVATE_POST)->get()->sortByDesc('created_at');
        $posts = $user->posts()->with('likes')->latest()->where('private','=',Post::PRIVATE_POST)->get(); 
        // dd($posts);
        $quiz_count =Quiz::where('user_id',$id)->get()->count();
        $profile =Profile::where('user_id',$id)->first();
        return view('home.private-post',compact('posts','key','active_tabs','user','profile','quiz_count'));
    }
    public function saved_posts()
    {
        $key = 5;
        $active_tabs = 1;
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        // $posts = Post::has('saves')->where('user_id',$id)->with('likes','saves')->latest()->get()->all(); 
        $posts = Save::where('user_id',Auth::user()->id)->latest()->get(); 
        //  dd($posts[0]->user_id);
        $quiz_count =Quiz::where('user_id',$id)->get()->count();
        $profile =Profile::where('user_id',$id)->first();
        return view('home.saved-post',compact('posts','key','active_tabs','user','profile','quiz_count'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $this ->validate($request,[
            'content'=>'required',
        ]);
        //adding photo and save.
        // if($request->has('image')){
        //     dd('1');
        // }else if($request->video != null){
        //     dd('0');
        // }
        if($request->has('image')){
            //todo work on validate
            $photo = $request->image;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/posts/images',$newPhoto);
            $post = Post::create([
                'content'=>$request->content,
                'user_id'=>Auth::id(),
                'private'=>$request->private,
                'slug'=>$request->private, 
                'image'=>'uploads/posts/images/'.$newPhoto,
                // 'slug'=>str_slug($request->product_name),
                // 'category_id'=>$request->category_id, 
            ]);
            $post->save();
        }else if($request->has('video')){
            $request->validate([
                'video' => 'required | mimes:mp4',
            ]);
            $file= $request->file('video');
            $newVideo = time().$file->getClientOriginalName();
            $file->move('uploads/posts/videos',$newVideo);
            $post = Post::create([
                'content'=>$request->content,
                'user_id'=>Auth::id(),
                'private'=>$request->private,
                'video'=>'uploads/posts/videos/'.$newVideo,
                // 'slug'=>str_slug($request->product_name),
                // 'category_id'=>$request->category_id, 
            ]);
            $post->save();
        }else{
            $post = Post::create([
                'content'=>$request->content,
                'user_id'=>Auth::id(),
                'private'=>$request->private,
                'image'=>NULL,
                // 'slug'=>str_slug($request->product_name),
                // 'category_id'=>$request->category_id, 
            ]);
            $post->save();
        }
        // $data = request()->all();
        // $data['user_id']=Auth::user()->id;
        // $post = new Post();
        // $post->fill($data);
        // $post->save();
     
        // $post = Post::create([
        //     'content'=>$request->content,
        //     'user_id'=>Auth::id(),
        // ]);
        // $product->category()->attach($request->get('category_id')); 
        return redirect()->back()->with('success','Added successfully.'); 
        // dd($user->name);
    }

    public function postLikePost(Request $request)
    {
        
        // $user_id = $request['userId'];
        $post_id = $request->post_id;
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if(!$post){
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id',$post_id)->first();
        if($like){
            $already_like = $like->like;
            $update = true;
            if($already_like == $is_like){
                $like->delete();
                return null;
            }
        }else{
              $like = new Like();
            }
            $like -> like =  $is_like;
            $like->user_id = $user->id;
            $like->post_id= $request->post_id;
            if($update){
                $like->update();
            }else{
                $like->save();
            }
            return null;
    }
    public function postComments(Post $post)
    {
        $key = 1;
        $active_tabs = 1;
        $id = Auth::user()->id;
        $user = User::find($id);
        $quiz_count =Quiz::where('user_id',$id)->get()->count();
        $profile =Profile::where('user_id',$id)->first();
        $post = Post::find($post->id);
        if ($post->private == 1) {
            return redirect()->back();
        }
        $comments = Post::find($post->id)->comments()->with('user')->get();
        // $postss = $post->with('comments')->get();

        // dd($user->name);
        return view('home.posts.comments',compact('post','key','active_tabs','user','profile','quiz_count','comments'));
    }
    public function postSave(Request $request)
    {
        $post_id = $request->post_id;
        $is_save = $request['isSave'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if ($post->private==1) {
            return redirect()->back();
        }
        if(!$post){
            return null;
        }
        $user = Auth::user();
        $save = $user->saves()->where('post_id',$post_id)->first();
        if($save){
            $already_save = $save->save;
            $update = true;
            if($already_save == $is_save){
                $save->delete();
                return null;
            }
        }else{
              $save = new Save();
            }
            $save -> save =  $is_save;
            $save->user_id = $user->id;
            $save->post_id= $request->post_id;
            if($update){
                $save->update();
            }else{
                $save->save();
            }
            return null;
    }
    public function edit($id)
    {
        return view('home.posts.form');
    }
    public function destroy_savedPost(Request $request)
    {
        $post = Save::findOrFail($request->save_id);
        if($post->user_id == Auth::user()->id){
                $post->Delete();
        }
    }
    public function destroy(Request $request)
    {
        // dd('post');
        // $post = Post::findOrFail($post->id);
        // // dd($quiz->title);
        // if($post->user_id == Auth::user()->id){
        //     $quizDeleted = $post->Delete();
        //     if ($quizDeleted) {
        //         return back()->with('message','deleted');
        //     }
        // }else{
        //     return back()->with('message', 'Seems to have gotten a problem');
        // }
        $post = Post::find($request->post_id);
        // dd($quiz->title);
        if($post->user_id == Auth::user()->id){
            $post->Delete();
        }
    }
}