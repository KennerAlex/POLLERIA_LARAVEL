<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Plato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Svg\Tag\Rect;

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
    
}
