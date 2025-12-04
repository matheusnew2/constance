<?php

namespace App\Models;

use Database\Factories\PedidoProdutoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PedidoProdutoModel extends Model
{
    use HasFactory;
    protected $table = 'pedido_produto';
    
    protected static function newFactory()
    {
        return PedidoProdutoFactory::new();
    }
    public function produtos()
    {
        return $this->hasOne(ProdutoModel::class,'produto_id');
    }
}
