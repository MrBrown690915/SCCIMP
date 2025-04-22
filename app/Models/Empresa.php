<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Local;

class Empresa extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre', 
        'provincia', 
        'direccion', 
        'cp', 
        'nit',
        'telef',
        'correo'];

    public function users(){
        return $this->hasMany(User::class);
    }
        
    public function locals(){
        return $this->hasMany(Local::class);
    }

    public function productos(){
        return $this->hasMany(Producto::class);
    }

    public function tarifas(){
        return $this->hasMany(Tarifa::class);
    }


}
