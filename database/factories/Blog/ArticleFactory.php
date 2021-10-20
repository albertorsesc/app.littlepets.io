<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Article;
use App\Models\Blog\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
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
            'image' => UploadedFile::fake()->image('img.png', '10', '10'),
            'published_at' => null,
        ];
    }

    public function published() : ArticleFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'published_at' => $this->faker->dateTime,
            ];
        });
    }

    public function withCategories() : ArticleFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'categories' => $this->faker->randomElements(BlogCategory::query()->inRandomOrder()->get()->toArray()),
            ];
        });
    }
}
