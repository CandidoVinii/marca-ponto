<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ponto>
 */
class PontoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'ponto_chegada' => now(),
            'ponto_saida' => date("2023-01-28 06:00"),
            'horas_diurnas' => '5:56',
            'horas_noturnas' => '7:00',
        ];
    }
}