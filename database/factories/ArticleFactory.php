<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
     $users = User::all();

        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'creator_name' => $users->random()->name,
            'category_id' => rand(1,7),
            'user_id' => rand(1,11),
            // 'user_id' => $user->random()->id
            // 'category_id' => Category::all()->random()->id

        ];
    }
}
