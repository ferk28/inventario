<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\User;
use App\Http\Requests\BossFormRequest;
use App\Http\Controllers\Controller;

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
        $bosses = User::bosses()->paginate(10);
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
    public function store(BossFormRequest $request)
    {
        User::create(
            $request->only('name', 'email', 'phone', 'no_control')
            + [
                'role' => 'boss',
                'password' => bcrypt($request->input('password'))
            ]
        );
        //dd($request->all());
        return redirect('/bosses')->with('message',' - El patron :D ha sido agregado satisfactoriamente! :D');
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
    public function edit($id)
    {
        $boss = User::bosses()->findOrFail($id);
        return view('bosses.edit', compact('boss'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BossFormRequest $request, $id)
    {
        //dd($request->all());
        $user = User::bosses()->findOrFail($id);

        $data = $request->only('name', 'phone', 'no_control');

        $password = $request->input('password');

        if($password)
            $data += ['password' => bcrypt($password)];


        $user->fill($data);
        $user->save();
        return redirect()->route('bosses.index')->with('message',' - El patron :D ha sido actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $boss)
    {
        $bossName = $boss->name;
        $boss->delete();
        return redirect()->route('bosses.index')->with('message-alert',' - El patrón ' .$bossName. ' :D se ha borrado permanentemente');
    }
}
