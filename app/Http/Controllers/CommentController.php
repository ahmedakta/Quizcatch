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
        $post_id  =$request->post_id;
        $comment = Comment::create([
            'user_id'=>Auth::user()->id,
            'post_id'=>$post_id,
            'content'=>$request->content,
        ]);
        $comment->save();
        return null;
    }
}
