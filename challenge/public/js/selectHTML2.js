
$(function(){

    $('#select-empresa2').on('change', onSelectEmpresaChange);


});

function onSelectEmpresaChange(){
    var empresa_id = $(this).val();


    if(!empresa_id){
              $('#select-sucursal2').html('<option value="">Seleccione sucursal</option>');
              return;
    }
 

    //ajax
    $.get('/api/empresa/'+ empresa_id +'/sucursales',function(data){
   var html_select = '<option value="">Seleccione sucursal</option>';
        for(var i=0; i<data.length; ++i)
       html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>' 
       
    
        $('#select-sucursal2').html(html_select);
            
    

       $('#select-sucursal2').on('change', onbuscarID);
    });

   

   
}

function onbuscarID(){
    var sucursal_id = $(this).val();

    document.getElementById("oculto").value=sucursal_id;

}
