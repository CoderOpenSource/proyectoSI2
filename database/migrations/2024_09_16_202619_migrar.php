<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class migrar extends Migration
{
    public function up()
    {
        Schema::create('activos_fijos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->decimal('costo', 15, 2);
            $table->decimal('depre_anual', 15, 2);
            $table->enum('estado', ['activo', 'inactivo']);
            $table->date('fecha_ingreso');
            $table->string('nombre');
            $table->decimal('valor_actual', 15, 2);
            $table->decimal('valor_residual', 15, 2);
            $table->foreignId('categoria_id')->constrained('categorias'); // Relación con Categoría
            $table->decimal('posicionX', 10, 6); // Coordenada X
            $table->decimal('posicionY', 10, 6); // Coordenada Y
            $table->string('fotoUrl');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('activos_fijos');
    }
}
