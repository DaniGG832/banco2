<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperancionRequest;
use App\Http\Requests\UpdateOperancionRequest;
use App\Models\Operancion;

class OperancionController extends Controller
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
     * @param  \App\Http\Requests\StoreOperancionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOperancionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operancion  $operancion
     * @return \Illuminate\Http\Response
     */
    public function show(Operancion $operancion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operancion  $operancion
     * @return \Illuminate\Http\Response
     */
    public function edit(Operancion $operancion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOperancionRequest  $request
     * @param  \App\Models\Operancion  $operancion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOperancionRequest $request, Operancion $operancion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operancion  $operancion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operancion $operancion)
    {
        //
    }
}
