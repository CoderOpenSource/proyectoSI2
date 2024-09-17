<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_rol'];

    // Aquí especificamos manualmente el nombre correcto de la tabla
    protected $table = 'roles';

    // Relación con Usuario
    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }

    // Relación con Privilegio (muchos a muchos)
    public function privilegios()
    {
        return $this->belongsToMany(Privilegio::class, 'rol_privilegio');
    }
}

