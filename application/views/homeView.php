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
             <h2>Entidades</h2> 
          </div>

          <div class="col-sm-1" style="margin: 25px;">
               <a href="<?= site_url('create-entitie-form'); ?>">
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
           <?php foreach($entities as $et) { ?>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                        <div class="col-sm-12 text-center"> 
                                          <h4><?= $et->name_entitie; ?></h4>
                                        </div>
                                </div>
                                <div class="container-fluid">
                                    <hr />
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <a href="<?= base_url('update-entitie-form/'.$et->id_entitie)?>">
                                              <button type="button" class="btn btn-default">
                                                <span class="glyphicon glyphicon-pencil">
                                              </button>
                                            </a>
                                            
                                          <button type="button" class="btn btn-primary delEntitie" data-id="<?php echo $et->id_entitie ?>" >  
                                                <span class="glyphicon glyphicon-trash">
                                          </button>
                                      </div>
                                      <?php 
                           
                                              echo (" <div class='col-xs-12 text-center'><i class='ti-info' onclick='mostrar(".$et->id_entitie.")' ></i></div>");
                                              echo (" <div class='col-sm-12' id='a".$et->id_entitie."' style='display: none; margin-top:5px;'>");
                                              ?>
                                           
                                                <div class="col-sm-12"> 
                                                  <p>Telefone: <?= $et->phone; ?></p>
                                                </div>

                                                <div class="col-sm-12" style="margin-top: 5px;">
                                                  <p>Responsavel: <?= $et->responsible; ?></p>
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





     <div id="deleteEntitie" class="modal fade" >
                <div class="modal-dialog" role="document">
                  <div class="modal-content" >
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
                     
                      <button type="button" id='delete_entitie'  data-dismiss="modal" class="btn btn-primary">Sim</button>
                    
                    
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                  
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

<script type="text/javascript">
 	var idEntitie;
 	 $('.delEntitie').click(function(){
    idEntitie = $(this).data('id');
   	 $('#deleteEntitie').modal('show');
   	});

    $("#delete_entitie").on("click", function(){
      $.ajax({
        url: "<?php echo site_url('entitieController/delete'); ?>",
        type: "POST",
        data: {id_entitie: idEntitie},
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



