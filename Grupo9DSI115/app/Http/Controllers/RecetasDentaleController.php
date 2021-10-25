<?php

namespace App\Http\Controllers;

use App\Models\RecetasDentale;
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

        return view('recetas-dentale.index', compact('recetasDentales'))
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RecetasDentale::$rules);
        //dd($request); 
        $recetasDentale = RecetasDentale::create($request->all());
        return redirect()->route('recetas-dentales.index')
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

        return view('recetas-dentale.show', compact('recetasDentale'));
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
        request()->validate(RecetasDentale::$rules);

        $recetasDentale->update($request->all());

        return redirect()->route('recetas-dentales.index')
            ->with('success', 'RecetasDentale updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $recetasDentale = RecetasDentale::find($id)->delete();

        return redirect()->route('recetas-dentales.index')
            ->with('success', 'RecetasDentale deleted successfully');
    }
}
