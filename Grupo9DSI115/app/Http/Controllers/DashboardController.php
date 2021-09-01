<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Persona;
use App\Models\Consulta;
use App\Models\Rolpersona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function doctorGeneralIndex(Request $request){
        $fechaInicio = trim($request->get('fechaInicio'));
        $fechaFin = trim($request->get('fechaFin'));
        $consulta = new Consulta();

        $rolUsuario = Auth::user()->rols_fk;
        if($rolUsuario == 2){
            $personas = Persona::select('*')->where('rolPersona_id',$rolUsuario)->get()->pluck('id')->toArray();;
            if($fechaInicio && $fechaFin ){
                $citas = Cita::select('*')
                    ->where('persona_id',$personas)
                    ->where('estadoCita_id','!=','1')
                    ->where('fecha','>=',$fechaInicio)
                    ->where('fecha','<=',$fechaFin)
                    ->orderBy('fecha','ASC')
                    ->orderBy('hora','ASC')
                    ->get();
            } else {
                $citas =  Cita::select('*')
                ->where('persona_id',$personas)
                ->where('estadoCita_id','!=','1')
                ->orderBy('fecha','ASC')
                ->orderBy('hora','ASC')
                ->get();
            }
            return view('doctorGeneral.index', compact('citas', 'consulta','fechaInicio', 'fechaFin', 'personas'));
        }
        
        else{
            return redirect()->back();
        }

    }

    public function doctorDentalIndex(Request $request){
        $fechaInicio = trim($request->get('fechaInicio'));
        $fechaFin = trim($request->get('fechaFin'));
        $consulta = new Consulta();

        $rolUsuario = Auth::user()->rols_fk;
        if($rolUsuario == 3){
            $personas = Persona::select('*')->where('rolPersona_id',$rolUsuario)->get()->pluck('id')->toArray();;
            if($fechaInicio && $fechaFin ){
                $citas = Cita::select('*')
                    ->where('persona_id',$personas)
                    ->where('estadoCita_id','!=','1')
                    ->where('fecha','>=',$fechaInicio)
                    ->where('fecha','<=',$fechaFin)
                    ->orderBy('fecha','ASC')
                    ->orderBy('hora','ASC')
                    ->get();
            } else {
                $citas =  Cita::select('*')
                ->where('persona_id',$personas)
                ->where('estadoCita_id','!=','1')
                ->orderBy('fecha','ASC')
                ->orderBy('hora','ASC')
                ->get();
            }
            return view('doctoraDental.index', compact('citas', 'consulta','fechaInicio', 'fechaFin', 'personas'));
        }
        
        else{
            return redirect()->back();
        }

    }

    
}
