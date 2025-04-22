<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detalleCompra extends Model
{
    public function compra(){
        return $this->belongsTo(Compra::class);
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
    
}
