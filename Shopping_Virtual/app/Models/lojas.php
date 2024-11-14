<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lojas extends Model
{
    protected $fillable = ['nome','categoria','cnpj','user_id','logo','categoria_id'];
    
    public function user() {
        return $this->belongsTo (User::class);
    }
    public function categoria()
    {
        return $this->belongsTo(categoria::class); 
    }

}
