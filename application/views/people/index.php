<script type="text/javascript"> 

//função do toggle 
function mostrar(id){
 
    
        $("#a"+id).toggle();
    
}

</script>
<div class="row">
  <div class="container-fluid text-center">
      <div class="card">
          <div class="row">
            <div class="col-sm-12">
              <div class="col-sm-4 col-sm-offset-4" >
             <h2>Pessoas</h2> 
          </div>

          <div class="col-sm-1" style="margin: 25px;">
               <a href="<?= site_url('create-people-form'); ?>">
                <button type="button" class=" btn btn-primary">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
               </a>
          </div>
            </div>
          </div> 
      </div>  
    </div>

        <div class="container-fluid">
         <div class="row">
           <?php foreach($peoples as $pp) { ?>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <h4><?= $pp->name_people; ?></h4>
                                        </div>
                                </div>
                                <div class="container-fluid">
                                    <hr /> 
                                      <div class="row" >
                                        <div class="col-xs-12"  style="margin-bottom: 5px;">
                                               
                                                <a href="<?= base_url('update-people-form/'.$pp->id_people)?>">
                                                    <button type="button" class="btn btn-default">
                                                          <span class="glyphicon glyphicon-pencil"></span>
                                                    </button>
                                                </a>
                                             
                                                <button type="button" class="btn btn-primary delEvent" data-id="<?php echo $pp->id_people; ?>" >  
                                                  <span class="glyphicon glyphicon-trash">
                                                </button>  
                                            </div>
                                           
                                      
                                          <?php 
                     
                                        echo (" <div class='col-xs-12 text-center'><i class='ti-info'   onclick='mostrar(".$pp->id_people.")' ></i></div>");
                                        echo (" <div class='col-sm-12' id='a".$pp->id_people."' style='display: none; margin-top:5px;'>");
                                        ?>
                                     
                                            <div class="col-sm-12">
                                              <p><font size="2">Nascimento: <?= $pp->birth; ?></font></p>
                                            </div>

                                            <div class="col-sm-12">
                                              <p><font size="2">CEP: <?= $pp->cep; ?></font></p>
                                            </div>
                                             

                                            <div class="col-sm-12">
                                              <p><font size="2">Telefone: <?= $pp->phone; ?></font></p>
                                            </div>

                                            <div class="col-sm-12">
                                              <p><font size="2"> Bairro: <?= $pp->neighborhood; ?> / Endereço: <?= $pp->adress; ?></font></p>
                                            </div>

                                            <div class="col-sm-12">
                                              <p><font size="2">Cidade: <?= $pp->name_city; ?> / <?= $pp->name_state; ?></font></p>
                                            </div>
                                        <?php echo('</div>'); ?>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
        
   </div>




     <div id="deletePeople" class="modal fade">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">Apagar</h4>
                    </div>
                    <div class="modal-body">
                      <p><strong>Realmente deseja apagar o cadastro?</strong></p>
                    </div>
                    <div class="modal-footer">
                     
                      <button type="button" id='delete_people'  data-dismiss="modal" class="btn btn-primary">Sim</button>
                    
                    
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                  
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
<script type="text/javascript">
  var idPeople;
   $('.delPeople').click(function(){
    idPeople = $(this).data('id');
     $('#deletePeople').modal('show');
    });

    $("#delete_people").on("click", function(){
      $.ajax({
        url: "<?php echo site_url('/peopleController/delete'); ?>",
        type: "POST",
        data: {id_people: idPeople},
        success: function(data){
          window.location.reload();
          if(!data){
           console.log(data);
           
           
          }else{
            console.log(data);

          }
        },
        error: function(data){
          console.log(data);
         
        }
      });
    }); 

   
</script>
