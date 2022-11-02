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
            '1.jpg',
            '2.jpg',
            '3.jpg',
            '4.jpg',
            '5.jpg',
            '6.jpg',
        ];
        return [
            'nome' => $this->faker->word(),
            'extensao' => 'jpg',
            'path' => 'images/' . $this->faker->randomElement($fake_images)
        ];
    }
}
