<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use Carbon\Carbon;
use App\Models\Cita;
use App\Models\Receta;
use App\Models\Persona;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\EstadoCita;
use Illuminate\Http\Request;
use App\Models\ExpedienteDoctor;
use Illuminate\Support\Facades\Auth;
use App\Models\ExpedienteDoctoraDental;

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

    public function reporteDiagnosticoGeneral($idExpedienteGeneral)
    {        
        
        $expedienteGeneral = ExpedienteDoctor::find($idExpedienteGeneral);
        $paciente = Paciente::find($expedienteGeneral->paciente_id);
        
        $listadoConsultaExpedienteDoctor = DB::table('consulta_expedientedoctor')
        ->where('expedienteDoctor_id',$expedienteGeneral->id)
        ->get();        
        $consultas=[];
        foreach ($listadoConsultaExpedienteDoctor as $consultaExpedienteDoctor) {
            $consulta = Consulta::find($consultaExpedienteDoctor->consulta_id);
            $recetas = Receta::select('*')
                ->where('consulta_id', $consulta->id)
                ->get();
            $consulta['recetas'] = $recetas;
            array_push($consultas, $consulta);
        }

        $pdf = PDF::loadView('DoctorGeneral.reporteDiagnosticoGeneral', compact('paciente','consultas'));
        return $pdf->stream('reporteDiagnosticoGeneral'.'.pdf');
    }

}
