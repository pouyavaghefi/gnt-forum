<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->text(70);
        $slug = str_slug($title, '-');

        return [
            'que_title' => $title,
            'que_slug' => $slug,
            'que_body' => $this->faker->text(),
            'que_str' => Str::random(10),
            'que_creator_id' => $this->faker->numberBetween(1,100),
        ];
    }
}
