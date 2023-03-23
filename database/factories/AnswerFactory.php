<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ans_que_id' => $this->faker->numberBetween(1,49),
            'ans_type_id' => 12,
            'ans_body' => $this->faker->text(),
            'ans_str' => Str::random(10),
            'ans_creator_id' => $this->faker->numberBetween(1,99),
        ];
    }
}
