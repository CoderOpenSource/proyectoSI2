<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    protected $fillable = [
        'accion',
        'apartado',
        'direccion_IP',
        'fecha',
        'hora',
        'id_implicado'
    ];

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

