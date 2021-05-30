<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->String('nombres');
            $table->String('apellidos');
            $table->String('dui',9);
            $table->String('telefonoCasa',9);
            $table->String('telefonoCelular',9);
            $table->Date('fechaDeNacimiento');
            $table->String('direccion');
            $table->String('referenciaPersonal');
            $table->String('telReferenciaPersonal');
            $table->String('ocupacion');
            $table->String('correoElectronico');
            $table->timestamps();

            $table->unsignedBigInteger('sexo_id');
            $table->foreign('sexo_id')->references('id')->on('sexos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
