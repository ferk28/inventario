<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SafeguardFormRequest;
use PDF;
use App\Inventory;
use App\Safeguard;
use App\Http\Controllers\Controller;

class SafeguardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $safeguards = Safeguard::with('inventory');
        return view('safeguards.index', compact('safeguards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventories = Inventory::all();
        return view('safeguards.create', compact('inventories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SafeguardFormRequest $request)
    {
        $safeguard = new Safeguard();
        $safeguard->employee_id = $request->input('employee_id');
        $safeguard->inventory_id = $request->input('inventory_id');
        $safeguard->save();
        return redirect('/safeguards')->with('message',' - La responsiva ha sido agregado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Safeguard $safeguard)
    {
        $inventories = Inventory::all();
        $employees = Employee::all();
        return view('safeguards.edit', compact('inventories', 'employees','safeguard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SafeguardFormRequest $request, Safeguard $safeguard)
    {
        $safeguard->inventory_id = $request->input('inventory_id');
        $safeguard->employee_id = $request->input('employee_id');
        $safeguard->save();
        return redirect()->route('safeguards.index')->with('message',' - La responsiva ha sido actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Safeguard $safeguard)
    {
        $safeguard->delete();
        return redirect()->route('inventories.index')->with('message-alert',' - La responsiva ha sido borrado permanentemente');
    }
    public function PDFgenerator($id)
    {
        $safeguard = Safeguard::find($id);
        $pdf = PDF::loadView('safeguards.pdf',['safeguards'=>$safeguard])->setPaper('a4','portrait');

        $filename = $safeguard->employee->name;
        return $pdf->stream($filename . '-INSAI-responsiva.pdf');
    }
}
