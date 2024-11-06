<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class endereco extends Model
{
    protected $fillable = ['cidade','estado','cep','municipio','Av./rua','numero','complemento','usuario_id'];
    
    public function user() {
        return $this->belongsTo (User::class);
    }
}
