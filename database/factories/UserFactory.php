<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fs = '091';
        $ch = '1234567890';
        $str = $fs.str_shuffle($ch);
        $final_str = substr($str,0,-2);

        return [
            'usr_first_name' => $this->faker->text(5),
            'usr_last_name' => $this->faker->text(6),
            'usr_user_name' => strtolower($this->faker->unique()->text(7)),
            'usr_mobile_phone' => $final_str,
            'usr_password_hash' => Hash::make('Godfather1@'),
            'usr_email_address' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'usr_is_active' => 1,
            'usr_str' => Str::random(10),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
