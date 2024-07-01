<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create', [
            'title' => 'Write your stories',
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:150|min:5',
            'img_desc' => 'nullable',
            'tags' => 'required|max:4',
            'body' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body']), 100);

        $post = Post::create($validatedData);

        $post->tags()->sync($validatedData['tags']);
        return redirect('/users/'.auth()->user()->username)->with('success', 'Congratulations! Your story has just been published.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $posts = Post::latest()->filter(request(['search']))
                               ->paginate(5)
                               ->withQueryString();

        return view('post.index', [
            'title' => "{$post->title} | {$post->user->name}",
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if($post->user->id !== auth()->user()->id) {
            abort(403);
        }

        return view('post.edit', [
            'title' => "Edit $post->title",
            'post' => $post,
            'tags' => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:150|min:5',
            'img_desc' => 'nullable',
            'tags' => 'required|array|max:4',
            'body' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body']), 100);
        
        $post->update($validatedData);

        $post->tags()->sync($validatedData['tags']);

        return redirect('/users/'.auth()->user()->username)->with('success', 'Your story has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->user->id !== auth()->user()->id) {
            abort(403);
        }

        $post->tags()->detach();

        Post::destroy($post->id);
        return redirect('/users/'.auth()->user()->username)->with('success', 'Story has been deleted');
    }
}
