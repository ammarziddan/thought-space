<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::latest();

        if( request('search') ) {
            $post->where('title', 'like', '%'.request('search').'%')
                 ->orWhere('body', 'like', '%'.request('search').'%');
        }

        return view('home', [
            'title' => 'Thought Space', 
            'posts' => $post->paginate(5),
            'users' => User::latest()->take(4)->get()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'title' => "{$post->title} | {$post->user->name}",
            'post' => $post
        ]);
    }
}
