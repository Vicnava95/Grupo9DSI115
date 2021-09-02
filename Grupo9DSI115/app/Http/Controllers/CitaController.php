<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\ExpedienteDoctor;
use App\Models\ExpedienteDoctoraDental;
use App\Models\Persona;
use Illuminate\Http\Request;

/**
 * Class CitaController
 * @package App\Http\Controllers
 */
class CitaController extends Controller
{

    const urlRedirect = [
        'cita.create',
        'citasdg.index'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $citas = Cita::paginate();

        return view('cita.index', compact('citas'))
            ->with('i', (request()->input('page', 1) - 1) * $citas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* 
        
    */
    /**
      * $bandera
        0 == index,
        0 != otro
      */
    public function create(Request $request)
    {
        $cita = new Cita();
        $url = url()->previous();
        $urlView = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
        return view('cita.create', compact('cita','urlView'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $urlView)
    {
        request()->validate(Cita::$rules);
        
        $cita = Cita::create($request->all());
        //Busco al doctor o doctora que fue asignada a la cita y obtengo el objeto
        $persona = Persona::find($request->persona_id);
        //dd($persona);

        //Obtengo el tipo de doctor que es la persona 
        //Es un if para conocer que de doctor se va abrir el expediente
        // 2-Doctor General
        // 3-Doctora Dental 
        if($persona->rolpersona_id == 2){
            //Doctor General
            $expedientePaciente_Doctor = ExpedienteDoctor::where('paciente_id',$cita->paciente_id)->get();
            //dd($expedientePaciente_Doctor);
            
            if($expedientePaciente_Doctor->isEmpty()){
                //Crear expediente
                $crearExpedientePaciente_Doctor = ExpedienteDoctor::create([
                    'paciente_id' => $cita->paciente_id
                ]);
                $crearExpedientePaciente_Doctor->save();
                //dd($crearExpedientePaciente_Doctor);

            }else{
                //dd('La paciente ya existe'); //El expediente de ese paciente ya existe
            }
            

        }else{
            //Doctora Dental
            $expedientePaciente_DoctoraDental = ExpedienteDoctoraDental::where('paciente_id',$cita->paciente_id)->get();
            //dd($expedientePaciente_DoctoraDental);
            
            if($expedientePaciente_DoctoraDental->isEmpty()){
                //Crear expediente
                $crearExpedientePaciente_Doctor = ExpedienteDoctoraDental::create([
                    'paciente_id' => $cita->paciente_id
                ]);
                $crearExpedientePaciente_Doctor->save();
                //dd($crearExpedientePaciente_Doctor);

            }else{
                //dd('La paciente ya existe Doctora'); //El expediente de ese paciente ya existe
            }
            

        }
        return redirect()->route($urlView)
            ->with('success', 'Cita created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cita = Cita::find($id);

        return view('cita.show', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = Cita::find($id);

        return view('cita.edit', compact('cita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cita $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        request()->validate(Cita::$rules);

        $cita->update($request->all());

        return redirect()->route('citas.index')
            ->with('success', 'Cita updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cita = Cita::find($id)->delete();

        return redirect()->route('citas.index')
            ->with('success', 'Cita deleted successfully');
    }
}
