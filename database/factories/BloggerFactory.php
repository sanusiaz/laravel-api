<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogger>
 */
class BloggerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // A, B, D, V
        $status = $this->faker->randomElement(['A', 'B', 'D', 'V']);
        return [
            'name' => $this->faker->name(),
            'title' => $this->faker->title(),
            'address' =>  $this->faker->streetAddress(),
            'salary' => $this->faker->numberBetween(100, 3030393),
            'status' => $status,
            'deleted_name' => ( $status == 'D' ) ? $this->faker->dateTimeThisDecade() : null ,
            'blocked_date' => ( $status == 'B' ) ? $this->faker->dateTimeThisDecade() : null
        ];
    }
}
