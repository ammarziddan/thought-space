<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'tags'])
                       ->latest()
                       ->filter(request(['search']))
                       ->paginate(5)
                       ->withQueryString();

        return view('home', [
            'title' => 'Thought Space', 
            'searchVal' => "What's on your mind?",
            'posts' => $posts,
            'users' => User::where('id', '!=', auth()->id())->latest()->take(4)->get(),
            'tags' => Tag::latest()->take(6)->get()
        ]);
    }
}
