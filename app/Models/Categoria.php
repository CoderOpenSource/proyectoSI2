<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion', 'coheficiente', 'vida_util'
    ];

    // Relación con Activos Fijos
    public function activosFijos()
    {
        return $this->hasMany(ActivoFijo::class);
    }
}
