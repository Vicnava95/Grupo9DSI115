<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Receta
 *
 * @property $id
 * @property $descripcion
 * @property $fecha
 * @property $proximaCita
 * @property $consulta_id
 * @property $paciente_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Consulta $consulta
 * @property Paciente $paciente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Receta extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'fecha' => 'required',
		'consulta_id' => 'required',
		'paciente_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','fecha','proximaCita','consulta_id','paciente_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function consulta()
    {
        return $this->hasOne('App\Models\Consulta', 'id', 'consulta_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        return $this->hasOne('App\Models\Paciente', 'id', 'paciente_id');
    }
    

}
