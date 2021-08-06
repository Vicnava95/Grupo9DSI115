<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->String('descripcion')->require();
            $table->Date('fecha')->require();
            //llave foranea
            //paciente
            $table->unsignedBigInteger('paciente_id')->require();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            //persona
            $table->unsignedBigInteger('persona_id')->require();
            $table->foreign('persona_id')->references('id')->on('personas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
