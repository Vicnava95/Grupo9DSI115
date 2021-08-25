<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ExpedienteDoctoraDental extends Model
{
    public function paciente(){
        return $this->hasOne(Paciente::class);
    }

    public function consultas(){
        return $this->belongsToMany(Consulta::class, ['consulta_expedienteDoctora']);
    }
}
