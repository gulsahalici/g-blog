<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       // User::truncate();
       // Category::truncate();
       // Post::truncate();

        $user = User::factory()->create([
            'name' => 'Ali'
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id
        ]);
        /*$personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        $hobby = Category::create([
            'name' => 'Hobby',
            'slug' => 'hobby'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $hobby->id,
            'title' => 'Hobby',
            'slug' => 'hobby-first',
            'excerp' => 'ex',
            'body' => 'body'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'work',
            'slug' => 'work-first',
            'excerp' => 'ex',
            'body' => 'body'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'personal',
            'slug' => 'personal-first',
            'excerp' => 'ex',
            'body' => 'body'
        ]);*/
    }
}
