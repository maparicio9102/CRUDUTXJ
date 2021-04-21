<?php

namespace App\Http\Controllers\Ventas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class listaPedidosController extends Controller
{
      
    public function listaPedido(){
        try {
            $pedidos = $this->consultaPedidos();
            return view('Ventas.listaPedidos', compact("pedidos"));
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::debug($e->getMessage());
        }
    }

    
    public function consultaPedidos(){
        try {
            $pedidos = DB::select("call spS_Pedidos()");
            return $pedidos;
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::debug($e->getMessage());
        }
   }


    
}
