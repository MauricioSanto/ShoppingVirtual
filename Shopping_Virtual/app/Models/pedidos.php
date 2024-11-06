<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    protected $fillable = ['quantidade','valor_unitario','valor_total','status','usuario_id','lojas_id'];
    
    public function user() {
        return $this->belongsTo (User::class);
    }

    public function loja() {
        return $this->belongsTo (lojas::class);
    }
}
