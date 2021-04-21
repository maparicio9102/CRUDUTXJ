@extends('inicio')
@section('contenido')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="{{url('/js/Ventas/pedido.js')}}"></script>
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
    <!-- <div class="mdl-tabs__tab-bar">
        <a href="#tabNewProduct" class="mdl-tabs__tab is-active">Nuevo</a>
        
    </div> -->
    <div class="mdl-tabs__panel is-active" id="tabNewProduct">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col">
                <div class="full-width panel mdl-shadow--2dp">
                    <div class="full-width panel-tittle bg-primary text-center tittles">
                        Nuevo Pedido

                    </div>
                    <div class="full-width panel-content">
                        <form>
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--12-col">
                                    <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i>&nbsp; Información General</legend>
                                    <br>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <label class="">Fecha de Pedido</label>

                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input type="date" class="mdl-textfield__input" id="txt_FechaPedido">
                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--12-col">
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <select class="mdl-textfield__input" id="ddl_estPeido">
                                            <option value="" disabled="" selected="">Estado de pedido</option>
                                            <option value="">Pendiente de envio</option>
                                            <option value="">Enviado</option>
                                            <option value="">Cancelado</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <label class="">Fecha de Envio</label>
                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input type="date" class="mdl-textfield__input" id="txt_FechaEnvio">
                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <select class="mdl-textfield__input" id="ddl_Cliente">                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <select class="mdl-textfield__input"  id="ddl_Vendedor">
                                        </select>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--12-col">
                                    <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i>&nbsp; Detalle</legend>
                                    <br>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <select class="mdl-textfield__input" id="ddl_Producto" >                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="addProductoDetalle(); return false;">Agregar</button>
                                </div>

                                <div class="mdl-cell mdl-cell--12-col">
                                    <div class="mdl-textfield mdl-js-textfield">

                                        <table class="table">
                                            <caption>Detalle del pedido</caption>
                                            <thead>
                                                <tr>
                                                    <th scope="col">Fecha Pedido</th>
                                                    <th scope="col">Cliente</th>
                                                    <th scope="col">Vendedor</th>
                                                    <th scope="col">Producto</th>
                                                    <th scope="col">Fecha Envio</th>
                                                    <th scope="col">#</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_detalle">
                                               <!--  <tr>
                                                    <th scope="row">20/04/2021</th>
                                                    <td>Migue</td>
                                                    <td>Alejandro</td>
                                                    <td>Jabon</td>
                                                    <th scope="row">20/04/2021</th>
                                                    <td> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" onclick="return eliminaCliente(this);" id="" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                    </td>
                                                </tr> -->

                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="altaPedido();">  Alta  </button>
                        </form>

                        
                        <!-- <button type="button" class="btn btn-secondary">Consulta</button>
                        <button type="button" class="btn btn-success">Success</button>
                        <button type="button" class="btn btn-danger">Eliminar</button> -->
                       
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>



@endsection