<?php

namespace Database\Factories;

use App\Models\Platillo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlatilloFactory extends Factory
{

    public function definition()
    {
        return [
            'nombre' => $this->faker->word(),
            'disponibilidad' => $this->faker->boolean(),
            'precio' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
