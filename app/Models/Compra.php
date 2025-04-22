<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'fecha',
        'comprobante',
        'cantidad',
        'precio_compra',
        'empresa_id',
        'producto_id',
        'provehedor_id',
    ];

//    public function producto(){
//        return $this->belongsTo(Producto::class);
//    }

    public function detalles(){
        return $this->hasMany(detalleCompra::class);
    }

    public function provehedor(){
        return $this->belongsTo(Provehedor::class);
    }

}
