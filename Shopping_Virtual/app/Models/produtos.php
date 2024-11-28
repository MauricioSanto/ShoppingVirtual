<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produtos extends Model
{
    protected $fillable = ['nome','descricao','preco','imagem','lojas_id','categoria_id'];
    
    public function loja() {
        return $this->belongsTo (lojas::class);
    }

    public function categoria() {
        return $this->belongsTo (categoria::class);
    }
}
