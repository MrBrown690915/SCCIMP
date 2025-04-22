<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MCaja extends Model
{
    protected $fillable = [
        'tipo', 
        'monto', 
        'desc',
        'arqueo_id',
    ];

    public function arqueo(){
        return $this->belongsTo(Arqueo::class);
    }
}
