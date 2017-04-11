
<script type="text/javascript"> 

//função do toggle 
function mostrar(id){
 
    
        $("#a"+id).toggle();
    
}

</script>

  <div class="row">
    <div class="col-sm-10 text-center div-barra">

        <div class="col-md-11" >
           <h2><font color="#d9d9d9">Eventos</font></h2> 
        </div>

        <div class="col-md-1">
             <a href="<?= site_url('create-event-form'); ?>"><span class="glyphicon glyphicon-plus"></a>
        </div>

    </div>
      <div class="col-sm-12" style="margin-top:50px;">
        <?php foreach($events as $ev) { ?>
            <div id=divEntities class="col-sm-3 div-mold"> 

               
                <div class="col-sm-12">
                  <h2><font color="#d9d9d9"><?= $ev->name_event; ?></font></h2>
                </div>

                  <div class="col-sm-6">
                      <a href="<?= base_url('update-event-form/'.$ev->id_event)?>">
                          <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-pencil">
                          </button>
                      </a>

                      <button type="button" class="btn btn-primary delEvent" data-id="<?php echo $ev->id_event; ?>" >  
                        <span class="glyphicon glyphicon-trash">
                      </button>  
                  </div>
                  
                  <div align="right" class="col-sm-2 col-sm-offset-2">
                    <a  class href="<?= base_url('form-event-team/'.$ev->id_event)?>">
                       <i class="material-icons">group_add</i>
                    </a>
                  </div>  
                  <div align="right" class="col-sm-2">
                    <a  class href="<?= base_url('form-event-people/'.$ev->id_event)?>">
                       <i class="material-icons">person_add</i>
                    </a>
                  </div>  


                   <?php 
 
                    echo (" <div class='col-sm-12 text-center'><i class='material-icons'  id='b".$ev->id_event."'  onclick='mostrar(".$ev->id_event.")' >keyboard_arrow_down</i></div>");
                    echo (" <div class='col-sm-12 text-center' id='a".$ev->id_event."' style='display: none; margin-top:5px;'>");
                    ?>
                 
                        <div class="col-sm-6 text-center">
                           <a  href="<?= base_url('event-team/'.$ev->id_event)?>"> <i class="material-icons">group</i> Visualizar Equipes</a>
                        </div>

                        <div class="col-sm-6 text-center">
                           <a  href="<?= base_url('event-people/'.$ev->id_event)?>"> <i class="material-icons">person</i> Visualizar Pessoas</a>
                        </div>

                        <div style="margin-top:10px;" class="col-sm-6 text-center">
                           <a  href="<?= base_url('form-event-schedule/'.$ev->id_event)?>"> <i class="material-icons">schedule</i> Cronograma</a>
                        </div>

                         
                   
                  <?php echo('</div>'); ?>
            </div>
        <?php } ?>  
      </div>
      
   </div>



     <div id="deleteEvent" class="modal fade">
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
                     
                      <button type="button" id='delete_event'  data-dismiss="modal" class="btn btn-primary">Sim</button>
                    
                    
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                  
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
<script type="text/javascript">
  var idEvent;
   $('.delEvent').click(function(){
    idEvent = $(this).data('id');
     $('#deleteEvent').modal('show');
    });

    $("#delete_event").on("click", function(){
      $.ajax({
        url: "<?php echo site_url('/eventController/delete'); ?>",
        type: "POST",
        data: {id_event: idEvent},
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
