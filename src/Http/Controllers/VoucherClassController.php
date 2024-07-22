<?php

namespace IntraCompany\Commons\Http\Controllers;

use IntraCompany\Commons\Http\Requests\VoucherClassRequest;
use IntraCompany\Commons\Models\VoucherClass;
use Illuminate\Http\Request;

class VoucherClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subsystem = $request->subsystem ?? null;
        $voucherClasses = VoucherClass::when($subsystem, function ($q) use ($subsystem) {
            $q->where('subsystem', $subsystem);
        })
            ->with('voucherClassAnula')
            ->get();

        return response()->json($voucherClasses, 200);
    }

    public function select(Request $request)
    {
        $subsystem = $request->subsystem ?? null;
        $ids = $request->ids ? explode(',', $request->ids) : null;

        $rows = VoucherClass::when($ids, function ($q) use ($ids) {
            $q->whereIn('id', $ids);
        })
            ->when($subsystem, function ($q) use ($subsystem) {
                $q->where('subsystem', $subsystem);
            })
            ->get(['id', 'name', 'abbreviation', 'subsystem']);

        return response()->json($rows, 200);
    }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoucherClassRequest $request)
    {
        VoucherClass::create($request->validated());

        return redirect()->route('appAdmin')->with('success', 'Tipo Comprobante insertado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \IntraCompany\Vouchers\Models\VoucherClass  $voucherClass
     * @return \Illuminate\Http\Response
     */
    public function show(VoucherClass $voucherClass)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VoucherClassRequest $request, VoucherClass $voucherClass)
    {
        $voucherClass->update($request->validated());

        return redirect()->route('appAdmin')->with('success', 'Tipo Comprobante editado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoucherClass $voucherClass)
    {
        $voucherClass->delete();

        return redirect()->route('appAdmin')->with('success', 'Tipo Comprobante eliminado.');
    }



    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VoucherClass $voucherClass)
    {
        $voucherClasses = VoucherClass::where('id', '<>', $voucherClass->id)->get(['id', 'name']);
        $anuladoPorVoucherClass = VoucherClass::find($voucherClass->voucher_class_anula_id);

        return view('systems.create_or_edit_voucher_class', compact('voucherClass', 'voucherClasses', 'anuladoPorVoucherClass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $voucherClass = new VoucherClass;
        $voucherClasses = VoucherClass::all();

        return view('systems.create_or_edit_voucher_class', compact('voucherClass', 'voucherClasses'));
    }

}
