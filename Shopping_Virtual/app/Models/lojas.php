<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lojas extends Model
{
    protected $fillable = ['nome','categoria','cnpj','user_id'];
    
    public function user() {
        return $this->belongsTo (User::class);
    }

}
