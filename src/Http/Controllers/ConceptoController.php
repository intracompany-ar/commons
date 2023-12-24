<?php

namespace DuxDucisArsen\Commons\Http\Controllers;

use App\Http\Requests\Accounting\ConceptoRequest;
use DuxDucisArsen\Commons\Models\Concepto;
use DuxDucisArsen\Commons\Http\Controllers\Controller;

class ConceptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Concepto::with('voucherClasses:id,name')->get();

        return response()->json($rows, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConceptoRequest $request)
    {
        Concepto::create($request->validated());

        return response()->json('Insertado', 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ConceptoRequest $request, Concepto $concepto)
    {
        $concepto->update($request->validated());

        return response()->json('', 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concepto $concepto)
    {
        $concepto->delete();

        return response()->json('', 204);
    }
}
