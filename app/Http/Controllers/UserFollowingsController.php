<?php

namespace App\Http\Controllers;

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
}
