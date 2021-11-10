<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'tips',
                'display_name' => 'Tips',
            ],
            [
                'id' => 2,
                'name' => 'activism',
                'display_name' => 'Activismo',
            ],
            [
                'id' => 3,
                'name' => 'informative',
                'display_name' => 'Informativo',
            ],
            [
                'id' => 4,
                'name' => 'health',
                'display_name' => 'Salud',
            ],
        ];

        \DB::table('blog_categories')->insert($categories);
    }
}
