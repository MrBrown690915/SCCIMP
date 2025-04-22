<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TmpVenta extends Model
{
    public function inventario(){
        return $this->belongsTo(Inventario::class);
    }
}
