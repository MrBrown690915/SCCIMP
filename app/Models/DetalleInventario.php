<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleInventario extends Model
{
    public function inventario(){
        return $this->belongsTo(Inventario::class);
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
