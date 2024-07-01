<?php

namespace IntraCompany\Commons\Http\Controllers;

use IntraCompany\Commons\Http\Requests\CurrencyRequest;
use IntraCompany\Commons\Models\Currency;

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
     * @param  \App\Models\Commons\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commons\Currency  $currency
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
     * @param  \App\Models\Commons\Currency  $currency
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
     * @param  \App\Models\Commons\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();
        return response()->json('Eliminada', 204);
    }
}
