<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    protected $fillable = [
        'nombre',
        'precio',
        'local_id',
        'user_id',
    ];

    public function local(){
        return $this->belongsTo(Local::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function operaciones(){
        return $this->hasMany(Operacion::class);
    }

}
