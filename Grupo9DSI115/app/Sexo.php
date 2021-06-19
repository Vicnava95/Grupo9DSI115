<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    public function Paciente(){
        return $this->hasMany(Paciente::class);
    }

    //validacion de migrate

    protected $table = 'sexos';

    //Definiendo los campos que se pueden llenar
    protected $fillable = ['nombre'];
}
