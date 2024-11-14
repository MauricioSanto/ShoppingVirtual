<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $fillable = ['nome','imagem','loja_id'];
    
    public function lojas()
    {
        return $this-> hasMany(lojas::class); // ou belongsToMany se for muitos-para-muitos
    }
}
