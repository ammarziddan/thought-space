<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    // protected $with = ['user', 'tags'];

    public static function getFilteredPosts(Request $request, $relation = null)
    {
        $query = self::with(['user', 'tags']);
        if ($relation) {
            $query = $relation->posts()->with(['user', 'tags']);
        }

        return $query->latest()
                     ->filter($request->only(['search']))
                     ->paginate(5)
                     ->withQueryString();
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%'.$search.'%')
                         ->orWhere('body', 'like', '%'.$search.'%');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
