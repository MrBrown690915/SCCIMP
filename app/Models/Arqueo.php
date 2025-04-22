<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arqueo extends Model
{
    protected $fillable = [
        'fecha_apertura', 
        'fecha_cierre', 
        'monto_inicial', 
        'monto_final',
        'desc',
        'local_id',
        'user_id',

    ];

    public function local(){
        return $this->belongsTo(Local::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cajas(){
        return $this->hasMany(MCaja::class);
    }

}
