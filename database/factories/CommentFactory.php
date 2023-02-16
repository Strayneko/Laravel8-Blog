<?php

namespace Database\Factories;

use App\Models\PostDb;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'post_id' => PostDb::factory(),
            'user_id' => User::factory(),
            'body' => $this->faker->paragraph(),

        ];
    }
}
