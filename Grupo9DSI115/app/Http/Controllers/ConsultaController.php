<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Persona;
use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Http\Request;

/**
 * Class ConsultaController
 * @package App\Http\Controllers
 */
class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto =trim($request->get('texto'));
        if($texto==''){
            $consultas = Consulta::paginate();
        } else{
            $consultas = Consulta::select('*')
                        ->where('paciente_id', '=' ,$texto)
                        ->orderByDesc('fecha')
                        ->paginate(10);
        }

        return view('consulta.index', compact('consultas'))
            ->with('i', (request()->input('page', 1) - 1) * $consultas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $url = url()->previous();
        $urlView = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
        $cita = new Cita();
        $consulta = new Consulta();
        $pacientes = Paciente::all();
        $personas = Persona::all();
        return view('consulta.create', compact('consulta','pacientes', 'personas', 'cita','urlView'));
    } 

    public function createByDashboard(Cita $citaRef)
    {
        $url = url()->previous();
        $urlView = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
        $cita = $citaRef;
        $consulta = new Consulta();
        $pacientes = Paciente::all();
        $personas = Persona::all();
        return view('consulta.create', compact('consulta','pacientes', 'personas', 'cita','urlView'));
    }

    /**
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $urlView)
    {
        request()->validate(Consulta::$rules);

        $consulta = Consulta::create($request->all());

        return redirect()->route($urlView)
            ->with('success', 'Consulta creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = Consulta::find($id);

        return view('consulta.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = Consulta::find($id);
        $personas = Persona::all();
        return view('consulta.edit', compact('consulta','personas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Consulta $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consulta $consulta)
    {
        request()->validate(Consulta::$rules);

        $consulta->update($request->all());

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta actualizada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $consulta = Consulta::find($id);
        $paciente = Paciente::find($consulta->paciente_id);
        return view('consulta.destroy', compact('consulta', 'paciente'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $consulta = Consulta::find($id)->delete();

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta eliminada exitosamente');
    }
}
