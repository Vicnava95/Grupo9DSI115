<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use Illuminate\Http\Request;

/**
 * Class AbonoController
 * @package App\Http\Controllers
 */
class AbonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abonos = Abono::paginate();

        return view('abono.index', compact('abonos'))
            ->with('i', (request()->input('page', 1) - 1) * $abonos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $abono = new Abono();
        return view('abono.create', compact('abono'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Abono::$rules);

        $abono = Abono::create($request->all());

        return redirect()->route('abonos.index')
            ->with('success', 'Abono created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $abono = Abono::find($id);

        return view('abono.show', compact('abono'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abono = Abono::find($id);

        return view('abono.edit', compact('abono'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Abono $abono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abono $abono)
    {
        request()->validate(Abono::$rules);

        $abono->update($request->all());

        return redirect()->route('abonos.index')
            ->with('success', 'Abono updated successfully');
    }

    public function delete($id)
    {
        $abono = Abono::find($id);
        return view('abono.destroy', compact('abono'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $abono = Abono::find($id)->delete();

        return redirect()->route('abonos.index')
            ->with('success', 'Abono deleted successfully');
    }
}
