
<script type="text/javascript">
 

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});


function mostrar(id){
 
    
        $("#a"+id).toggle();
    
}
</script>

<?php 

foreach ($events as $ev) {
  $id_event = $ev->id_event;
  $name_event = $ev->name_event; 
}

foreach ($schedule as $sc) {
  $id_schedule = $sc->id_schedule;
}

 if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }


?>
   


  <div class="row">
    <div class="col-sm-10 text-center div-mold" style="padding-bottom: 100px;">

           <div class="col-sm-12 text-center div-barra2">

                  <div class="col-md-11" >
                     <<h2><font color="#d9d9d9"> Atividades do Cronograma do Evento <?= $name_event; ?></font></h2> 
                  </div>

                  <div class="col-md-1" title="Visualize a impressão" data-toggle="tooltip">
                       <a href="<?= base_url('print/'.$id_schedule.'/'.$id_event);?>" ><span class="glyphicon glyphicon-plus"></a>
                  </div>

              </div>
          <div class="col-sm-12" style="margin-top:50px;">
             
                <form action="<?= base_url('delete-schedule-activitie/'.$id_schedule.'/'.$id_event)?>" method="POST">
                  <div class="col-sm-11 col-sm-offset-1"  style="overflow: auto;  height: 350px;">
                  <?php foreach ($acEvents as $ae) { ?> 
                    <div class="col-sm-5 div-mold2">
                          <div class="col-sm-10">
                            <h4><font color="#d9d9d9"><?= $ae->name_activitie;?></font></h4>
                          </div>
                          <div class="col-sm-2">
                            <input type="checkbox" name="selecao[]" value="<?=$ae->id_activitie;?>"/>
                          </div>
                           
                    </div>
                  <?php } ?>
                  </div>
                  <div class="col-sm-12 text-center" style="margin-top:50px;">
                        <button type="submit" class="btn btn-default">Remover<span class="glyphicon glyphicon-floppy-disk"></span></button>
                  </div>
                </form>
          </div> 

    </div>




    <div class="col-sm-10 text-center div-mold">



              <div class="col-sm-12 text-center div-barra2">

                  <div class="col-md-11" >
                     <h2><font color="#d9d9d9">Atividades em nosso banco de dados</font></h2> 
                  </div>

                  <div class="col-md-1" title="Crie uma Atividade" data-toggle="tooltip">
                       <a href="#" title="Hooray!" data-toggle="modal" data-target="#addActivitie"><span class="glyphicon glyphicon-plus"></a>
                  </div>

              </div>


              <div class="col-sm-12" style="margin-top:50px; ">   

                <form action="<?= base_url('create-schedule-activitie/'.$id_schedule.'/'.$id_event)?>" method="POST">
                <div class="col-sm-11 col-sm-offset-1" style="overflow: auto;  height: 350px;">
                  <?php foreach ($activities as $ac) { ?> 
                    
                    <div class="col-sm-5 div-mold2">
                          <div class="col-sm-10">
                            <h4><font color="#d9d9d9"><?= $ac->name_activitie;?></font></h4>
                          </div>
                          <div class="col-sm-2">
                            <input type="checkbox" name="selecao[]" value="<?=$ac->id_activitie;?>"/>
                          </div>


                         <?php 
       
                          echo (" <div class='col-sm-12'><font color='#d9d9d9'><i class='material-icons'  id='b".$ac->id_activitie."'  onclick='mostrar(".$ac->id_activitie.")' >keyboard_arrow_down</i></font></div>");
                          echo (" <div class='col-sm-12' id='a".$ac->id_activitie."' style='display: none; margin-top:5px;'>");
                          ?>
                          
                                <div class="col-sm-12">
                                  <h4><font color="#d9d9d9"><?= $ac->description;?></font></h4>
                                </div>

                                <div class="col-sm-6">
                                      <a href="<?= base_url('update-activitie-form/'.$ac->id_activitie)?>">
                                          <button type="button" class="btn btn-default">
                                                <span class="glyphicon glyphicon-pencil">
                                          </button>
                                      </a>

                                      <button type="button" class="btn btn-primary delActivitie" data-id="<?php echo $ac->id_activitie; ?>" >  
                                        <span class="glyphicon glyphicon-trash">
                                      </button>  
                                </div>

                                <div class="col-sm-4">
                                  <h4><font color="#d9d9d9"><?= $ac->horary;?></font></h4>
                                </div>


                          <?php echo('</div>'); ?>
                    </div>
                    
                  <?php } ?>
                  </div>
                  <div class="col-sm-12 text-center" style="margin-top: 50px;">
                        <button type="submit" class="btn btn-default">Salvar <span class="glyphicon glyphicon-floppy-disk"></span></button>
                  </div>
                </form>
              </div> 

      </div>

   </div>



<div id="addActivitie" class="modal fade">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">Criar uma nova atividade</h4>
                    </div>
                    <div class="modal-body">
                       
                                          
                        <form action="<?= base_url('create-activitie/'.$id_event);?>" method="POST">
                            <div class="form-group">
                              <label for="name">* Nome:</label>
                              <input type="text" class="form-control" name="activitieName" placeholder="Digite o nome da atividade" required>
                            </div>
                            <div class="form-group">
                              <label for="name">Descrição:</label>
                              <textarea class="form-control" name="activitieDescription"></textarea> 
                            </div>
                            
                            <div class="form-group">
                              <label for="date2">*Hora:</label>
                              <input type="time" class="form-control"  name="activitieHorary" required>
                            </div>
                                    
                           
                    </div>
                    <div class="modal-footer">
                     
                            <button type="submit" class="btn btn-default">Enviar</button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                          </form>

                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->



     <div id="deleteActivitie" class="modal fade">
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
                     
                      <button type="button" id='delete_activitie'  data-dismiss="modal" class="btn btn-primary">Sim</button>
                    
                    
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                  
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

<script type="text/javascript">
  var idActivitie;
   $('.delActivitie').click(function(){
    idActivitie= $(this).data('id');
     $('#deleteActivitie').modal('show');
    });

    $("#delete_activitie").on("click", function(){
      $.ajax({
        url: "<?php echo site_url('/activitieController/delete'); ?>",
        type: "POST",
        data: {id_activitie: idActivitie},
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