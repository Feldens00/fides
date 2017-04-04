
<div class="row">
  <div class="col-sm-10">
    <h2><font color="#d9d9d9">Alterar Entidade</font></h2> 
  <?php 
    if ($formerror) {
      echo "<p><font color='#d9d9d9'>".$formerror."</font></p>";
    }
  ?>    
  <form action="<?= base_url('update-entitie');?>" method="POST">
    
    <?php foreach ($entities as $et) { ?>

    <input type="hidden" class="form-control" name="updateEntitieId" value='<?php echo $et->id_entitie ;?>' >
    <div class="form-group">
      <label for="name"><font color="#d9d9d9">* Nome:</font></label>
      <input type="text" class="form-control" name="updateEntitieName" value='<?php echo $et->name_entitie ;?>' >
    </div>
    <div class="form-group">
      <label for="phone"><font color="#d9d9d9">* Telefone:</font></label>
      <input type="text" class="form-control" id="fone" name="updateEntitiePhone" value='<?php echo $et->phone ;?>' >
    </div>
    <?php } ?>
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  </div>
  
</div>