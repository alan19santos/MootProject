<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'nome' => $this->faker->word(),
            'categoria_id' => \App\Models\Categoria::factory(),
            'marca_id' => \App\Models\Marca::factory(),
            'preco' => $this->faker->randomFloat(2,10,500),
        ];
    }
}
