<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provehedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa',
        'direccion',
        'telefono',
        'email',
        'nombre',
        'movil',
    ];

    public function compras(){
        return $this->hasMany(Compra::class);
    }

    public function detalles(){
        return $this->hasMany(detalleCompra::class);
    }


}
