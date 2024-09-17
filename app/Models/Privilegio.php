<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilegio extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion'];

    // Relación con Rol (muchos a muchos)
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'rol_privilegio');
    }
}

