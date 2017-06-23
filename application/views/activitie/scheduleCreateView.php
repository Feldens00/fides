
<script type="text/javascript">
 
 function mostraBtn(){
    document.getElementById('btn_del').style.display = "block";
 }


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

</script>
<?php 

foreach ($events as $ev) {
  $id_event = $ev->id_event;
  $name_event = $ev->name_event; 
}



 if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }


?>
   

<div class="row">
    <div class="col-sm-10 text-center">
       <div class="col-md-11" >
            <h2>Atividades do Cronograma do Evento <?= $name_event; ?></h2> 
        </div>
        <div class="col-md-1" title="Adicione uma Atividade ao Cronograma" data-toggle="tooltip">
            <a  class="#" data-toggle="modal" data-target="#addSchedule"><span class="glyphicon glyphicon-schedule"><span class="glyphicon glyphicon-plus"></a>
        </div>     
    </div>     



      <div class="container-fluid">
        <div class="row">
         <form action="<?= base_url('delete-schedule-activitie/'.$id_event)?>" method="POST">
           <?php foreach($acEvents as $ae) { ?>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-10 text-center"> 
                                      <h4><?= $ae->name_activitie; ?></h4>
                                    </div>
                                    <div class="col-sm-2">
                                      <input type="checkbox" name="selecao[]" onclick="mostraBtn()" value="<?=$ae->id_activitie;?>"/>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <hr />
                                      <div class="row">
                                          <div class="col-sm-12">                                               
                                                    <div class="col-sm-4">
                                                          <h4><?= $ae->horary;?></h4>
                                                   </div>
                                          </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php } ?>

                     <div class="col-sm-10 text-center"  id="btn_del"  style="margin-top:50px; display: none;">
                        <button type="submit"  class="btn btn-default">Remover<span class="glyphicon glyphicon-floppy-disk"></span></button>
                  </div>
                </form>
                </div>
              </div>

</div>




<div id="addSchedule" class="modal fade">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <label class="modal-title">Adicionar Atividade ao Cronograma</label>
                    </div>
                    <div class="modal-body">
                       
                                          
                        <form action="<?= base_url('create-schedule-activitie/'.$id_event)?>" method="POST">
                            
                            <div class="form-group">
                               <label for="date2">*Atividade:</label>
                              <select name="activitieId" class="form-control" >
                                   <?php
                                       echo "<option>Seleciona uma Atividade</option>";
                                       foreach($activities as $ac)
                                         
                                          echo "<option value='{$ac->id_activitie}'>{$ac->name_activitie}</option>";
                                   ?>
                              </select>
                            </div>


                            <div class="form-group">
                              <label for="date2">*Hora:</label>
                              <input type="time" class="form-control"  name="activitieHorary" required>
                            </div>
                                    
                           
                    </div>
                    <div class="modal-footer">
                     
                            <button type="submit" class="btn btn-default">Enviar</button>

                          </form>

                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->


