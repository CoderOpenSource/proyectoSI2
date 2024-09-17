<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cargo')->nullable();
            $table->string('contrasena');
            $table->string('direccion')->nullable();
            $table->integer('edad')->nullable();
            $table->string('email')->unique();
            $table->string('sexo')->nullable();
            $table->string('telefono')->nullable();
            // Claves foráneas para las relaciones
            $table->foreignId('rol_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('responsable_id')->nullable()->constrained('usuarios')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
