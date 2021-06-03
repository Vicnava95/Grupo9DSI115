<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    public function sexo(){
        return $this->belongsTo(Sexo::class);
    }

    //validacion de migrate

    //protected $table = 'pacientes';


    //Definiendo los campos que se pueden llenar
    //protected $fillable = ['nombres','apellidos','dui','telefonoCasa','telefonoCelular','fechaDeNacimiento','direccion','referenciaPersonal','telReferenciaPersonal','ocupacion','correoElectronico'];
    protected $guarded=[];
}
