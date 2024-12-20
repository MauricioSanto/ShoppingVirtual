<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lojas extends Model
{
    protected $fillable = ['nome','categoria_id','cnpj','user_id','logo','produto_id'];
    
    public function user() {
        return $this->belongsTo (User::class);
    }
    public function categoria()
    {
        return $this->belongsTo(categoria::class); 
    }

    public function produtos()
    {
        return $this->hasMany(produtos::class); 
    }

}
