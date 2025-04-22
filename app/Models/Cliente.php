<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'direc',
        'telef',
        'contrato',
        'email',
        'nombre',
        'ci',
    ];

    
    public function ventas(){
        return $this->hasMany(Venta::class); // ya, listo
    }

    public function operaciones(){
        return $this->hasMany(Operacion::class); // ya, listo
    }

}
