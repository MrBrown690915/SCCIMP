<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'imagen',
        'stock',
        'stock_min',
        'stock_max',
        'precio_compra',
        'precio_venta',
        'activo',
        'fecha',
        'empresa_id',
        'categoria_id',
        'medida_id',
        'user_id',
    ];

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function compras(){
        return $this->hasMany(Compra::class);
    }


}
