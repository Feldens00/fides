// funcao para as mascaras dos inputs

 jQuery(function($){
      $("#fone").mask("(99) 99999-9999");
       $("#cep").mask("99999-999");
       $("#money").mask("99,99");
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

$(document).ready( function() {
    
   $('.selectEventDel').click(function(){

      id_team = $(this).data('id');
      $('#selectEventDel').modal('show');

            document.getElementById('idTeam').value = id_team;

            $.getJSON( path + '/teamController/getEventTeam/' + id_team, function (data){
            //  console.log(data);
            var option = new Array();
  
                    $("#events").empty();
                    $('#events').html('<option value="">Selecione um evento</option>');             
                    $.each(data, function(i, obj){

                      option[i] = document.createElement('option');
                       if (obj.id == 0) {
                          $("#events").empty();
                          $('#events').html('<option value="">Adicione esta equipe a um evento</option>');

                      }else{
                        $( option[i] ).attr( {value : obj.id} );
                        $( option[i] ).append( obj.nome );
                        
                        $("select[name='events']").append( option[i] );
                      }
                     
                      

                  
                    });
             });
    });
});

$(document).ready( function() {
    
   $('.selectEventAdd').click(function(){

      id_team = $(this).data('id');
      $('#selectEventAdd').modal('show');

            document.getElementById('idTeam1').value = id_team;

            $.getJSON( path + '/teamController/getEventTeam/' + id_team, function (data){
            //  console.log(data);
            var option = new Array();
                    $("#events1").empty();
                    $('#events1').html('<option value="">Selecione um evento</option>');
                    $.each(data, function(i, obj){

                        option[i] = document.createElement('option');
                        
                      if (obj.id == 0) {
                        $("#events1").empty();
                        $('#events1').html('<option value="">Adicione esta equipe a um evento</option>');

                      }else{
                        $( option[i] ).attr( {value : obj.id} );
                        $( option[i] ).append( obj.nome );
                       
                        $("select[name='events1']").append( option[i] );
                      }
                     
                      
                  
                    });
             });
    });
});
