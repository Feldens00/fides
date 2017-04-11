
 <?php 
   if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }
  ?>  
<div class="row">
  <div class="col-sm-10">
     <h2><font color="#d9d9d9">Alterar Equipe</font></h2>

  <form action="<?= base_url('update-team'); ?>" method="POST">
    <?php foreach ($teams as $tm) { ?>
    

    <input type="hidden" class="form-control" name="updateTeamId" value="<?= $tm->id_team; ?>">
    <div class="form-group">
      <label for="name"><font color='#d9d9d9'>* Nome:</font></label>
      <input type="text" class="form-control" name="updateTeamName" placeholder="Digite o nome da Equipe" value="<?= $tm->name_team; ?>">
    </div>
    <!--<div class="form-group">
       <label><font color='#d9d9d9'>* Evento</font></label>
                       <select name="updateTeamEvent" class="form-control" >
                              <option value='<?=$tm->id_event;?>'><?= $tm->name_event;?></option>
                               <?php
                                   foreach($events as $ev)
                                   
                                  echo "<option value='{$ev->id_event}'>{$ev->name_event}</option>";
                               ?>
                           </select>
    </div>-->
                              
    <?php } ?>
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  </div>
</div>
 
