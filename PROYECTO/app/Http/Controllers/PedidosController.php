<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use App\Models\Menu;
use App\Models\detallePedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pedidos=pedidos::all();
        return view('pedidos.index',compact('pedidos'));

    }
    public function viewpdf($id)
    {
        //
        $pedido=pedidos::find($id);
        $pdf = PDF::loadView('pedidos.pdf', compact('pedido'));

      // download PDF file with download method
      return $pdf->stream("pedidos.pdf", ['Attachment' => false]);


    }
    public function estadisticas()
    {

        
    $datos= DB::select('SELECT m.nombre, sum(p.cantidad) as cantidades from pedidos as p INNER JOIN menu as m on p.idmenu = m.id GROUP BY p.idmenu;');

      $puntos=[];
      foreach ($datos as $c) {
      $puntos[] = ['name' => $c->nombre, 'y' => floatval($c->cantidades)];
    }
    return view('pedidos.graficos', ["date" => json_encode($puntos)]);

    //   return view('pedidos.graficos',compact('datos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $menus=menu::all();

        return view('pedidos.registrar',compact('menus',));
    }
    public function registro()
    {
        //
        
        $platos=menu::all();
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
        //
        // dd($request);
        $pedido=new pedidos();
        $pedido->idmenu=$request->idmenu;
        $pedido->nombreCliente=$request->nombre;
        $pedido->apellidosCliente=$request->apellidos;
        $pedido->correo=$request->email;
        $pedido->telefono=$request->telefono;
        $pedido->direccion=$request->direccion;
        $pedido->cantidad=$request->txtCantidad;
        $pedido->descripcion=$request->notas;
        $arrDetalle = json_decode($request->detalle, true);
        $pedido->costo=$request->total;
        $pedido->save();
        foreach ($arrDetalle as $detalle) {
            $tempDetalle = new detallePedido();
            $tempDetalle->idPedido = $pedido->id;
            $tempDetalle->idMenu = $detalle["idProducto"];
            $tempDetalle->cantidad = $detalle["cantidad"];
            $tempDetalle->precio = $detalle["precio"];
            $tempDetalle->eliminado = 0;
            if($tempDetalle->cantidad!=0){
                $tempDetalle->save();
            }
        }
        return redirect('pedidos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show(pedidos $pedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit(pedidos $pedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pedidos $pedidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        pedidos::find($id)->delete();
        return redirect()->route('pedidos.index');
    }
}
