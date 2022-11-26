<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Difficulty;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    protected $model = Post::class;
    
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(),
            'slug' => $this->faker->unique()->slug(),
            'resumo' => $this->faker->sentence(),
            'conteudo' => $this->faker->paragraph(),
            'tempo_preparo' => $this->faker->randomDigit(),
            'qtd_porcao' => $this->faker->randomDigit(),
            'user_id' => User::all()->random(1)->first()->id,
            'category_id' => Category::all()->random(1)->first()->id,
            'difficulty_id' => Difficulty::all()->random(1)->first()->id
        ];
    }
}
