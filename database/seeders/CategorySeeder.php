<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Local News', 'International News', 'Sports', 'Health', 'Politics', 'Beauty', 'Food'];
        $arr = [];
        foreach ($categories as $category) {
         $arr[] = [
            'title' => $category,
            'user_id' => rand(1,11)
         ];
        };
        Category::factory()->createMany($arr);
        // Category::insert();
    }
}
