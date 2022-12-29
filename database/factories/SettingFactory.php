<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sobre_quem_somos' => $this->faker->paragraph(),
            'sobre_image' => 'storage/placeholders/about_image.jpg',
        ];
    }
}
