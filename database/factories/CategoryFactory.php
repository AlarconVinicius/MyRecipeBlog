<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fake_images = [
            'cat-1.jpg',
            'cat-2.jpg',
            'cat-3.jpg',
            'cat-4.jpg',
            'cat-5.jpg',
            'cat-6.jpg',
            'cat-7.jpg',
            'cat-8.jpg',
            'cat-9.jpg',
            'cat-10.jpg',
        ];
        return [
            'nome' => $this->faker->word(),
            'slug' => $this->faker->unique()->slug(),
            'imagem' => 'default_categories/' . $this->faker->randomElement($fake_images),
            'user_id' => User::all()->random(1)->first()->id,
        ];
    }
}
