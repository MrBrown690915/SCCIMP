<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 
        'direccion', 
        'cp', 
        'telef',
        'email'];
    
    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class, 'empresa_id', 'id');
    }
    
    public function users(){
        return $this->hasMany(User::class);
    }

    public function inventarios(){
        return $this->hasMany(Inventario::class);
    }

    public function ventas(){
        return $this->hasMany(Venta::class); // ya, listo
    }

    public function tarifas(){
        return $this->hasMany(Tarifa::class); // ya, listo
    }

    public function operaciones(){
        return $this->hasMany(Operacion::class);
    }

    public function arqueos(){
        return $this->hasMany(Arqueo::class);
    }



}
