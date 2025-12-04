<?php

namespace App\Models;

use Database\Factories\FornecedorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class FornecedorModel extends Model 
{
    use HasFactory;
    protected $table = 'fornecedor';
    protected static function newFactory()
    {
        return FornecedorFactory::new();
    }
    public function pedidos()
    {
        return $this->hasMany(PedidoModel::class,'fornecedor_id','id');
    }
    public function getRouteKeyName()
    {
        return 'cnpj';
    }
}
