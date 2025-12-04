<?php

namespace Database\Seeders;

use App\Models\FornecedorModel;
use App\Models\PedidoModel;
use App\Models\PedidoProdutoModel;
use App\Models\ProdutoModel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $fornecedores = FornecedorModel::factory(3)->create();
        foreach($fornecedores as $fornecedor)
        {
            $produtosCollection = ProdutoModel::factory(3)->create([
                'fornecedor_id' => $fornecedor->id,
                'nome' => 'produto'
            ]);
            $qtd_produtos = rand(1,3);
            $produtos = [];
            $valor_pedido = 0;
            for ($i=0; $i < $qtd_produtos; $i++) { 
                $quantidade = rand(1,5);
                $produtos[] = [
                    'produto_id' => $produtosCollection[$i]->id,
                    'valor_unitario' => $produtosCollection[$i]->preco,
                    'quantidade' => $quantidade
                ];
                $valor_pedido += $produtosCollection[$i]->preco * $quantidade;
            }

            $pedido = PedidoModel::factory()->create([
                'fornecedor_id' => $fornecedor->id,
                'valor' => $valor_pedido,
                'observacao' => 'obs',
                'status' => 'pendente',
            ]);
            foreach($produtos as $produto)
            {
                PedidoProdutoModel::factory()->create(array_merge(['pedido_id' => $pedido->id],$produto));
            }

            
        }
    }
}
