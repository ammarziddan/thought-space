<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $posts = Post::latest()->filter(request(['search']))
                               ->paginate(5)
                               ->withQueryString();

        return view('post', [
            'title' => "{$post->title} | {$post->user->name}",
            'post' => $post
        ]);
    }
}
