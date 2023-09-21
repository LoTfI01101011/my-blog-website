<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $categories = Category::factory(10)->create();

        $categories->each(function ($category) {
            Post::factory(3)->create([
                'category_id' => $category->id
            ]);
        });


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
