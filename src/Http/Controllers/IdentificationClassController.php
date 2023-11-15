<?php

namespace DuxDucisArsen\Commons\Http\Controllers;

use DuxDucisArsen\Commons\Models\IdentificationClass;
use Illuminate\Http\Request;

class IdentificationClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows  = IdentificationClass::all()->toJson();
        return response()->json($rows, 200);
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
     * @param  \DuxDucisArsen\Commons\Models\IdentificationClass  $identificationClass
     * @return \Illuminate\Http\Response
     */
    public function show(IdentificationClass $identificationClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \DuxDucisArsen\Commons\Models\IdentificationClass  $identificationClass
     * @return \Illuminate\Http\Response
     */
    public function edit(IdentificationClass $identificationClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \DuxDucisArsen\Commons\Models\IdentificationClass  $identificationClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IdentificationClass $identificationClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \DuxDucisArsen\Commons\Models\IdentificationClass  $identificationClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(IdentificationClass $identificationClass)
    {
        //
    }
}
