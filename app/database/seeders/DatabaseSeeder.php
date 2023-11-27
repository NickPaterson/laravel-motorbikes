<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Moderator',
            'email' => 'mod@example.com',
            'password' => bcrypt('password'),
            'is_mod' => true
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('password')
        ]);


        $categories = [
            'Sport',
            'Cruiser',
            'Touring',
            'Standard',
            'Dual Sport',
            'Off Road',
            'Scooter',
            'Other'
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'category' => $category
            ]);
        }


      
    }
}
