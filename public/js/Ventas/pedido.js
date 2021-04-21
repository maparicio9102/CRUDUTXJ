window.onload = function () {
    ConsultaCliente();
    ConsultaVendedor();
    ConsultaProducto();
};

function ConsultaCliente() {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        dataType: "json",
        url: "consultacliente", //'{{ route("registra") }}',
        data: {
            _token: $("input[name=_token]").val(),
        },
        beforeSend: function () {},
        complete: function () {},
        success: function (response) {
            console.log("OK!");
            llenaClintes(response);
        },
        error: function (jqXHR, xhr) {
            console.log(xhr.responseText);
        },
    });

    return true;
}

function llenaClintes(obj) {
    let datos = "";

    let opcionDefault =
        '<option value="-1" disabled="" selected="">Cliente</option>';
    let opcionnes = '<option value="$">#</option>';

    $.each(obj, function (i, item) {
        let nombre =
            item.cliente_id +
            ".-" +
            item.nombre +
            " " +
            item.primer_apellido +
            " " +
            item.segundo_apellido;
        datos += opcionnes.replace("#", nombre).replace("$", item.cliente_id);
    });
    let tabla = $("[id$=ddl_Cliente]")[0];
    tabla.innerHTML = opcionDefault + datos;
}

function ConsultaVendedor() {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        dataType: "json",
        url: "consultaVendedor", //'{{ route("registra") }}',
        data: {
            _token: $("input[name=_token]").val(),
        },
        beforeSend: function () {},
        complete: function () {},
        success: function (response) {
            console.log("OK!");
            llenaVendedores(response);
        },
        error: function (jqXHR, xhr) {
            console.log(xhr.responseText);
        },
    });

    return true;
}

function llenaVendedores(obj) {
    let datos = "";

    let opcionDefault =
        '<option value="-1" disabled="" selected="">Vendedor</option>';
    let opcionnes = '<option value="$">#</option>';

    $.each(obj, function (i, item) {
        let nombre =
            item.vendedor_id +
            ".-" +
            item.nombre +
            " " +
            item.primer_apellido +
            " " +
            item.segundo_apellido;
        datos += opcionnes.replace("#", nombre).replace("$", item.vendedor_id);
    });
    let tabla = $("[id$=ddl_Vendedor]")[0];
    tabla.innerHTML = opcionDefault + datos;
}

function ConsultaProducto() {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        dataType: "json",
        url: "consultaProducto", //'{{ route("registra") }}',
        data: {
            _token: $("input[name=_token]").val(),
        },
        beforeSend: function () {},
        complete: function () {},
        success: function (response) {
            console.log("OK!");
            llenaProducto(response);
        },
        error: function (jqXHR, xhr) {
            console.log(xhr.responseText);
        },
    });

    return true;
}

function llenaProducto(obj) {
    let datos = "";

    let opcionDefault =
        '<option value="-1" disabled="" selected="">Producto</option>';
    let opcionnes = '<option value="$">#</option>';

    $.each(obj, function (i, item) {
        let nombre = item.productos_id + ".-" + item.nombre_producto;
        datos += opcionnes.replace("#", nombre).replace("$", item.productos_id);
    });
    let tabla = $("[id$=ddl_Producto]")[0];
    tabla.innerHTML = opcionDefault + datos;
}

function addProductoDetalle() {
    let txt_FechaPedido = document.getElementById("txt_FechaPedido").value;
    let ddl_estPeido = $('select[id="ddl_estPeido"] option:selected').text();
    let txt_FechaEnvio = document.getElementById("txt_FechaEnvio").value;
    let ddl_Cliente = $('select[id="ddl_Cliente"] option:selected').text();
    let ddl_Vendedor = $('select[id="ddl_Vendedor"] option:selected').text();
    let ddl_Producto = $('select[id="ddl_Producto"] option:selected').text();
    let ddl_ProductoID = $('select[id="ddl_Producto"] option:selected').val();

    var aleatorio = Math.floor(Math.random() * (6000 + 1));

    let hiidde_producto =
        "<input id='hid_producto'  name='hid_producto'  type='hidden' value=" +
        ddl_ProductoID +
        "></input>";
    let tablaAdd =
        "<tr>" +
        '<th scope="row">' +
        txt_FechaPedido +
        "</th>" +
        "<td> " +
        ddl_Cliente +
        " </td>" +
        "<td>" +
        ddl_Vendedor +
        "</td>" +
        "<td>" +
        ddl_Producto +
        "</td>" +
        '<th scope="row">' +
        txt_FechaEnvio +
        "</th>" +
        '<td> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" onclick="dellProductoDetalle(this);" id="' +
        aleatorio +
        '" class="bi bi-trash" viewBox="0 0 16 16">' +
        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />' +
        '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />' +
        "</svg>" +
        hiidde_producto +
        "</td>" +
        "</tr>";

    let tabla = $("[id$=tbody_detalle]")[0];
    let tablaContenido = tabla.innerHTML;
    tabla.innerHTML = tablaContenido + tablaAdd;
}

function dellProductoDetalle(obj) {
    console.log(obj);
    let = obj2 = $("[id$=" + obj.id + "]");

    obj2.parent().parent().remove();
}

function altaPedido() {
    let txt_FechaPedido = document.getElementById("txt_FechaPedido").value;
    let ddl_estPeido = $('select[id="ddl_estPeido"] option:selected').text();
    let txt_FechaEnvio = document.getElementById("txt_FechaEnvio").value;
    let ddl_Cliente = $('select[id="ddl_Cliente"] option:selected').val();
    let ddl_Vendedor = $('select[id="ddl_Vendedor"] option:selected').val();
    let ddl_Producto = $('select[id="ddl_Producto"] option:selected').text();

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        dataType: "json",
        url: "altaPedido", //'{{ route("registra") }}',
        data: {
            _token: $("input[name=_token]").val(),
            fecha_pedido: txt_FechaPedido,
            estado_pedido: ddl_estPeido,
            fecha_envio: txt_FechaEnvio,
            cliente_id: ddl_Cliente,
            vendedor_id: ddl_Vendedor,
        },
        beforeSend: function () {},
        complete: function () {},
        success: function (response) {
            console.log("OK!");
            altaPedidoDetalle(response);
        },
        error: function (jqXHR, xhr) {
            console.log("boo!");
            console.log(xhr.responseText);
        },
    });

    return true;
}

function altaPedidoDetalle(obj) {
    let pedido_id = obj[0].pedidos_id;   

    $("[id$=tbody_detalle] tr").each(function () {
        let hid_producto = $(this).find("input[name=hid_producto]").val();

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            dataType: "json",
            url: "altaPedidoDetalle", //'{{ route("registra") }}',
            data: {
                _token: $("input[name=_token]").val(),
                pedido_id: pedido_id,
                producto_id: hid_producto
              
            },
            beforeSend: function () {},
            complete: function () {},
            success: function (response) {
                console.log("OK!");
            },
            error: function (jqXHR, xhr) {
                console.log("boo!");
                console.log(xhr.responseText);
            },
        });
    });

    return true;
}

