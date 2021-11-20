<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Cita;
use App\Models\ExpedienteDoctor;
use App\Models\ExpedienteDoctoraDental;
use App\Models\Persona;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\EstadoCita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ReporteController
 * @package App\Http\Controllers
 */
class ReporteController extends Controller
{

    public function reporteCitas()
    {        
        $citas = DB::table('citas')
        ->join('pacientes', 'citas.paciente_id', '=', 'pacientes.id')
        ->join('personas', 'citas.persona_id', '=', 'personas.id')
        ->join('estado_citas', 'citas.estadoCita_id', '=', 'estado_citas.id')
        ->select('pacientes.nombres', 'pacientes.apellidos', 'citas.fecha', 'citas.hora', 'estado_citas.nombre', 'personas.nombrePersonas', 'personas.apellidoPersonas')
        ->get();
        
        $i = 0;
        $view = \View::make('cita.reporteCita', compact('citas', 'i'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('informeCitas'.'pdf');
    }

}
