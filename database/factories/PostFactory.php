<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(5,8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->sentence(mt_rand(7,18)),
            'user_id' => mt_rand(1,10),
            'thumbnail' => mt_rand(11,30).'.jpg',
            'img_desc' => $this->faker->sentence(7,11),
            // 'body' => '<p>'.implode('<p></p>', $this->faker->paragraphs(mt_rand(7,10))).'</p>'
            'body' => collect($this->faker->paragraphs(mt_rand(6,10)))
                        ->map(fn($p) => "<p>$p</p>")
                        ->implode('')
        ];
    }
}
