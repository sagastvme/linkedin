<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title'=>$this->faker->sentence(5),
            'description'=>$this->faker->sentence(50),
        'cover'=>$this->faker->uuid(). '.jpg',
        'likes'=>$this->faker->randomNumber(),
        'user_id'=>$this->faker->randomElement([6,7])

        ];

    }
}
