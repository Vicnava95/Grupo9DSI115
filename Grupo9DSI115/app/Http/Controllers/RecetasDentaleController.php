<?php

namespace App\Http\Controllers;

use App\Models\RecetasDentale;
use App\Models\ExpedienteDoctoraDental;
use App\Models\Paciente;
use App\Models\Cita;
use Illuminate\Http\Request;

/**
 * Class RecetasDentaleController
 * @package App\Http\Controllers
 */
class RecetasDentaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetasDentales = RecetasDentale::paginate();
        $expedientes = ExpedienteDoctoraDental::all();
        $pacientes = Paciente::all();

        return view('recetas-dentale.index', compact('recetasDentales','expedientes','pacientes'))
            ->with('i', (request()->input('page', 1) - 1) * $recetasDentales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recetasDentale = new RecetasDentale();
        return view('recetas-dentale.create', compact('recetasDentale'));
    }

    public function createReceta($idCita){
        $cita = Cita::find($idCita);
        $expediente = ExpedienteDoctoraDental::where('paciente_id',$cita->paciente_id)->first();
        $expedienteId = $expediente->paciente_id;
        $recetasDentale = new RecetasDentale();
        return view('DoctoraDental/createRecetaDental',compact('recetasDentale','cita','expedienteId'));
    }

    public function store(Request $request)
    {
        //dd($request); 
        $recetasDentale = RecetasDentale::create($request->all());
        return redirect()->route('rDentales.index')
            ->with('success', 'RecetasDentale created successfully.');
    }

    public function storeExpediente(Request $request)
    {
        $recetasDentale = RecetasDentale::create($request->all());
        return redirect()->route('ExpedientePacienteDoctoraDental',$request->idCita)
            ->with('success', 'RecetasDentale created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recetasDentale = RecetasDentale::find($id);
        $expediente = ExpedienteDoctoraDental::find($recetasDentale->expedienteDental_id);
        $paciente = Paciente::find($expediente->paciente_id);
        return view('recetas-dentale.show', compact('recetasDentale','paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recetasDentale = RecetasDentale::find($id);

        return view('recetas-dentale.edit', compact('recetasDentale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RecetasDentale $recetasDentale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecetasDentale $recetasDentale)
    {
        $recetasDentale->update([
            'fecha' => request('fecha'),
            'descripcion' => request('descripcion'),
            'proximaCita' => request('proximaCita'),
            'expedienteDental_id' => request('expedienteDental_id'),
            'estadoReceta_id' => request('estadoReceta_id'),
        ]);
        $recetasDentale->save();
        return redirect()->route('rDentales.index')
            ->with('success', 'RecetasDentale updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function delete($receta){
        $rDentale = RecetasDentale::find($receta);
        return view('recetas-dentale.destroy',compact('rDentale'));
    }

    public function destroy($id)
    {
        $recetasDentale = RecetasDentale::find($id)->delete();

        return redirect()->route('rDentales.index')
            ->with('success', 'RecetasDentale deleted successfully');
    }
}
