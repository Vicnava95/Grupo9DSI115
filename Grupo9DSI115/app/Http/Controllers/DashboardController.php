<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Persona;
use App\Models\Consulta;
use App\Models\ExpedienteDoctor;
use App\Models\Rolpersona;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

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
            $personas = Persona::select('*')->where('rolPersona_id',$rolUsuario)->get()->pluck('id')->toArray();
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
                ->where('fecha', Carbon::now()->format('Y-m-d'))
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
            $personas = Persona::select('*')->where('rolPersona_id',$rolUsuario)->get()->pluck('id')->toArray();
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
                ->where('fecha', Carbon::now()->format('Y-m-d'))
                ->where('estadoCita_id','!=','1')
                ->orderBy('fecha','ASC')
                ->orderBy('hora','ASC')
                ->get();
            }
            return view('doctoraDental.index', compact('citas', 'consulta','fechaInicio', 'fechaFin'));
        }
        else{
            return redirect()->back();
        }
    }

    public function administradorIndex(Request $request){
        $fechaInicio = trim($request->get('fechaInicio'));
        $fechaFin = trim($request->get('fechaFin'));
        $consulta = new Consulta();

        $rolUsuario = Auth::user()->rols_fk;
        if($rolUsuario == 1){
            if($fechaInicio && $fechaFin ){
                $citas = Cita::select('*')
                    ->where('estadoCita_id','!=','1')
                    ->where('fecha','>=',$fechaInicio)
                    ->where('fecha','<=',$fechaFin)
                    ->orderBy('fecha','ASC')
                    ->orderBy('hora','ASC')
                    ->get();
            } else {
                $citas =  Cita::select('*')
                ->where('estadoCita_id','!=','1')
                ->where('fecha', Carbon::now()->format('Y-m-d'))
                ->orderBy('fecha','ASC')
                ->orderBy('hora','ASC')
                ->get();
            }
            return view('admin.index', compact('citas', 'consulta','fechaInicio', 'fechaFin'));
        }
        else{
            return redirect()->back();
        }
    }

    public function secretariaIndex(Request $request){
        $consulta = new Consulta();

        $rolUsuario = Auth::user()->rols_fk;
        if($rolUsuario == 4){   
            $citas =  Cita::select('*')
                ->where('estadoCita_id','!=','1')
                ->where('fecha', Carbon::now()->format('Y-m-d'))
                ->orderBy('fecha','ASC')
                ->orderBy('hora','ASC')
                ->get();
                
            return view('secretaria.index', compact('citas', 'consulta'));
        }
        else{
            return redirect()->back();
        }
    }

    
}
