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
            'sobre_resumo' => $this->faker->paragraph(2, true),
            'sobre_quem_somos' => $this->faker->paragraph(10, true),
            'sobre_image' => 'img/placeholders/about_image.jpg',
        ];
    }
}
