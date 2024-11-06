<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class itens_do_pedido extends Model
{
    protected $fillable = ['quantidade','preco','pedidos_id','produto_id'];
    
    public function pedido() {
        return $this->belongsTo (pedidos::class);
    }

    public function produto() {
        return $this->belongsTo (produtos::class);
    }
}
