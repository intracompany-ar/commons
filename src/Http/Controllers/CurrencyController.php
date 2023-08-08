<?php

namespace DuxDucisArsen\Commons\Http\Controllers;

use DuxDucisArsen\Commons\Http\Requests\CurrencyRequest;
use DuxDucisArsen\Commons\Models\Currency;

use Illuminate\Routing\Controller;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Currency::withoutGlobalScope('onlyCommonsCurrencies')->get();
        return response()->json($rows, 200);
    }

    public function indexCommons()
    {
        $rows = Currency::todas();
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
    public function store(CurrencyRequest $request)
    {
        Currency::create($request->validated());
        return response()->json('Insertado', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Afip\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Afip\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Afip\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyRequest $request, Currency $currency)
    {
        $currency->update($request->validated());
        return response()->json('Actualizado', 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Afip\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();
        return response()->json('Eliminada', 204);
    }
}
