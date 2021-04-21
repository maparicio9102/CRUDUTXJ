
@extends('inicio')
@section('contenido')


<script src="{{url('/js/Catalogos/cliente.js')}}"></script>
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
            <div class="mdl-tabs__tab-bar">
                <a href="#tabNewClient" class="mdl-tabs__tab is-active">Nuevo</a>
                <a href="#tabListClient" class="mdl-tabs__tab">Clientes</a>
            </div>
            <div class="mdl-tabs__panel is-active" id="tabNewClient">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--12-col">
                        <div class="full-width panel mdl-shadow--2dp">
                            <div class="full-width panel-tittle bg-primary text-center tittles">
                                Nuevo cliente
						
                            </div>
                            <div class="full-width panel-content">
                                <form >
                                
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--12-col">
                                            <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i>&nbsp; Datos del Cliente</legend>
                                            <br>
                                        </div>                                       
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="txt_Nombre">
                                                <label class="mdl-textfield__label" id="txt_Nombre" for="txt_Nombre">Nombre</label>
                                                <span class="mdl-textfield__error">Nombre Ivalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="txt_apPaterno">
                                                <label class="mdl-textfield__label" id="txt_apPaterno" for="txt_apPaterno">Apellido Paterno</label>
                                                <span class="mdl-textfield__error">Apellido Invalido</span>
                                            </div>
                                        </div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="txt_apMaterno">
                                                <label class="mdl-textfield__label" id="txt_apMaterno" for="txt_apMaterno">Apellido Materno</label>
                                                <span class="mdl-textfield__error">Apellido Invalido</span>
                                            </div>
                                        </div>

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                
                                            </div>
                                        </div>
										
                                       
                                    </div>
                                    <p class="text-center">
                                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" onclick="altaCliente();"  id="btn-addClient">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                        <div class="mdl-tooltip" for="btn-addClient">Agregar Cliente</div>
                                    </p>

                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdl-tabs__panel" id="tabListClient">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                        <div class="full-width panel mdl-shadow--2dp">
                            <div class="full-width panel-tittle bg-success text-center tittles">
                                Lista de Clientes
						
                            </div>
                            <div class="full-width panel-content">
                                <form action="#">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                                        <label class="mdl-button mdl-js-button mdl-button--icon" for="searchClient">
                                            <i class="zmdi zmdi-search"></i>
                                        </label>
                                        <div class="mdl-textfield__expandable-holder">
                                            <input class="mdl-textfield__input" type="text" id="searchClient">
                                            <label class="mdl-textfield__label"></label>
                                        </div>
                                    </div>
                                </form>
                                <div class="mdl-list" id="div_listaClientes">
                                       <!--  @foreach($Clientes as $cliente)
                                        
                                            <div class="mdl-list__item mdl-list__item--two-line">
                                                <span class="mdl-list__item-primary-content">
                                                    <i class="zmdi zmdi-account mdl-list__item-avatar"></i>
                                                    <span>{{$cliente -> cliente_id}} .- {{$cliente -> nombre}} {{$cliente -> primer_apellido}} {{$cliente -> segundo_apellido}}  </span>
                                                </span>
                                                
                                                <svg xmlns="http://www.w3.org/2000/svg"   width="16" height="16" fill="currentColor" onclick="return eliminaCliente(this);" id="{{$cliente -> cliente_id}}" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            </div>
                                           
                                       
                                        @endforeach -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


@endsection