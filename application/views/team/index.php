
<script type="text/javascript"> 

//função do toggle 
function mostrar(id){
 
    
        $("#a"+id).toggle();
    
}

</script>

  <div class="row">
    <div class="col-sm-10 text-center div-barra">



        <div class="col-md-11" >
           <h2><font color="#d9d9d9">Equipes</font></h2> 
        </div>

        <div class="col-md-1">
             <a href="<?= site_url('create-team-form'); ?>"><span class="glyphicon glyphicon-plus"></a>
        </div>

    </div>
      <div class="col-sm-12" style="margin-top:50px;">
       <?php foreach($teams as $tm) { ?>
            <div  class="col-md-3 div-mold"> 
              
               <div class="col-sm-12">
                  <h2><font color="#d9d9d9"><?= $tm->name_team; ?></font></h2>
                </div>

               <!-- <div class="col-sm-12" style="margin-bottom: 10px;">
                  <font color="#d9d9d9">Evento:<i> <?= $tm->name_event;?> </i></font>
                </div>-->

                  <div class="col-sm-6">
                      <a href="<?= base_url('update-team-form/'.$tm->id_team)?>">
                          <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-pencil">
                          </button>
                      </a>

                      <button type="button" class="btn btn-primary delTeam" data-id="<?php echo $tm->id_team; ?>" >  
                        <span class="glyphicon glyphicon-trash">
                      </button>  
                  </div>
                  
                  <div align="right" class="col-sm-2 col-sm-offset-4">
                    <a  class href="<?= base_url('form-team-people/'.$tm->id_team)?>">
                       <i class="material-icons">person_add</i>
                    </a>

                  </div>  
                   <?php 
 
                    echo (" <div class='col-sm-12 text-center'><i class='material-icons' onclick='mostrar(".$tm->id_team.")' >keyboard_arrow_down</i></div>");
                    echo (" <div class='col-sm-12 text-center' id='a".$tm->id_team."' style='display: none; margin-top:5px;'>");
                    ?>
                 
                     <div class="col-sm-12 text-center">
                        <a href="<?= base_url('team-people/'.$tm->id_team)?>">Visualizar Pessoas e Eventos</a>
                      </div>


                   

                  <?php echo('</div>'); ?>
            </div>
        <?php } ?>  
      </div>
      
   </div>





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
