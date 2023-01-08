<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Image;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Image::class;

    public function definition()
    {
        $fake_images = [
            'post-1.jpg',
            'post-2.jpg',
            'post-3.jpg',
            'post-4.jpg',
            'post-5.jpg',
            'post-6.jpg',
            'post-7.jpg',
            'post-8.jpg',
            'post-9.jpg',
            'post-10.jpg',
        ];
        return [
            'nome' => $this->faker->word(),
            'extensao' => 'jpg',
            'path' => 'default_posts/' . $this->faker->randomElement($fake_images)
        ];
    }
}
