<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $fillable = [
        'codigo',
        'nombre',
        'stock',
        'stock_min',
        'fecha',
        'local_id',
        'categoria_id',
        'medida_id',
        'user_id',
        'precio_venta',
    ];

    public function local(){
        return $this->belongsTo(Local::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detalles(){
        return $this->hasMany(DetalleInventario::class);
    }

    public function detalleVenta(){
        return $this->hasMany(DetalleVenta::class);
    }

    public function tmpVenta(){
        return $this->hasMany(TmpVenta::class);
    }

    public function operacion(){
        return $this->hasMany(Operacion::class);
    }



}
