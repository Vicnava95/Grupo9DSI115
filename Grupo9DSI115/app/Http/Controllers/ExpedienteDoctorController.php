<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpedienteDoctor;

class ExpedienteDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('DoctorGeneral.ExpedientePacienteDoctorGeneral');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpedienteDoctor  $expedienteDoctor
     * @return \Illuminate\Http\Response
     */
    public function show(ExpedienteDoctor $expedienteDoctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpedienteDoctor  $expedienteDoctor
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpedienteDoctor $expedienteDoctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpedienteDoctor  $expedienteDoctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpedienteDoctor $expedienteDoctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpedienteDoctor  $expedienteDoctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpedienteDoctor $expedienteDoctor)
    {
        //
    }
}
