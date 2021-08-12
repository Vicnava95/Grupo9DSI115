<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Consulta
 *
 * @property $id
 * @property $descripcion
 * @property $fecha
 * @property $paciente_id
 * @property $persona_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Paciente $paciente
 * @property Persona $persona
 * @property Receta[] $recetas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Consulta extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'fecha' => 'required',
		'paciente_id' => 'required',
		'persona_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','fecha','paciente_id','persona_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        return $this->hasOne('App\Models\Paciente', 'id', 'paciente_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recetas()
    {
        return $this->hasMany('App\Models\Receta', 'consulta_id', 'id');
    }
    

}
