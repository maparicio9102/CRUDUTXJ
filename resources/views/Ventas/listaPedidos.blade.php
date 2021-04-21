@extends('inicio')
@section('contenido')


<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
        <div class="table-responsive">
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Folio Pedido</th>
                        <th class="mdl-data-table__cell--non-numeric">Fecha Pedido</th>
                        <th>Estado de Pedido </th>
                        <th class="mdl-data-table__cell--non-numeric">Fecha Envio</th>
                        <th>Cleinte</th>
                        <th>Vendedor</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($pedidos as $pedido)

                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">{{$pedido -> pedidos_id}}</td>
                        <td class="mdl-data-table__cell--non-numeric">{{$pedido -> fecha_pedido}}</td>
                        <td>{{$pedido -> estado_pedido}}</td>
                        <td class="mdl-data-table__cell--non-numeric">{{$pedido -> fecha_envio}}</td>
                        <td>{{$pedido -> cliente}}</td>
                        <td>{{$pedido -> vendedor}}</td>
                    </tr>
                  
                    @endforeach

                    
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection