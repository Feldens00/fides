
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
             <h2>Equipes</h2> 
          </div>

          <div class="col-sm-1" style="margin: 25px;">
               <a href="<?= site_url('create-team-form'); ?>">
                <button type="button" class=" btn btn-primary">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
               </a>
          </div>
            </div>
          </div> 
      </div>  
    </div>

  <?php 

   if ($formerror) {
      echo ("<div class='row'><div class='wow bounceInUp col-sm-6 col-sm-offset-3 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!   </strong>".$formerror."</div></div>");
    }

  ?> 
    <div class="container-fluid">
         <div class="row">
           <?php foreach($teams as $tm) { ?>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                        <div class="col-sm-12 text-center"> 
                                          <h4><?= $tm->name_team; ?></h4>
                                        </div>
                                </div>
                                <div class="container-fluid">
                                    <hr />
                                      <div class="row">
                                          <div class="col-xs-12">
                                                <div class="col-xs-10">
                                                  <a href="<?= base_url('update-team-form/'.$tm->id_team)?>">
                                                      <button type="button" class="btn btn-default">
                                                            <span class="glyphicon glyphicon-pencil">
                                                      </button>
                                                  </a>

                                                  <button type="button" class="btn btn-primary delTeam" data-id="<?php echo $tm->id_team; ?>" >  
                                                    <span class="glyphicon glyphicon-trash">
                                                  </button>  
                                                </div>
                                                <div class="col-xs-2">
                                                  <a  href="#" class='selectEventAdd'  data-id="<?php echo $tm->id_team; ?>">
                                                     <i class="ti-user">+</i>
                                                  </a>
                                                </div>
                                          </div> 
                                           
                                             <?php 
                           
                                              echo (" <div class='col-xs-12 text-center'><i class='ti-angle-down' onclick='mostrar(".$tm->id_team.")' ></i></div>");
                                              echo (" <div class='col-sm-12' id='a".$tm->id_team."' style='display: none; margin-top:5px;'>");
                                              ?>
                                           
                                              <div class="col-sm-12 text-center">
                                                  <a href="#"  class='selectEventDel'  data-id="<?php echo $tm->id_team; ?>" >Visualizar Pessoas</a>
                                              </div>

                                              <div class="col-sm-12" style="margin-top: 5px;">
                                                <p>Descrição: <?= $tm->description; ?></p>
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

    <div id="selectEventDel" class="modal fade">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">Remover ou visualizar pessoas da equipe do evento:</h4>
                    </div>
                    <div class="modal-body">
                    <form action="<?= base_url('team-people');?>" method="POST">
                                 <input type="hidden" class="form-control" id="idTeam" name="idTeam" value="">
                                <div class="form-group">
                                      <h6>*Evento:</h6>
                                      <select name="events" class="form-control border-input" id="events">
                                      </select>
                                </div>

                    </div>
                    <div class="modal-footer">
                     
                      <button type="submit" class="btn btn-primary">Sim</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    </form>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

     <div id="selectEventAdd" class="modal fade">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">Adicionar pessoas a equipe do evento:</h4>
                    </div>
                    <div class="modal-body">
                    <form action="<?= base_url('form-team-people');?>" method="POST">
                       
                                 <input type="hidden" class="form-control" id="idTeam1" name="idTeam1" value="">
                                <div class="form-group">
                                <label>*Evento:</label>
                                  <select name="events1" id="events1" class="form-control border-input">
                                  </select>
                                </div>
                        
                    </div>
                    <div class="modal-footer">
                     
                      <button type="submit" class="btn btn-primary">Sim</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    </form>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

         

     <div id="deleteTeam" class="modal fade">
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
                     
                      <button type="button" id='delete_team'  data-dismiss="modal" class="btn btn-primary">Sim</button>
                    
                    
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                  
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->


<script type="text/javascript">
  var idTeam;
   $('.delTeam').click(function(){
    idTeam = $(this).data('id');
     $('#deleteTeam').modal('show');
    });

    $("#delete_team").on("click", function(){
      $.ajax({
        url: "<?php echo site_url('/teamController/delete'); ?>",
        type: "POST",
        data: {id_team: idTeam},
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
