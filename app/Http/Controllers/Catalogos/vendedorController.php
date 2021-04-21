<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class vendedorController extends Controller
{
    public function vendedor()    {
        return view('Catalogos.vendedor');
        
    }

    
    public function addVendedor(Request $request){
        $Nombre = $request->input('Nombre');
        $AppPaterno = $request->input('AppPaterno');
        $ApMaterno = $request->input('ApMaterno');

        $cliente = DB::select(
            "CALL spI_Vendedores (?,?,?)",
            array($Nombre, $AppPaterno, $ApMaterno)
        );

        return $cliente;
    }


    public function consultaVendedor(){
        try {
            $clientes = DB::select("call spS_Vendedor()");
            return $clientes;
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::debug($e->getMessage());
        }
   }
   public function dellVendedor(Request $request){
        try {
            $ID = $request->input('Id');
            $cliente = DB::select(
                "CALL spD_Vendedor (?)",
                array($ID)
            );
        
            return $cliente;
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::debug($e->getMessage());
        }
    }

}



