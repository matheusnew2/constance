<?php

namespace App\Models;

use Database\Factories\PedidoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PedidoModel extends Model
{
    use HasFactory;
    protected static function newFactory()
    {
        return PedidoFactory::new();
    }
    protected $table = 'pedido';

}
