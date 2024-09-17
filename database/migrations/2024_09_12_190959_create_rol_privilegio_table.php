<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolPrivilegioTable extends Migration
{
    public function up()
    {
        Schema::create('rol_privilegio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rol_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('privilegio_id')->constrained('privilegios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rol_privilegio');
    }
}
