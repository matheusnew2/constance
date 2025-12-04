<?php

namespace Database\Factories;

use App\Models\FornecedorModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class FornecedorFactory extends Factory
{
    protected $model = FornecedorModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cnpj' => fake()->unique()->cnpj(),
            'nome' => fake()->company(),
            'cep' => fake()->randomNumber(8,true),
            'endereco' => fake()->address(),
            'status' => true
        ];
    }

}
