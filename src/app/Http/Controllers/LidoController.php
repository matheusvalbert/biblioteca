<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLidoRequest;
use App\Http\Requests\UpdateLidoRequest;
use App\Models\Lido;

class LidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreLidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLidoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lido  $lido
     * @return \Illuminate\Http\Response
     */
    public function show(Lido $lido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lido  $lido
     * @return \Illuminate\Http\Response
     */
    public function edit(Lido $lido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLidoRequest  $request
     * @param  \App\Models\Lido  $lido
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLidoRequest $request, Lido $lido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lido  $lido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lido $lido)
    {
        //
    }
}
