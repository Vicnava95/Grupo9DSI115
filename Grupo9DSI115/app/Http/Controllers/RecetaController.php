<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

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
    public function index()
    {
        $recetas = Receta::paginate();

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
            ->with('success', 'Receta created successfully.');
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
            ->with('success', 'Receta updated successfully');
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
            ->with('success', 'Receta deleted successfully');
    }
}
