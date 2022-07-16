<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\pedidos;
use Illuminate\Http\Request;
use Exception;

class MenuApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $menu=Menu::all('id','nombre','precio');
         return response()->json($menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function search($idMenu)
    {
        // 
        $menu=Menu::select('id','nombre','precio')->where("id","=",$idMenu)->get();
        return response()->json($menu);
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
        try{
            $pedido= new pedidos();
            $pedido->idmenu=$request->idmenu;
            $pedido->nombreCliente=$request->nombreCliente;
            $pedido->apellidosCliente=$request->apellidosCliente;
            $pedido->correo=$request->correo;
            $pedido->telefono=$request->telefono;
            $pedido->direccion=$request->direccion;
            $pedido->cantidad=$request->cantidad;
            $pedido->descripcion=$request->descripcion;
            $pedido->costo=$request->costo;
            $pedido->save();
            $result=['pedido'=> $pedido->pedido, 'created'=>true];
            return $result;
 
 
        }
        catch(Exception $e){
            return "Error . ". $e->getMessage();
 
        }
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
    }
}
