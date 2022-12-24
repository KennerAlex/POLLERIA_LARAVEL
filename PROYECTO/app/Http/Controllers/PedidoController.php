<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Plato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $platos = Plato::all();
        return view('pedidos.create',compact('platos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido=new Pedido();
        $pedido->nombreCliente=$request->nombre;
        $pedido->apellidosCliente=$request->apellidos;
        $pedido->correo=$request->email;
        $pedido->celular=$request->telefono;
        $pedido->direccion=$request->direccion;
        $pedido->notas=$request->notas;
        $pedido->delivery = ($request->delivery=="on")?true:false;
        $pedido->monto=$request->total;
        $pedido->user_id = auth()->id();
        $arrDetalle = json_decode($request->detalle, true);
        $pedido->save();
        foreach ($arrDetalle as $detalle) {
            $tempDetalle = new DetallePedido();
            $tempDetalle->pedido_id	 = $pedido->id;
            $tempDetalle->plato_id = $detalle["idProducto"];
            $tempDetalle->cantidad = $detalle["cantidad"];
            $tempDetalle->precio = $detalle["precio"];
            
            if($tempDetalle->cantidad!=0){
                $tempDetalle->save();
            }
        }
        return redirect('pedidos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        dd($pedido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()-route('pedidos.index');
    }
}
