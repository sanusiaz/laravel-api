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
    public function definition()
    {
        return [
            'slug'              => $this->faker->slug(),
            'blogger_id'        => Blogger::factory(),
            'featured_image'    => $this->faker->imageUrl(),
            'title'             => $this->faker->sentence(2),
            'body'              => $this->faker->sentence(10),
            'author'            => $this->faker->name
        ];
    }
}
