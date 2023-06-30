<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
             'name' => 'Test User',
             'email' => 'test'.rand(1, 100).'@example.com',
         ]);

        Post::factory(10)->create();

        Post::factory()->create([
            'user_id' => 1,
            'text' => 'Test Post',
        ]);
    }
}
