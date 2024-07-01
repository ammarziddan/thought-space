<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        return view('topics', [
            'title' => 'Explore Topics',
            'tags' => Tag::all()
        ]);
    }

    public function show(Tag $tag)
    {
        $posts = $tag->posts()
                     ->with(['user', 'tags'])
                     ->filter(request(['search']))
                     ->paginate(5)
                     ->withQueryString();

        return view('topic', [
            'title' => $tag->name,
            'searchVal' => "Search stories about $tag->name",
            'tag' => $tag,
            'posts' => $posts
        ]);
    }

    public function search(Request $request)
    {
        $term = $request->input('q');
        $topics = Tag::where('name', 'LIKE', "%$term%")
                         ->limit(10)
                         ->get()
                         ->map(function($topic) {
                            return ['id' => $topic->id, 'text' => $topic->name];
                         });
        
        return response()->json($topics);
    }
}
