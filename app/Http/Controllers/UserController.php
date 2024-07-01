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
            'users' => User::where('id', '!=', auth()->id())->get()
        ]);
    }

    public function show(User $user) 
    {
        $posts = $user->posts()
                      ->with(['tags', 'user'])
                      ->latest()
                      ->filter(request(['search']))
                      ->paginate(5)
                      ->withQueryString();

        return view('user', [
            'title' => "$user->name | @$user->username",
            'searchVal' => "Search stories from $user->name",
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
