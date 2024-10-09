<?php

namespace IntraCompany\Commons\Http\Controllers;

use IntraCompany\Commons\Models\CondicionIva;

class CondicionIvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $row = CondicionIva::all();

        return response()->json($row);
    }

    public function show(CondicionIva $condicionIva)
    {
        return response()->json($condicionIva);
    }
}
