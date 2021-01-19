<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InventoryEditFormRequest;
use App\Http\Requests\InventoryFormRequest;
use App\Inventory;
use App\Http\Controllers\Controller;
use http\Client\Curl\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use MongoDB\Driver\Session;
use Symfony\Component\Console\Input\Input;
use App\Serie;


class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::orderBy('id','desc')->paginate(10);
        return view('inventories.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventories = Inventory::all();
        return view('inventories.create', compact('inventories'));
    }

    public function store(InventoryFormRequest $request)
    {
        if($request->input('customCheck1') == true)
        {
            //dd($request->all());
/*             Inventory::create(
                $request->only('brand', 'type', 'model', 'unity', 'color', 'value', 'feature', 'size', 'description')
                + [
                    'user_id' =>  Auth::id(),
                ]
            );*/
            //dd($request->all());
            $inventories = DB::table("inventories")
                ->where('model', '=', $request->get('model'))
                ->first(); //latest()
             $seriesCount = $request->input('quantity');
             //return view('series.create', compact('seriesCount','inventories'));
            //return Redirect::route('series.create', 'inventories');
            return redirect()->route('series.create')->with(['inventories' => $inventories])->with(compact('seriesCount'));

        }
        else
        {
/*            Inventory::create(
                $request->only('brand', 'serial', 'type', 'model', 'color', 'value', 'feature', 'description')
            );*/
            dd($request->all());
        }

        //dd($request->all());
/*
        //$inventory->user_id = Auth::user()->id;
        $inventory->save();
        return redirect('/inventories')->with('message',' - El producto se ha sido agregado satisfactoriamente!');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        //dd($request->all());
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
        $deletedNAme = $inventory->name;
        $inventory->delete();
        return redirect()->route('inventories.index')->with('message-alert',' - El area'. $deletedNAme . 'ha sido borrada permanentemente');
    }

}
