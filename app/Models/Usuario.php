<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens; // Importar el trait
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory, HasApiTokens; // Usar el trait HasApiTokens para generar tokens

    protected $fillable = [
        'nombre',
        'apellido',
        'cargo',
        'contrasena',
        'direccion',
        'edad',
        'email',
        'sexo',
        'telefono',
        'rol_id'
    ];

    // Relación con Rol
    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    // Relación con Bitácora
    public function bitacoras()
    {
        return $this->hasMany(Bitacora::class);
    }

    // Un usuario puede ser responsable de otros usuarios
    public function responsableDe()
    {
        return $this->hasMany(Usuario::class, 'responsable_id');
    }

    // Un usuario tiene un responsable
    public function responsable()
    {
        return $this->belongsTo(Usuario::class, 'responsable_id');
    }
}
