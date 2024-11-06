<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagamentos extends Model
{
    protected $fillable = ['valor','metodo_pagamento','','usuario_id','pedidos_id'];
    
    public function user() {
        return $this->belongsTo (User::class);
    }

    public function pedido() {
        return $this->belongsTo (pedidos::class);
    }
}
