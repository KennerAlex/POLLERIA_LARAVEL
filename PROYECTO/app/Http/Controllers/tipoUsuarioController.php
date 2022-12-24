<?php

namespace App\Http\Controllers;

use App\Models\tipoUsuario;
use Illuminate\Http\Request;

class tipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles=tipoUsuario::all();
        return view('usuarios.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rol=new tipoUsuario();
        $rol->tipo=$request->txtRol;
        $rol->save();
        return redirect('tipoUsuario');
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
        //
        $rol=tipoUsuario::find($id);
        return view('usuarios.roles.edit',compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rol=tipoUsuario::find($id);
        $rol->tipo=$request->txtRol;
        $rol->update();
        return redirect('tipoUsuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $rol=tipoUsuario::find($id);
        $rol->activo=0;
        $rol->update();

        //tipoUsuario::find($id)->delete();
        return redirect()->route('tipoUsuario.index');
    }
}
