<?php

namespace App\Http\Controllers\Catalogos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class clientesController extends Controller
{
    public function home(){
        try {
            return view('inicio');
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::debug($e->getMessage());
        }
    }


    public function cliente(){
        try {
            $Clientes = $this->consultaClientes();
            return view('Catalogos.cliente', compact("Clientes"));
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::debug($e->getMessage());
        }
    }

    public function consultaClientes(){
        try {
            $clientes = DB::select("call sPS_Clientes()");
            return $clientes;
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::debug($e->getMessage());
        }
   }


    public function addCliente(Request $request){
        try {
            $Nombre = $request->input('Nombre');
            $AppPaterno = $request->input('AppPaterno');
            $ApMaterno = $request->input('ApMaterno');

            $cliente = DB::select(
                "CALL sPI_Clientes (?,?,?)",
                array($Nombre, $AppPaterno, $ApMaterno)
            );

            return $cliente;
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::debug($e->getMessage());
        }
    }

   public function dellCliente(Request $request){
    try {
        $ID = $request->input('Id');
        $cliente = DB::select(
            "CALL sPD_Clientes (?)",
            array($ID)
        );
       
        return $cliente;
    } catch (\Exception $e) {
        echo $e->getMessage();
        Log::debug($e->getMessage());
    }
}


}


