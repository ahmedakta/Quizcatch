<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
                'content' => 'required|string|min:1|max:80',
            ]);
        $post_id  =$request->post_id;
        $comment = Comment::create([
            'user_id'=>Auth::user()->id,
            'post_id'=>$post_id,
            'content'=>$request->content,
        ]);
        $comment->save();
        return null;
    }
    public function destroy(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $post = Post::find($comment->post_id);

        if($post->user_id == Auth::user()->id){
            $comment->Delete();
        }
        if($comment->user_id == Auth::user()->id){
            $comment->Delete();
        }

    }
}
