<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index(User $user)
    {
	$followees = $user->following;
	$followers = $user->followers;
        return view('users.index', ['followees' => $followees, 'followers' => $followers])->withUser($user);
    }

    public function follow(Request $request, User $user)
    {
        if ($request->user()->canFollow($user)) {
            $request->user()->following()->attach($user);
        }

        return redirect()->back();
    }

    public function unfollow(Request $request, User $user)
    {
        if ($request->user()->canUnfollow($user)) {
            $request->user()->following()->detach($user);
        }

        return redirect()->back();
    }
}
