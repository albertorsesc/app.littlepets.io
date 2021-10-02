<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $title = $this->faker->sentence,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->paragraph,
            'body' => $this->faker->paragraph,
        ];
    }
}
