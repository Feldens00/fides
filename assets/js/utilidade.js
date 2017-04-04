// funcao para as mascaras dos inputs
$(document).ready( function() {
 jQuery(function($){
      $("#fone").mask("(99) 99999-9999");
       $("#cep").mask("99999-999");
    });
  });

// funcao para retornar as cidades conforme o combo dos estados

$(function(){

  
  $("select[name=estado]").change(function(){

    estado = $(this).val();
    
    if ( estado === '')
      return false;
    
    resetaCombo('cidade');
      
    $.getJSON( path + '/eventController/getCidades/' + estado, function (data){
  
      //  console.log(data);
      var option = new Array();
    
      $.each(data, function(i, obj){

          option[i] = document.createElement('option');
          $( option[i] ).attr( {value : obj.id} );
        $( option[i] ).append( obj.nome );

          $("select[name='cidade']").append( option[i] );
    
      });
  
    });
  
  });

});

function resetaCombo( el ) {
   $("select[name='"+el+"']").empty();
   var option = document.createElement('option');                                  
   $( option ).attr( {value : ''} );
   $( option ).append( 'Escolha' );
   $("select[name='"+el+"']").append( option );
}