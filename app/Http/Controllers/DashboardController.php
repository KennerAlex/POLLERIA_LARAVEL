<?php

namespace App\Http\Controllers;

use \App\Models\DetallePedido;
use \App\Models\Pedido;
use \App\Models\Plato;
use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Svg\Tag\Rect;
use \Illuminate\Support\Facades\App;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estadisticas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vendidos(Request $request)
    {
        // $platos = DB ::select('SELECT nombre FROM platos P INNER JOIN detalle_pedidos D ON P.id=D.plato_id order by id ');
        $platos =DB ::select('SELECT COUNT(*)*DP.cantidad as cantidad,P.nombre  FROM  detalle_pedidos DP INNER JOIN platos P on DP.plato_id=P.id group by plato_id order by cantidad');
        return response(json_encode($platos,200))->header('Content-type',"text/plain");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ingresos(Request $request)
    { 
        $ingresos =DB ::select('SELECT SUM(monto) as ingresos, MONTH(created_at) as mes  FROM  pedidos' );
        return response(json_encode($ingresos,200))->header('Content-type',"text/plain");
    }
    public function delivery(Request $request)
    { 
        $delivery =DB ::select('SELECT COUNT(*) as cantidad, delivery FROM  pedidos group by delivery order by delivery' );
        return response(json_encode($delivery,200))->header('Content-type',"text/plain");
    }
    public function stock(Request $request)
    {
        $stock =DB ::select('SELECT nombre, stockDiario FROM  platos where stockDiario>0' );
        return response(json_encode($stock,200))->header('Content-type',"text/plain");
    }
}
