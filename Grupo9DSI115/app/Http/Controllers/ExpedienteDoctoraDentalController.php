<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Cita;
use App\Models\Pago;
use App\Models\Abono;
use App\Models\Receta;
use App\Models\Persona;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\EstadoCita;
use App\Models\EstadoPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ExpedienteDoctoraDental;

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
        $consultasExpediente = DB::table('consulta_expedienteDoctora')
                    ->where('expedienteDoctora_id', $expedientePaciente->id)
                    ->get();
        $cantidadConsultas = count($consultasExpediente); 
        //dd($consultasExpediente);
        if($cantidadConsultas != 0){
            foreach ($consultasExpediente as $consulta){
                $consultas = Consulta::where('id', $consulta->consulta_id)->get();
                $collecionConsultas [] = ['fecha' => $consultas[0]->fecha , 'descripcion' => $consultas[0]->descripcion, 'id' =>$consultas[0]->id];
            }
        }else{
            $collecionConsultas [] = ['fecha' => 0 , 'descripcion' => 0, 'id' => 0];
        }
        //dd($collecionConsultas);

        $pagos = Pago::where('expediente_doctora_dental_id', $expedientePaciente->id)->get();
        foreach ($pagos as $pago) {
            $pago['abono'] = Abono::select('*')->where('pago_id',$pago->id)->get()->sum('monto');
        }
        

        
        return view('DoctoraDental.ExpedientePacienteDoctoraDental',compact('i','paciente','citaPaciente','collecionConsultas','cantidadConsultas','pagos'));
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

        $idCita = request('idCita');
        $cita = Cita::find($idCita);

        $cita->update([
            'estadoCita_id' => 1
        ]);

        $expedientePaciente = ExpedienteDoctoraDental::where('paciente_id',$idPaciente)->first();
        //dd($expedientePaciente);
        $pivotTable = DB::table('consulta_expedienteDoctora')->insert([
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
        $consultasExpediente = DB::table('consulta_expedienteDoctora')
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

    public function crearCitaDoctora($idPaciente){
        $estadocita = EstadoCita::pluck('nombre','id');
        $personas = Persona::select('*')
                ->where('rolpersona_id',2)
                ->orWhere('rolpersona_id',3)
                ->get();
        $cita = new Cita();
        $url = url()->previous();
        $urlView = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
        //dd($urlView);
        $pacientes = Paciente::all();
        $paciente = Paciente::find($idPaciente);
        //dd($paciente->id); 
        $personas = Persona::select('*')
                ->where('rolpersona_id',2)
                ->orWhere('rolpersona_id',3)
                ->get();
        return view('DoctoraDental.create',compact('cita', 'pacientes','paciente','personas', 'urlView','estadocita')); 
    }

    public function storeCita(Request $request, $urlView)
    {
        //dd($request);
        if(Auth::user()->rols_fk==3 || Auth::user()->rols_fk==2){
            $request->request->add(['persona_id'=> strval(Auth::user()->rols_fk)]);
            //request()->validate(Cita::$rulesWithoutPersona);
        }
        else{
            //request()->validate(Cita::$rules);
        }
        $cita = DB::table('citas')->insert([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'paciente_id' => $request->paciente_id_hid,
            'persona_id'=> 3,
            'estadoCita_id' => $request->estadoCita_id
        ]); 
        return redirect()->route('dshDoctorDental.index')
            ->with('success', 'Cita creada satisfactoriamente.');
    }

    public function deleteExpediente($id){
        $expedientePaciente = ExpedienteDoctoraDental::find($id);
        $paciente = Paciente::find($expedientePaciente->paciente_id);
        return view('DoctoraDental.destroy',compact('expedientePaciente','paciente'));
    }

    public function destroy($id)
    {
        $expedientePaciente = ExpedienteDoctoraDental::find($id);
        $expedientePaciente->delete(); 
        return redirect()->route('expedientesDentales');
    }

    public function createPaciente()
    {
        $paciente = new Paciente();
        return view('DoctoraDental.pacienteCreate', compact('paciente'));
    }

    public function storePaciente(Request $request)
    {
        //Paciente::create($request->validate());// valida con las reglas establecidas en app/Http/Request/ValidatePacienteFormRequest
        /*return redirect()->route('pacientes.index');*/
        request()->validate(Paciente::$rules);

        $paciente = Paciente::create($request->all());
        $crearExpedientePaciente_Doctor = ExpedienteDoctoraDental::create([
            'paciente_id' => $paciente->id
        ]);
        $crearExpedientePaciente_Doctor->save();
        return redirect()->route('expedientesDentales')
            ->with('success', 'Expediente creado satisfactoriamente');
    }

    public function createReceta($idCita)
    {
        $receta = new Receta();
        return view('DoctoraDental.createReceta', compact('receta','idCita'));
    }

    public function storeReceta(Request $request)
    {
        request()->validate(Receta::$rules);

        $receta = Receta::create($request->all());
        return redirect()->back()
            ->with('success', 'Receta creada satisfactoriamente.');
    }

    //Pago

    public function createPago($idPaciente)
    {
        $pago = new Pago();
        return view('DoctoraDental.createPago', compact('pago','idPaciente'));
    }

    public function storePago(Request $request, $idPaciente)
    {
        request()->validate(Pago::$rulesWithoutExpedienteDoctoraDental);
        $request->request->add(['estado_pago_id'=> strval(2)]);

        $expedienteDental = ExpedienteDoctoraDental::select('*')->where('paciente_id', $idPaciente)->first();
        $request->request->add(['expediente_doctora_dental_id'=> $expedienteDental->id]);
        
        $pago = Pago::create($request->all());

        return redirect()->back()
            ->with('success', 'Pago creado satisfactoriamente.');
    }

    public function createAbono($idPaciente, $idPago)
    {
        $abono = new Abono();
        return view('DoctoraDental.createAbono', compact('abono', 'idPaciente', 'idPago'));
    }

    public function storeAbono(Request $request, $idPaciente, $idPago)
    {
        request()->validate(Abono::$rulesWithoutPago);
        $request->request->add(['pago_id'=> strval($idPago)]);
        $abonos = Abono::select('*')->where('pago_id',$request->get('pago_id'))->get()->sum('monto');
        $totalAbonos = $abonos + $request->get('monto');
        $pago = Pago::where('id', $request->get('pago_id'))->first();
        $pagoTotal = $pago->costo;
        $faltante = $pagoTotal - $abonos;
        if($abonos==$pagoTotal) {
            return redirect()->back()
            ->with('error', 'El pago esta cancelado por completado');
        } elseif ($totalAbonos>$pagoTotal){
            return redirect()->back()
            ->with('error', 'El abono a agregar supera el pago total. Para completar el pago hace falta $'.$faltante);
        }
        else{
            $abono = Abono::create($request->all());
            if($pagoTotal==$totalAbonos) $pago->update(['estado_pago_id'=>'1']);
            else $pago->update(['estado_pago_id'=>'2']);
            return redirect()->back()
            ->with('success', 'Abono created successfully.');
        }
    }
    
    public function showAbonos(Request $request, $idPago)
    {
        $abonos = Abono::where('pago_id', $idPago)->get();
        return view('DoctoraDental.showAbonos', compact('abonos'));
    }

}
