<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $categories = [
            'test', 'test2', 'test3'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }

        // \App\Models\User::factory(10)->create();
    }
}
