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

    public function settings(User $user)
    {
        return view('user.setting', [
            'title' => 'Account Settings',
            'user' => $user
        ]);
    }

    public function update (Request $request) 
    {
        if ($user->id !== auth()->id()) {
            abort(403);
        }

        $user = auth()->user();

        $rules = [];
        // $data = [];

        if( $request->has('name') || $request->has('short_bio') || $request->has('image') ) {
            $rules['name'] = 'required|max:255';
            $rules['short_bio'] = 'nullable|max:1000';
            $rules['image'] = 'nullable|mimes:jpg,jpeg,png,bmp,webp|max:1024';
        }


    }
}
