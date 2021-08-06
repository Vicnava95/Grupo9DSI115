<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->String('descripcion')->required();
            $table->Date('fecha')->required();
            $table->Date('proximaCita')->nullable();
            //llave foranea
            //consulta
            $table->unsignedBigInteger('consulta_id')->require();
            $table->foreign('consulta_id')->references('id')->on('consultas');
            //paciente
            $table->unsignedBigInteger('paciente_id')->require();
            $table->foreign('paciente_id')->references('id')->on('pacientes');

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
        Schema::dropIfExists('recetas');
    }
}
