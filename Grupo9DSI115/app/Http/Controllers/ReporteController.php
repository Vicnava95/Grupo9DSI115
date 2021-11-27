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
use App\Models\Diente;
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
        $citas = DB::table('citas')
        ->join('pacientes', 'citas.paciente_id', '=', 'pacientes.id')
        ->join('personas', 'citas.persona_id', '=', 'personas.id')
        ->join('estado_citas', 'citas.estadoCita_id', '=', 'estado_citas.id')
        ->select('pacientes.nombres', 'pacientes.apellidos', 'citas.fecha', 'citas.hora', 'estado_citas.nombre', 'personas.nombrePersonas', 'personas.apellidoPersonas')
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
        ->join('consultas', 'recetas.consulta_id', '=', 'consultas.id')
        ->join('pacientes', 'consultas.paciente_id', '=', 'pacientes.id')
        ->select('*')
        //->whereDate('proximaCita','>=', $fecha)
        //->where('estadoReceta_id', '=', '1')
        ->get();
        $pacientes = DB::table('pacientes')->select('*')->get();

        $i = 0;
        $view = \View::make('receta.reporteReceta', compact('recetas', 'i', 'pacientes'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('informeRecetas_ProximasCitas'.'.pdf');
    }

    public function reporteDiagnosticoDental($paciente,$expediente)
    {
        //Reporte de diagnostico dental
        $paciente = Paciente::find($paciente);
        //$dientes = Diente::select('*')
        //->where('expedienteDental_id','=',$expediente);
        $dientes = DB::table('dientes')->select('*')
        ->where('expedienteDental_id','=',$expediente)
        ->get();

        $recetas = DB::table('recetas_dentales')->select('*')
        ->where('expedienteDental_id','=',$expediente)
        ->get();

        $tratamientos = DB::table('tratamientos')->select('*')
        ->orderBy('diente_id','ASC')
        ->get();


        $view = \View::make('DoctoraDental.reporteDiagnosticoDental', compact('paciente','dientes','recetas','tratamientos'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('informePaciente_DiagnosticoDental' . '.pdf');


    }

    public function reporteExamenes()
    {
        //Reporte descriptivo de examenes
        $fecha = Carbon::yesterday()->format('Y-m-d', 'America/El_Salvador');
        $examenes = DB::table('examenes')
        ->join('consultas', 'examenes.consulta_id', '=', 'consultas.id')
        ->join('pacientes', 'consultas.paciente_id', '=', 'pacientes.id')
        ->select('*')
        ->get();
        $pacientes = DB::table('pacientes')->select('*')->get();

        $i = 0;
        $view = \View::make('examene.reporteExamen', compact('examenes', 'i', 'pacientes'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('informeExamenes'.'.pdf');
    }

}
