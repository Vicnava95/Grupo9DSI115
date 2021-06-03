<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePacienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'id'=>'unique:id',
            'nombrePaciente'=>'required|max:255|string',
            'apellidoPaciente'=>'required|max:255|string',
            'duiPaciente'=>'nullable|size:10|string',
            'telefonoCasaPaciente'=>'nullable|size:9|string',
            'telefonoCelularPaciente'=>'required|size:9|string',
            'fechaNacimientoPaciente'=>'required|date|before:today',
            'direccionPaciente'=>'required|string',
            'referenciaPersonalPaciente'=>'nullable|max:255|string',
            'telReferenciaPersonalPaciente'=>'nullable|size:9|string',
            'ocupacionPaciente'=>'nullable|max:255|string',
            'correoElectronicoPaciente'=>'nullable|max:255|email',
            //'idSexo'=>'required|integer'

        ];
    }

    public function messages()
    {
        return [
            'nombrePaciente.required'=>'El paciente necesita un Nombre',
            'nombrePaciente.max'=>'El nombre del paciente debe contener maximo 255 caracteres',
            'apellidoPaciente.required'=>'El paciente necesita un Apellidos',
            'apellidoPaciente.max'=>'Los apellidos del paciente debe contener maximo 255 caracteres',
            'duiPaciente.size'=>'El dui de un Paciente debe tener el siguiente formato ########-#',
            'telefonoCasaPaciente.size'=>'El telefono de casa del paciente debe tener el siguiente formato ####-####',
            'telefonoCelularPaciente.size'=>'El telefono celular del paciente debe tener el siguiente formato ####-####',
            'fechaNacimientoPaciente.required'=>'La fecha de nacimiento del paciente es requeridad',
            'fechaNacimientoPaciente.date'=>'Al ingresar la fecha de nacimiento del paciente debe respetar el formato',
            'direccionPaciente.required'=>'La direccion del paciente debe ser ingresada',
            'referenciaPersonalPaciente.max'=>'El nombre completo de la referencial personal del paciente debe tener maximo 255 caracteres',
            'telReferenciaPersonalPaciente.size'=>'El telefono de contacto de la referencia personal del paciente debe tener el siguiente formato ####-####',
            'ocupacionPaciente.max'=>'La ocupacion del Paciente no debe propasar los 255 caracteres',
            'correoElectronicoPaciente.email'=>'Debe escribir un correo electronico valido',

        ];
    }
}
