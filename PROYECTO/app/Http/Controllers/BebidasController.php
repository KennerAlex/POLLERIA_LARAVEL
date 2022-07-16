<?php

namespace App\Http\Controllers;

use App\Models\bebidas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\tipoPlato;
use Illuminate\Support\Facades\Storage;

class BebidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bebidas= DB::select('SELECT m.id,m.nombre,m.descripcion,m.img,t.nombre as TipoPlato,m.precio 
        FROM menu as m INNER JOIN
        tipoplato as t ON
         m.idtipo =t.id WHERE m.idtipo=4;');
         return view('platos.bebidas.index',compact('bebidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('platos.bebidas.create');
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
        $request->validate([
            'imagen'=>'required|image|max:2048'
        ]);
        $imagen=$request->file('imagen')->store('public/imagenes/platos');
        $img=Storage::url($imagen);
        $bebida=new menu();
        $bebida->nombre=$request->txtNombre;
        $bebida->descripcion=$request->txtDescripcion;
        $bebida->precio=$request->txtPrecio;
        $bebida->idtipo=4;
        $bebida->img=$img;
        $bebida->save();
        return redirect('bebidas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bebidas  $bebidas
     * @return \Illuminate\Http\Response
     */
    public function show(bebidas $bebidas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bebidas  $bebidas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tipos=tipoPlato::all();
        $bebida=menu::find($id);
        return view('platos.bebidas.edit',compact('bebida','tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bebidas  $bebidas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'imagen'=>'required|image|max:2048'
        ]);
        $imagen=$request->file('imagen')->store('public/imagenes/platos');
        $img=Storage::url($imagen);

        $plato=menu::find($id);
        $plato->nombre=$request->txtNombre;
        $plato->descripcion=$request->txtDescripcion;
        $plato->precio=$request->txtPrecio;
        $plato->idtipo=$request->idtipo;
        $plato->img=$img;
        $plato->update();
        return redirect('bebidas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bebidas  $bebidas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         menu::find($id)->delete();
        return redirect()->route('bebidas.index');
    }
}
