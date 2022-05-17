<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLendoRequest;
use App\Http\Requests\UpdateLendoRequest;
use App\Models\Lendo;

class LendoController extends Controller
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
     * @param  \App\Http\Requests\StoreLendoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLendoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lendo  $lendo
     * @return \Illuminate\Http\Response
     */
    public function show(Lendo $lendo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lendo  $lendo
     * @return \Illuminate\Http\Response
     */
    public function edit(Lendo $lendo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLendoRequest  $request
     * @param  \App\Models\Lendo  $lendo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLendoRequest $request, Lendo $lendo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lendo  $lendo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lendo $lendo)
    {
        //
    }
}
