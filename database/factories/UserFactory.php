<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName,
            'middlename' => $this->faker->lastName,
            'lastname' => $this->faker->lastName,
            'idnumber' => $this->faker->unique()->numerify('ID######'),
            'suffix' => '',
            'sex' => $this->faker->randomElement(['Male', 'Female']),
            'user_type' => $this->faker->randomElement(['admin', 'player', 'coach']),
            'birthdate' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // Default password for all seeded users
            'profile_picture' => 'path/to/default.jpg',
            'lastlogin' => now(),
            'archived_at' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
