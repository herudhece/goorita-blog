<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph(300),
            'short_description' => $this->faker->paragraph(2),
            'user_id' => 1,
            'image' => '1650076813.jpg',
            'published_date' => now()
        ];
    }
}
