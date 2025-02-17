<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'image' => 'profiles/'.$this->faker->unique()->numberBetween(1,10).'.jpg',
            'short_bio' => $this->faker->sentence(10, 12),
            'password' => bcrypt('password'), // password
            // 'remember_token' => Str::random(10),
        ];
    }
}
