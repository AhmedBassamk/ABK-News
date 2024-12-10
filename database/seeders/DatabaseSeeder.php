<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\news;
use Faker\Factory as Faker;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'super admin',
        //     'email' => 'superadmin@gmail.com',
        //     'phone_number' => '0595063676',
        //     'image' => 'ss',
        //     'password' => '000111',
        // ]);
        $faker = Faker::create();
        // foreach (range(1, 1000) as $index) {
        //     Category::create([
        //         'name' => $faker->sentence,
        //         'image' => 'img_',
        //         'description' => 'PAL',
        //         'parent_id' =>null,
        //     ]);
        // }
        foreach (range(1, 1000) as $index) {
            news::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'country' => 'PAL',
                'image' => 'img_' . $index . '.png',
                'is_active' => 1,
                'views_count' => $faker->numberBetween(0, 1000),
                'category_id' => $faker->numberBetween(11, 55),
                'user_id' => 1,
            ]);
        }

    }
}
