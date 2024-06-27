<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users', [
            'title' => 'Explore Authors',
            'users' => User::all()
        ]);
    }

    public function show(User $user) 
    {
        $posts = Post::where('user_id', $user->id)->paginate(5);

        return view('user', [
            'title' => "$user->name | @$user->username",
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
