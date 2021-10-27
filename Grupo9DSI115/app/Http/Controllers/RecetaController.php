<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Cita;
use App\Models\Receta;
use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class RecetaController
 * @package App\Http\Controllers
 */
class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rol = Auth::user()->rols_fk;
        $texto =trim($request->get('texto'));
        if($texto==''){
            if($rol==2 || $rol==3){
                $consultas = Consulta::select('*')
                    ->where('persona_id', $rol)
                    ->pluck('id')
                    ->all();

                $recetas = Receta::select('*')
                    ->whereIn('consulta_id',$consultas)
                    ->orderByDesc('fecha')
                    ->paginate(10);
            }
            else{
                $recetas = Receta::paginate();
            }
        }
        else{

            $pacientes = Paciente::select('*')
                ->where('nombres','LIKE',$texto.'%')
                ->orWhere('apellidos','LIKE',$texto.'%')
                ->pluck('id')
                ->all();

            if($rol==2 || $rol==3){
                $consultas = Consulta::select('*')
                    ->where('persona_id', $rol)
                    ->whereIn('paciente_id', $pacientes)
                    ->pluck('id')
                    ->all();

                $recetas = Receta::select('*')
                    ->whereIn('consulta_id',$consultas)
                    ->orderByDesc('fecha')
                    ->paginate(10);
            }
            else{
                $consultas = Consulta::select('*')
                    ->whereIn('paciente_id', $pacientes)
                    ->pluck('id')
                    ->all();

                $recetas = Receta::select('*')
                    ->whereIn('consulta_id',$consultas)
                    ->orderByDesc('fecha')
                    ->paginate(10);
            }
        }

        return view('receta.index', compact('recetas'))
            ->with('i', (request()->input('page', 1) - 1) * $recetas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $receta = new Receta();
        return view('receta.create', compact('receta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Receta::$rules);

        $receta = Receta::create($request->all());

        return redirect()->route('recetas.index')
            ->with('success', 'Receta creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receta = Receta::find($id);

        return view('receta.show', compact('receta'));
    }

    public function imprimir($id)
    {
        $receta = Receta::find($id);
        $fecha = Carbon::now()->format('Y-m-d');
        $pdf = PDF::loadView('pdf.receta', compact('receta', 'fecha'));
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receta = Receta::find($id);

        return view('receta.edit', compact('receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Receta $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        request()->validate(Receta::$rules);

        $receta->update($request->all());

        return redirect()->route('recetas.index')
            ->with('success', 'Receta actualizada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $receta = Receta::find($id);
    return view('receta.destroy', compact('receta'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $receta = Receta::find($id)->delete();

        return redirect()->route('recetas.index')
            ->with('success', 'Receta eliminada satisfactoriamente');
    }
}
