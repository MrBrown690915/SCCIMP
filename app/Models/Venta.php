<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'fecha',
        'precio_total',
        'empresa_id',
        'cliente_id',
        'local_id',
    ];

    public function detalleVenta(){
        return $this->hasMany(detalleVenta::class); // ya, listo
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class); // ya, listo
    }

    public function local(){
        return $this->belongsTo(Local::class);
    }

}
