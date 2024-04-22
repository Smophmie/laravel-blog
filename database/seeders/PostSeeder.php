<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    

        $categories = Category::All();

        Post::factory(1)->create()->each(function($posts) use ($categories) {
            $posts->categories()->attach($categories->random());
        });
    }
}
