<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'activo',
        'rol',
        'empresa_id',
        'local_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }
    
    public function local(){
        return $this->belongsTo(Local::class);
    }

    public function productos(){
        return $this->hasMany(Producto::class);
    }

    public function inventarios(){
        return $this->hasMany(Inventario::class);
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
