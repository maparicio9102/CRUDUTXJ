<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class productoController extends Controller
{
    public function producto()    {        
            return view('Catalogos.producto');
        
    }
    public function addProducto(Request $request){
        try {
            $Nombre = $request->input('nombre');
            $tipoProducto = $request->input('tipoProducto');
            

            $producto = DB::select(
                "CALL spI_Productos (?,?)",
                array($Nombre, $tipoProducto)
            );

            return $producto;
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::debug($e->getMessage());
        }
    }

    
    public function consultaProducto(){
        try {
            $Productos = DB::select("call spS_Productos()");
            return $Productos;
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::debug($e->getMessage());
        }
   }

   public function dellProducto(Request $request){
    try {
        $ID = $request->input('Id');
        $Producto = DB::select(
            "CALL spD_Producto (?)",
            array($ID)
        );
       
        return $Producto;
    } catch (\Exception $e) {
        echo $e->getMessage();
        Log::debug($e->getMessage());
    }
}

}
