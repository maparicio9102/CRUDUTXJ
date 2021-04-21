<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Catalogos\clientesController;
use App\Http\Controllers\Catalogos\vendedorController;
use App\Http\Controllers\Catalogos\productoController;
use App\Http\Controllers\Ventas\pedidoController;
use App\Http\Controllers\Ventas\listaPedidosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', [clientesController::class, 'home']); 
Route::get('/', function () {
    return view('inicio');
});

Route::get('/cliente', [clientesController::class, 'cliente']); 
Route::post('/consultacliente', [clientesController::class, 'consultaClientes']); 
Route::post('/altaCliente', [clientesController::class, 'addCliente']); 
Route::post('/eliminaCliente', [clientesController::class, 'dellCliente']); 

Route::get('/vendedor', [vendedorController::class, 'vendedor']);
Route::post('/altaVendedor', [vendedorController::class, 'addVendedor']); 
Route::post('/consultaVendedor', [vendedorController::class, 'consultaVendedor']); 
Route::post('/eliminaVendedor', [vendedorController::class, 'dellVendedor']); 

Route::get('/producto', [productoController::class, 'producto']); 
Route::post('/altaProducto', [productoController::class, 'addProducto']); 
Route::post('/consultaProducto', [productoController::class, 'consultaProducto']); 
Route::post('/eliminaProducto', [productoController::class, 'dellProducto']); 


Route::get('/pedido', [pedidoController::class, 'pedido']); 
Route::post('/altaPedido', [pedidoController::class, 'addPedido']); 
Route::post('/altaPedidoDetalle', [pedidoController::class, 'addPedidoDetalle']); 



Route::get('/listaPedido', [listaPedidosController::class, 'listaPedido']); 

