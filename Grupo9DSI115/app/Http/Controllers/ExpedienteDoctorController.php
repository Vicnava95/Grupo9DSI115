<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpedienteDoctor;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Consulta;
use DB;
class ExpedienteDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cita)
    {
        $i = 0;
        $citaPaciente = Cita::find($cita); 
        $paciente = Paciente::find($citaPaciente->paciente_id);
        $expedientePaciente = ExpedienteDoctor::where('paciente_id',$paciente->id)->first();
        $consultasExpediente = DB::table('consulta_expedientedoctor')
                    ->where('expedienteDoctor_id', $expedientePaciente->id)
                    ->get();
        $cantidadConsultas = count($consultasExpediente); 
        //dd($consultasExpediente);
        if($cantidadConsultas != 0){
            foreach ($consultasExpediente as $consulta){
                $consultas = Consulta::where('id', $consulta->consulta_id)->get();
                $collecionConsultas [] = ['fecha' => $consultas[0]->fecha , 'descripcion' => $consultas[0]->descripcion];
            }
        }else{
            $collecionConsultas [] = ['fecha' => 0 , 'descripcion' => 0];
        }
        //dd($collecionConsultas);
        
        return view('DoctorGeneral.ExpedientePacienteDoctorGeneral',compact('i','paciente','citaPaciente','collecionConsultas','cantidadConsultas'));
    }

    public function crearConsulta(Request $request){
        //dd(request('descripcionConsulta')); 
        $idPaciente = request('idPaciente');

        $consulta = Consulta::create([
            'paciente_id' => request('idPaciente'),
            'persona_id'=> request('idPersona'),
            'descripcion'=> request('descripcionConsulta'),
            'fecha'=> request('fechaConsulta')
        ]);
        $consulta->save(); 

        $expedientePaciente = ExpedienteDoctor::where('paciente_id',$idPaciente)->first();
        //dd($expedientePaciente);
        $pivotTable = DB::table('consulta_expedientedoctor')->insert([
            'consulta_id' => $consulta->id,
            'expedienteDoctor_id' => $expedientePaciente->id,
        ]);

        return redirect()->back();
    }

    public function expedientes(){
        $i = 1;
        $expedientes = ExpedienteDoctor::all();
        $pacientes = Paciente::all(); 
        return view('DoctorGeneral.expedientesGeneral',compact('i','expedientes','pacientes'));
    }

    public function showExpediente($id){
        $i = 1;
        $paciente = Paciente::find($id);
        $expedientePaciente = ExpedienteDoctor::where('paciente_id',$paciente->id)->first();
        $consultasExpediente = DB::table('consulta_expedientedoctor')
                    ->where('expedienteDoctor_id', $expedientePaciente->id)
                    ->get();
        $cantidadConsultas = count($consultasExpediente); 
        //dd($consultasExpediente);
        if($cantidadConsultas != 0){
            foreach ($consultasExpediente as $consulta){
                $consultas = Consulta::where('id', $consulta->consulta_id)->get();
                $collecionConsultas [] = ['fecha' => $consultas[0]->fecha , 'descripcion' => $consultas[0]->descripcion];
            }
        }else{
            $collecionConsultas [] = ['fecha' => 0 , 'descripcion' => 0];
        }
        //dd($collecionConsultas);
        
        return view('DoctorGeneral.ExpedienteGeneralShow',compact('i','paciente','collecionConsultas','cantidadConsultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpedienteDoctor  $expedienteDoctor
     * @return \Illuminate\Http\Response
     */
    public function show(ExpedienteDoctor $expedienteDoctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpedienteDoctor  $expedienteDoctor
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpedienteDoctor $expedienteDoctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpedienteDoctor  $expedienteDoctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpedienteDoctor $expedienteDoctor)
    {
        //
    }

    public function deleteExpediente($id){
        $expedientePaciente = ExpedienteDoctor::find($id);
        $paciente = Paciente::find($expedientePaciente->paciente_id);
        return view('DoctorGeneral.destroy',compact('expedientePaciente','paciente'));
    }


    public function destroy($id)
    {
        $expedientePaciente = ExpedienteDoctor::find($id);
        $expedientePaciente->delete(); 
        return redirect()->route('expedientesGeneral');
    }
}
