<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryEditFormRequest;
use App\Http\Requests\InventoryFormRequest;
use App\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::all();
        return view('inventories.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventories.create'    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryFormRequest $request)
    {
        //dd($request->all());
                $inventories = new Inventory();
                $inventories->brand = $request->input('brand');
                $inventories->serial = $request->input('serial');
                $inventories->type = $request->input('type');
                $inventories->model = $request->input('model');
                $inventories->color = $request->input('color');
                $inventories->value = $request->input('value');
                $inventories->feature = $request->input('feature');
                $inventories->description = $request->input('description');
                $inventories->user_id = Auth::user()->id;
                $inventories->save();
                return redirect('/inventories')->with('message',' - El producto se ha sido agregado satisfactoriamente!');
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
    public function edit(Inventory $inventory)
    {
        return view('inventories.edit', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryEditFormRequest $request, Inventory $inventory)
    {
        $inventory->brand = $request->input('brand');
        $inventory->serial = $request->input('serial');
        $inventory->type = $request->input('type');
        $inventory->model = $request->input('model');
        $inventory->color = $request->input('color');
        $inventory->value = $request->input('value');
        $inventory->feature = $request->input('feature');
        $inventory->description = $request->input('description');
        $inventory->user_id = Auth::user()->id;
        $inventory->save();
        return redirect()->route('inventories.index')->with('message',' - El area ha sido actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventories.index')->with('message-alert',' - El area ha sido borrada permanentemente');
    }
}
