<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provehedor>
 */
class ProvehedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'empresa' => $this->faker->company,  
            'direccion' => $this->faker->address,  
            'telefono' => $this->faker->phoneNumber,  
            'email' => $this->faker->unique()->safeEmail,  
            'nombre' => $this->faker->name,  
            'movil' => $this->faker->phoneNumber,  
            'empresa_id' => '1',
        ];
    }
}
