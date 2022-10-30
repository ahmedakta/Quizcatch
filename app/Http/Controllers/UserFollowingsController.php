<?php

namespace App\Http\Controllers;

use App\Models\FollowUser;
use Illuminate\Http\Request;
use App\Models\User;


class UserFollowingsController extends Controller
{
    public function index(User $user)
    {

        // dd($user);
        return view('user.followings',[
            'followings' => [],
            'profile' => [
                 'user' => $user,
            ],
            'user' => $user,
        ]);
    }
    // Follow User
    public function store(User $user)
    {
        // dd($user);
        $user = Auth::user();
        $followedUser = $user;
        $follow = FollowUser::create([
            'user_id' => $user->id,
            'followed_id' => $followedUser,
        ]);
        $follow->save();
        return redirect()->back()->with('message','Followed Succesfully');
    }
}
