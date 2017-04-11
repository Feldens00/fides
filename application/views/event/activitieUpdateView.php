

<?php 
      if ($formerror) {
      echo ("<div class=' col-sm-3 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }
    ?>    
<div class="row">
  <div class="col-sm-10">
     <h2><font color="#d9d9d9">Alterar Atividade</font></h2>
    <form action="<?= base_url('update-activitie');?>" method="POST">
      
      <?php
          foreach ($activities as $ac){ 
      ?>
          
      <input type="hidden" class="form-control" name="updateActivitieId" value="<?= $ac->id_activitie; ?>">
      <div class="form-group">

      <div class="form-group">
        <label for="name">* Nome:</label>
        <input type="text" class="form-control" name="updateActivitieName" placeholder="Digite o nome da atividade" value="<?= $ac->name_activitie; ?>">
      </div>
      <div class="form-group">
        <label for="name">Descrição:</label>
        <textarea class="form-control" name="updateActivitieDescription" value="<?= $ac->description; ?>"></textarea> 
      </div>
                            
      <div class="form-group">
        <label for="date2">*Hora:</label>
        <input type="time" class="form-control"  name="updateActivitieHorary" value="<?= $ac->horary; ?>">
      </div>
                                    
                      
     <?php  } ?>
      <button type="submit" class="btn btn-default">Enviar</button>
    </form>
  </div>
  
</div>