window.onload=function() {
    ConsultaProducto(); 
    
}

function altaProducto(){    

    let txt_nombre = document.getElementById("txt_nombre").value; 
    let txt_tipo = document.getElementById("txt_tipo").value; 
    

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'post',
            dataType: 'json',
            url: "altaProducto", //'{{ route("registra") }}',
            data: {
                '_token': $('input[name=_token]').val(),
                'nombre' : txt_nombre,
                'tipoProducto': txt_tipo
            },
            beforeSend: function () {
                
            },
            complete: function () {
               
            },
            success: function (response) {
                console.log('OK!');
               
                
            },
            error: function (jqXHR, xhr) {
                console.log('boo!');
                console.log(xhr.responseText);
            }
        });
       
    return true;
}
function ConsultaProducto(){    
  
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'post',
        dataType: 'json',
        url: "consultaProducto", //'{{ route("registra") }}',
        data: {
            '_token': $('input[name=_token]').val()
        },
        beforeSend: function () {
            
        },
        complete: function () {
           
        },
        success: function (response) {
            console.log('OK!');           
            llenaProducto(response);
        },
        error: function (jqXHR, xhr) {           
            console.log(xhr.responseText);
        }
    }); 
   
return true;
}

function llenaProducto(obj){
let datos=""
let div_Lista =
   '<div class="mdl-list__item mdl-list__item--two-line">' +
        '<span class="mdl-list__item-primary-content">'+
        '<i class="zmdi zmdi-account mdl-list__item-avatar"></i>'+
            '<span> # </span>'+
        '</span>'+        
        '<svg xmlns="http://www.w3.org/2000/svg"   width="16" height="16" fill="currentColor" onclick="return eliminaProducto(this);" id="$" class="bi bi-trash" viewBox="0 0 16 16">'+
            '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
            '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
        '</svg>'+
    '</div>';


    $.each(obj, function(i, item) {
        let nombre = item.productos_id + '.-' +  item.nombre_producto + ' ' + item.tipo_producto;
        datos += div_Lista.replace("#", nombre ).replace("$",item.productos_id);
 
    });
    let tabla = $('[id$=div_listaProductos]')[0];
    tabla.innerHTML = datos;

}

function eliminaProducto(obj){    
    console.log( obj.id)
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'post',
        dataType: 'json',
        url: "eliminaProducto", //'{{ route("registra") }}',
        data: {
            '_token': $('input[name=_token]').val(),
            'Id' : obj.id
        },
        beforeSend: function () {
            
        },
        complete: function () {
           
        },
        success: function (response) {
            console.log('OK!');
            llenaProducto(response);
        },
        error: function (jqXHR, xhr) {
            console.log('boo!');
            console.log(xhr.responseText);
        }
    }); 
   
       
}
