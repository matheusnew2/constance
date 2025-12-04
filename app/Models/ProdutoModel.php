<?php

namespace App\Models;

use Database\Factories\ProdutoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProdutoModel extends Model
{
    use HasFactory;
    
    protected $table = 'produto';
    protected static function newFactory()
    {
        return ProdutoFactory::new();
    }

}
