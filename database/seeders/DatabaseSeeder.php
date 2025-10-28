<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        \App\Models\User::factory()->create([
            'name' => 'John',
            'email' => 'test@example.com',
        ]);

        // Create 10 tags
        $tags = \App\Models\Tag::factory(10)->create();

        // Create 20 jobs and attach 2 random tags to each
        \App\Models\Job::factory(20)->create()->each(function($job) use ($tags) {
            $job->tags()->attach($tags->random(2));
        });
    }
}
