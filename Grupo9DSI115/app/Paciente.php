<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    public function sexo(){
        return $this->belongsTo(Sexo::class);
    }
}
