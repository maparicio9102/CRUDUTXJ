window.onload=function() {
    ConsultaVendedor(); 
    
}



function altaVendedor(){
    let txtNombre = document.getElementById("txt_Nombre").value; 
    let txtAppPaterno = document.getElementById("txt_apPaterno").value; 
    let txtApMaterno = document.getElementById("txt_apMaterno").value; 

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'post',
            dataType: 'json',
            url: "altaVendedor", //'{{ route("registra") }}',
            data: {
                '_token': $('input[name=_token]').val(),
                'Nombre' : txtNombre  ,
                'AppPaterno': txtAppPaterno,
                'ApMaterno' : txtApMaterno 
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
function ConsultaVendedor(){    
  
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'post',
        dataType: 'json',
        url: "consultaVendedor", //'{{ route("registra") }}',
        data: {
            '_token': $('input[name=_token]').val()
        },
        beforeSend: function () {
            
        },
        complete: function () {
           
        },
        success: function (response) {
            console.log('OK!');           
            llenaVendedores(response);
        },
        error: function (jqXHR, xhr) {           
            console.log(xhr.responseText);
        }
    }); 
   
return true;
}


function llenaVendedores(obj){
let datos=""
let div_Lista =
   '<div class="mdl-list__item mdl-list__item--two-line">' +
        '<span class="mdl-list__item-primary-content">'+
        '<i class="zmdi zmdi-account mdl-list__item-avatar"></i>'+
            '<span> # </span>'+
        '</span>'+        
        '<svg xmlns="http://www.w3.org/2000/svg"   width="16" height="16" fill="currentColor" onclick="return eliminaVendedor(this);" id="$" class="bi bi-trash" viewBox="0 0 16 16">'+
            '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
            '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
        '</svg>'+
    '</div>';


    $.each(obj, function(i, item) {
        let nombre = item.vendedor_id + '.-' +  item.nombre + ' ' + item.primer_apellido+ ' ' + item.segundo_apellido;
        datos += div_Lista.replace("#", nombre ).replace("$",item.vendedor_id);
 
    });
    let tabla = $('[id$=div_listaVendedores]')[0];
    tabla.innerHTML = datos;
}


function eliminaVendedor(obj){    
    console.log( obj.id)
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'post',
        dataType: 'json',
        url: "eliminaVendedor", //'{{ route("registra") }}',
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
            llenaVendedores(response);
        },
        error: function (jqXHR, xhr) {
            console.log('boo!');
            console.log(xhr.responseText);
        }
    }); 
   
       
}

