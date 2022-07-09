<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
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
        return [
            'id' => (string) Uuid::uuid4(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'document' => Str::random(11),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password')
        ];
    }
}
