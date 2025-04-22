<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->numberBetween(111111, 999999),  
            'nombre' => $this->faker->sentence,  
            'medida' => $this->faker->randomElement(['Blister','Caja','Galones','Litros','Paquete','Unidad']),  
            'stock' => $this->faker->numberBetween(0, 100),  
            'stock_min' => $this->faker->numberBetween(0, 20),  
            'stock_max' => $this->faker->numberBetween(20, 200),  
            'precio_compra' => $this->faker->numberBetween(2, 20),  
            'precio_venta' => $this->faker->numberBetween(2, 20),  
            'activo' => $this->faker->boolean,  
            'fecha' => $this->faker->date(),  
            'empresa_id' => '1',  
            'categoria_id' => $this->faker->numberBetween(1, 3),  
            'user_id' => '1', 
        ];
    }
}
