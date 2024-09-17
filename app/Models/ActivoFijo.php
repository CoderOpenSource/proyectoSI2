<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivoFijo extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo', 'costo', 'depre_anual', 'estado', 'fecha_ingreso',
        'nombre', 'valor_actual', 'valor_residual', 'categoria_id', 'posicionX','posicionY', 'fotoUrl'
    ];
    protected $table = 'activos_fijos';
    // Relación con Categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }


}

