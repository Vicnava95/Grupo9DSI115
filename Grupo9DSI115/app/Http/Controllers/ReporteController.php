<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
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
        //Reporte de Citas Agendadas
        //$fecha = Carbon::yesterday()->format('Y-m-d', 'America/El_Salvador');
        $citas = DB::table('citas')
        ->join('pacientes', 'citas.paciente_id', '=', 'pacientes.id')
        ->join('personas', 'citas.persona_id', '=', 'personas.id')
        ->join('estado_citas', 'citas.estadoCita_id', '=', 'estado_citas.id')
        ->select('pacientes.nombres', 'pacientes.apellidos', 'citas.fecha', 'citas.hora', 'estado_citas.nombre', 'personas.nombrePersonas', 'personas.apellidoPersonas')
        /*->whereDate('citas.fecha','>=', $fecha)
        ->where('estado_citas.nombre', '!=', 'Finalizada')*/
        ->orderBy('citas.fecha')
        ->orderBy('citas.hora')
        ->get();

        $i = 0;
        $view = \View::make('cita.reporteCita', compact('citas', 'i'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('informeCitas_Agendadas'.'.pdf');
    }

    public function reporteRecetas()
    {        
        //Reporte de Recetas y Proximas Citas
        $fecha = Carbon::yesterday()->format('Y-m-d', 'America/El_Salvador');
        $recetas = DB::table('recetas')
        ->select('*')
        ->whereDate('proximaCita','>=', $fecha)
        ->where('estadoReceta_id', '=', '1')
        ->get();

        $i = 0;
        $view = \View::make('receta.reporteReceta', compact('recetas', 'i'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('informeRecetas_ProximasCitas'.'.pdf');
    }

}
