<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        return [
            'full_name' => $this->fake()->name(),
            'birthday' => $this->fake()->bithday(),
            'email' => $this->fake()->unique()->safeEmail(),
            'phone' => $this->fake()->phone(),
            'address' => $this->fake()->phone(),
        ];
    }
}
