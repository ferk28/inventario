<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Http\Requests\AreaFormRequest;
use App\Http\Requests\AreaEditFormRequest;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::paginate(10);
        return view('areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaFormRequest $request)
    {
        //dd($request->all());
        $area = new Area();
        $area->name = $request->input('name');
        $area->phone = $request->input('phone');
        $area->extension = $request->input('extension');
        $area->save();
        return redirect('/areas')->with('message',' - El área ha sido agregada satisfactoriamente!');
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
    public function edit(Area $area)//Area from Route::get/area/edit
    {
        return view('areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaEditFormRequest $request, Area $area)
    {
        $area->name=$request->input('name');
        $area->phone=$request->input('phone');
        $area->extension=$request->input('extension');
        $area->save();
        return redirect()->route('areas.index')->with('message',' - El area ha sido actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return redirect()->route('areas.index')->with('message-alert',' - El area ha sido borrada permanentemente');
    }
}
