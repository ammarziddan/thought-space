<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        $tags = [
            'Programming', 'Web Design', 'Personal', 'Marketing', 
            'Business', 'Productivity', 'Health', 'Education'
        ];

        foreach ($tags as $tagName) {
            Tag::create([
                'name' => $tagName,
                'slug' => Str::slug($tagName)
            ]);
        }

        $posts = Post::factory(50)->create();

        $allTags = Tag::all();
        foreach ($posts as $post) {
            $post->tags()->attach($allTags->random(mt_rand(1,4)));
        }
    }
}
