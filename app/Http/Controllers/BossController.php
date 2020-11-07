<?php

namespace App\Http\Controllers;

use App\Area;
use App\Boss;
use App\User;
use Illuminate\Http\Request;

class BossController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bosses = Boss::all();
        return view('bosses.index', compact('bosses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('bosses.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $boss = new Boss();
        $boss->name = $request->input('name');
        $boss->area_id = $request->input('area_id');
        $boss->save();
        return redirect('/bosses');
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
    public function edit(Boss $boss)
    {
        $areas = Area::all();
        return view('bosses.edit', compact('areas', 'boss'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boss $boss)
    {
//        dd($request->all());
        $boss->name = $request->input('name');
        $boss->area_id = $request->input('area_id');
        $boss->save();
        return redirect()->route('bosses.index')->with('message',' - El patron ha sido actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boss $boss)
    {
        $boss->delete();
        return redirect()->route('bosses.index')->with('message-alert',' - El empleado ha sido borrado permanentemente');
    }
}
