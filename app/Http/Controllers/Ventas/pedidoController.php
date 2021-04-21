<?php

namespace App\Http\Controllers\Ventas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class pedidoController extends Controller
{
    public function pedido(){
        try {
            return view('Ventas.pedido');
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::debug($e->getMessage());
        }
    }


    public function addPedido(Request $request){
        try {
            $fecha_pedido = $request->input('fecha_pedido');
            $estado_pedido = $request->input('estado_pedido');
            $fecha_envio = $request->input('fecha_envio');
            $cliente_id = $request->input('cliente_id');
            $vendedor_id = $request->input('vendedor_id');
            
            $pedido = DB::select(
                "CALL spI_Pedidos (?,?,?,?,?)",
                array($fecha_pedido, $estado_pedido, $fecha_envio,  $cliente_id, $vendedor_id)
            );

            return $pedido;
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::debug($e->getMessage());
        }
    }

    public function addPedidoDetalle(Request $request){
        try {
            $pedido_id = $request->input('pedido_id');
            $producto_id = $request->input('producto_id');
            $Detalle = DB::select(
                "CALL spI_detalle (?,?)",
                array($pedido_id, $producto_id)
            );

            return $Detalle;
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::debug($e->getMessage());
        }
    }
    
}
