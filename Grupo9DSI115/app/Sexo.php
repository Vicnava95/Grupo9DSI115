<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    public function Paciente(){
        return $this->hasMany(Paciente::class);
    }
}
