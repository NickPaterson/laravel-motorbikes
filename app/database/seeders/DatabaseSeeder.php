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


        \App\Models\Motorbike::create([
            'title' => '2021 Honda CBR1000RR-R',
            'description' => 'The 2021 Honda CBR1000RR-R Fireblade SP is the most track-focused Fireblade ever produced, and itU+2019s the most powerful and technologically advanced model in the FirebladeU+2019s 28-year history. The CBR1000RR-R Fireblade SP is powered by a new 999cc inline four-cylinder engine that produces 214 hp at 14,500 rpm and 83 lb-ft. at 12,500 rpm. The engine is mated to a six-speed cassette-type gearbox.',
            'summary' => 'The 2021 Honda CBR1000RR-R Fireblade SP is the most track-focused Fireblade ever produced, and itU+2019s the most powerful and technologically advanced model in the FirebladeU+2019s 28-year history.',
            'make' => 'Honda',
            'model' => 'CBR1000RR-R',
            'engine' => '999',
            'year' => '2021',
            'price' => '28500',
            'user_id' => 11,
            'category_id' => 1,
            'slug' => '2021-honda-cbr1000rr-r'
        ]);

        \App\Models\Motorbike::create([
            'title' => '2021 Kawasaki Ninja ZX-10R',
            'description' => 'The 2021 Kawasaki Ninja ZX-10R is powered by a 998cc inline four-cylinder engine that produces 203 hp at 13,200 rpm and 84 lb-ft. at 11,400 rpm. The engine is mated to a six-speed cassette-type gearbox. The ZX-10R is equipped with a Showa Balance Free Fork and Balance Free Rear Cushion shock, both of which are fully adjustable. The ZX-10R is equipped with a Bosch six-axis IMU that controls the Kawasaki Cornering Management Function, Kawasaki Launch Control Mode, Kawasaki Traction Control, Kawasaki Intelligent anti-lock Brake System, Kawasaki Engine Brake Control, and Kawasaki Quick Shifter.',
            'summary' => 'The 2021 Kawasaki Ninja ZX-10R is powered by a 998cc inline four-cylinder engine that produces 203 hp at 13,200 rpm and 84 lb-ft. at 11,400 rpm.',
            'make' => 'Kawasaki',
            'model' => 'Ninja ZX-10R',
            'engine' => '998',
            'year' => '2021',
            'price' => '28500',
            'user_id' => 11,
            'category_id' => 1,
            'slug' => '2021-kawasaki-ninja-zx-10r'
        ]);
    }
}
