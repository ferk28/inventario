<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Requests\EmployeeFormRequest;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::employees()->paginate(5);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bosses = User::all();
        return view('employees.create',compact('bosses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeFormRequest $request)
    {
        User::create(
            $request->only('name', 'email', 'phone', 'no_control')
            + [
                'role' => 'employee',
                'password' => bcrypt($request->input('password'))
            ]
        );
        //dd($request->all());
        return redirect('/employees')->with('message',' - El empleado :D ha sido agregado satisfactoriamente! :D');
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
        $employee = User::employees()->findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeFormRequest $request, $id)
    {
        //dd($request->all());
        $user = User::employees()->findOrFail($id);

        $data = $request->only('name', 'phone', 'no_control');

        $password = $request->input('password');

        if($password)
            $data += ['password' => bcrypt($password)];


        $user->fill($data);
        $user->save();
        return redirect()->route('employees.index')->with('message',' - El empleado ha sido actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employee)
    {
        $employeeName = $employee->name;
        $employee->delete();
        return redirect()->route('employees.index')->with('message-alert',' - El empleado '.$employeeName. ' ha sido borrado permanentemente');
    }
}
