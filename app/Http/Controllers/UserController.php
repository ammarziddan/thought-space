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

    public function show(Request $request, User $user) 
    {
        $posts = Post::getFilteredPosts($request, $user);

        return view('user', [
            'title' => "$user->name | @$user->username",
            'searchVal' => "Search stories from $user->name",
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function settings(User $user)
    {
        // if ($user->id !== auth()->id()) {
        //     abort(403);
        // }

        $this->authorize('update', $user);

        return view('user.setting', [
            'title' => 'Account Settings',
            'user' => $user
        ]);
    }

    public function update (Request $request, User $user) 
    {
        // if ($user->id !== auth()->id()) {
        //     abort(403);
        // }

        $this->authorize('update', $user);

        $rules = [];

        // Profile Info
        if( $request->has('name') || $request->has('short_bio') || $request->has('image') ) {
            $rules['name'] = 'required|max:255';
            $rules['short_bio'] = 'nullable|max:1000';
            $rules['image'] = 'nullable|mimes:jpg,jpeg,png,bmp,webp|max:1024';
        }

        // Email
        if( $request->has('email') && $request->email !== $user->email ) {
            $rules['email'] = 'required|email|unique:users';
        }

        // Username
        if( $request->has('username') && $request->username !== $user->username ) {
            $rules['username'] = 'required|min:5|max:255|unique:users';
        }

        $validatedData = $request->validate($rules);

        // Profile Image
        // TODO: hapus gambar lama jika berubah
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('profiles');
        }

        // $oldUsername = $user->username;

        $user->update($validatedData);

        $newUsername = $user->username;

        return redirect()->back()->with('success', 'Successfully updated your account!');

    }
}
