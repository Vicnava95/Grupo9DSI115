<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Persona;
use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Http\Request;
use DB;

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
        $consulta = new Consulta();
        $pacientes = Paciente::all();
        $personas = Persona::select('*')
                ->where('rolpersona_id',2)
                ->orWhere('rolpersona_id',3)
                ->get();
        return view('cita.create', compact('cita', 'pacientes', 'personas', 'consulta', 'urlView'));
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


    public function searchPaciente($name){
        if($name != '' || $name != ' '){
            $data = DB::table('pacientes')
                ->where('nombres','LIKE',"%{$name}%")
                ->get();//obtenemos el data si cumple la restricción
            
                $output = '<ul id="listP" class="dropdown-menu modal-body bg-dark text-white" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= 
                '<li id="cadena" class="modal-body bg-dark text-white" value="'.$row->id.' "onclick="searchPhase('.$row->id.')">'.$row->nombres.' '.$row->apellidos.'</li>';
            }
            $output .= '</ul><br>';
            echo $output;    
        }
        
    }
}
