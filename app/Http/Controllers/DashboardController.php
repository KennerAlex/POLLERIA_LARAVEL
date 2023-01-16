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
        print "desde";
        return view('estadisticas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vendidos(Request $request)
    {
        $desde=$request->desde;
        $hasta=$request->hasta;
    

        //  $platos =DB ::select("SELECT COUNT(*)*DP.cantidad as cantidad,P.nombre  FROM  detalle_pedidos DP INNER JOIN platos P on DP.plato_id=P.id    WHERE CAST(DP.updated_at AS DATE) between '".$desde."' AND '".$hasta."' group by plato_id order by cantidad");
        // echo"<script>console.log(.$platos.)</script>"
         $platos =DB ::select("CALL `gf_platos_vendidos`('".$desde."','".$hasta."')");
     

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
        $desde=$request->desde;
        $hasta=$request->hasta;

        $ingresos =DB ::select("CALL `gf_ingresos`('".$desde."','".$hasta."')");
        return response(json_encode($ingresos,200))->header('Content-type',"text/plain");
    }
    public function delivery(Request $request)
    { 
        $desde=$request->desde;
        $hasta=$request->hasta;
        $delivery =DB ::select("CALL `gf_delivery`('".$desde."','".$hasta."')");
        return response(json_encode($delivery,200))->header('Content-type',"text/plain");
    }
    public function stock(Request $request)
    {
        $stock =DB ::select('SELECT nombre, stockDiario FROM  platos where stockDiario>0' );
        return response(json_encode($stock,200))->header('Content-type',"text/plain");
    }
}
