<?php

namespace App\Http\Controllers;

use App\Models\tipoPlato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoPlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos = DB ::select('SELECT * FROM tipoplato WHERE activo = 1 and eliminado = 0');
        return view('TipoPlato.index',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('TipoPlato.create');
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
        $tipoPlato = new tipoPlato();
        $tipoPlato ->nombre = $request->nombre;
        $tipoPlato->descripcion=$request->descripcion;
        $tipoPlato->activo = $request->estado;
        $tipoPlato->save();
        return redirect()->route('tipoplato.index');
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
        // $tipoplato = DB::select('SELECT  * FROM  tipoplato where id ='.$id);
        // // return $tipoplato;
        $tipoplato=tipoPlato::find($id);
        return view('TipoPlato.edit',compact('tipoplato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tipoplato)
    {
        //
        $tipoPlato = tipoPlato::find($tipoplato);
        $tipoPlato ->nombre = $request->nombre;
        $tipoPlato ->descripcion = $request->descripcion;
        $tipoPlato->activo = $request->activo;
        $tipoPlato->save();
        return redirect()->route('tipoplato.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tipoplato)
    {
        //
        $tipoPlato = tipoPlato::find($tipoplato);
        $tipoPlato->activo = 0;
        $tipoPlato->eliminado = 1;
        $tipoPlato->save();
        return back()->with('Borrado', 'El plato se borró correctamente');
    }
}
