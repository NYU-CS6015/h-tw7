<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Post;

class TimelineController extends Controller
{

    public function index(Request $request, Post $post)
    { 
        $allPosts = $post->whereIn(
            'user_id',
            $request->user()->following()->lists('users.id')->push($request->user()->id)
        )->with('user');

        $posts = $allPosts->orderBy('created_at', 'desc')
            ->take($request->get('limit', 20))
            ->get();

        return view('home', ['allPosts' => $allPosts, 'posts' => $posts]);
    }
}
