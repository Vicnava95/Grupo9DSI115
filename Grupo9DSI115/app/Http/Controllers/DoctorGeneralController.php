<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Persona;
use App\Models\Consulta;
use App\Models\Rolpersona;
use Illuminate\Http\Request;

class DoctorGeneralController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        $fechaInicio = trim($request->get('fechaInicio'));
        $fechaFin = trim($request->get('fechaFin'));
        $consulta = new Consulta();

        /*
        $rolPersona = 2;
        $persona = Persona::where('rolPersona_id',$rolPersona)
            ->firstOrFail();
        */
        $persona = 3;

        if($fechaInicio && $fechaFin ){
            $citas = Cita::select('*')
                ->where('persona_id',$persona)
                ->where('estadoCita_id','!=','1')
                ->where('fecha','>=',$fechaInicio)
                ->where('fecha','<=',$fechaFin)
                ->orderBy('fecha','ASC')
                ->orderBy('hora','ASC')
                ->get();
        } else {
            $citas = Cita::select('*')
                ->where('persona_id',$persona)
                ->where('estadoCita_id','!=','1')
                ->orderBy('fecha','ASC')
                ->orderBy('hora','ASC')
                ->get();
        }

        return view('doctorGeneral.index', compact('citas', 'consulta','fechaInicio', 'fechaFin'));
    }

    
}
