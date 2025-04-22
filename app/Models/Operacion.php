<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    protected $fillable = [
        'nombre', 
        'operacion', 
        'importe', 
        'cantidad',
        'total',
        'fecha',
        'local_id',
        'tarifa_id',
        'inventario_id',
        'user_id',
        'cliente_id',

    ];

    public function local(){
        return $this->belongsTo(Local::class);
    }

    public function tarifa(){
        return $this->belongsTo(Tarifa::class);
    }

    public function inventario(){
        return $this->belongsTo(Inventario::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }


}
