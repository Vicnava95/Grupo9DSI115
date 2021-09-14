<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpedienteDoctoraDental;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Consulta;
use DB;

class ExpedienteDoctoraDentalController extends Controller
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
        $expedientePaciente = ExpedienteDoctoraDental::where('paciente_id',$paciente->id)->first();
        $consultasExpediente = DB::table('consulta_expedientedoctora')
                    ->where('expedienteDoctora_id', $expedientePaciente->id)
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
        
        return view('DoctoraDental.ExpedientePacienteDoctoraDental',compact('i','paciente','citaPaciente','collecionConsultas','cantidadConsultas'));
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

        $expedientePaciente = ExpedienteDoctoraDental::where('paciente_id',$idPaciente)->first();
        //dd($expedientePaciente);
        $pivotTable = DB::table('consulta_expedientedoctora')->insert([
            'consulta_id' => $consulta->id,
            'expedienteDoctora_id' => $expedientePaciente->id,
        ]);

        return redirect()->back();
    }

    public function expedientes(){
        $i = 1;
        $expedientes = ExpedienteDoctoraDental::all();
        $pacientes = Paciente::all(); 
        return view('DoctoraDental.expedientesDentales',compact('i','expedientes','pacientes'));
    }

    public function showExpediente($id){
        $i = 1;
        $paciente = Paciente::find($id);
        $expedientePaciente = ExpedienteDoctoraDental::where('paciente_id',$paciente->id)->first();
        $consultasExpediente = DB::table('consulta_expedientedoctora')
                    ->where('expedienteDoctora_id', $expedientePaciente->id)
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
        
        return view('DoctoraDental.ExpedienteShow',compact('i','paciente','collecionConsultas','cantidadConsultas'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpedienteDoctoraDental  $expedienteDoctoraDental
     * @return \Illuminate\Http\Response
     */
    public function show(ExpedienteDoctoraDental $expedienteDoctoraDental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpedienteDoctoraDental  $expedienteDoctoraDental
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpedienteDoctoraDental $expedienteDoctoraDental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpedienteDoctoraDental  $expedienteDoctoraDental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpedienteDoctoraDental $expedienteDoctoraDental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpedienteDoctoraDental  $expedienteDoctoraDental
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpedienteDoctoraDental $expedienteDoctoraDental)
    {
        //
    }
}
