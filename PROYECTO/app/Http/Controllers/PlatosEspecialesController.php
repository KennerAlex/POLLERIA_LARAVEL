<?php

namespace App\Http\Controllers;

use App\Models\platosEspeciales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\tipoPlato;
use Illuminate\Support\Facades\Storage;

class PlatosEspecialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $platos= DB::select('SELECT m.id,m.nombre,m.descripcion,m.img,t.nombre as TipoPlato,m.precio 
        FROM menu as m INNER JOIN
        tipoplato as t ON
         m.idtipo =t.id WHERE m.idtipo=2;');
         return view('platos.platosespeciales.index', compact('platos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('platos.platosespeciales.create');
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

         $plato=new menu();
         $plato->nombre=$request->txtNombre;
         $plato->descripcion=$request->txtDescripcion;
         $plato->precio=$request->txtPrecio;
         $plato->idtipo=2;
         $plato->img=$img;
         $plato->save();
        return redirect('especiales');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\platosEspeciales  $platosEspeciales
     * @return \Illuminate\Http\Response
     */
    public function show(platosEspeciales $platosEspeciales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\platosEspeciales  $platosEspeciales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tipos=tipoPlato::all();
        $plato=menu::find($id);
        return view('platos.platosespeciales.edit',compact('plato','tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\platosEspeciales  $platosEspeciales
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
        return redirect('especiales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\platosEspeciales  $platosEspeciales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        menu::find($id)->delete();
        return redirect()->route('especiales.index');
    }
}
