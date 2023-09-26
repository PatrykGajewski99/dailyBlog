<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\ValueObjects\PostCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category'       => fake()->randomElement(PostCategories::getAllowedValues()),
            'title'          => fake()->text(10),
            'description'    => fake()->text(50),
        ];
    }
}
