<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacorasTable extends Migration
{
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id();
            $table->string('accion');
            $table->string('apartado');
            $table->string('direccion_IP');
            $table->date('fecha');
            $table->time('hora');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->unsignedBigInteger('id_implicado')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bitacoras');
    }
}
