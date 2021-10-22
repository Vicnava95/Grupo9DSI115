<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecetasDentales extends Model
{
    static $rules = [
		'descripcion' => 'required|max:255|string',
		'fecha' => 'required|date',
        'proximaCita'=> 'nullable|date|after_or_equal:fecha',
		'expedienteDental_id' => 'required|integer|exists:expediente_doctora_dentals,id',
        'estadoReceta_id' => 'required|integer|exists:estado_recetas,id',
    ];

    protected $perPage = 20;

    protected $fillable = ['descripcion','fecha','proximaCita','estadoReceta_id','expedienteDental_id'];

    public function expedienteDental()
    {
        return $this->hasOne('App\Models\ExpedienteDoctoraDental', 'id', 'expedienteDental_id');
    }

    public function estadoReceta()
    {
        return $this->hasOne('App\Models\EstadoReceta', 'id', 'estadoReceta_id');
    }
}
