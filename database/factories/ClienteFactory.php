<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ci' => $this->faker->unique()->numberBetween(11111111111, 99999999999),
            'contrato' => $this->faker->unique()->numberBetween(111111, 999999),
            'nombre' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'telef' => $this->faker->phoneNumber,
            'direc' => $this->faker->address,
            'empresa_id' => '1',
        ];
    }
}
