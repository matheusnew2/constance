<?php

namespace Database\Factories;

use App\Models\ProdutoModel;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProdutoFactory extends Factory
{
    protected $model = ProdutoModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'referencia' => fake()->randomNumber(5,true),
            'cor' => fake()->colorName(),
            'preco' => fake()->randomFloat(2,5,30)
        ];
    }
}
