<?php foreach ($events as $ev) {
  $id_event = $ev->id_event;
  $name_event = $ev->name_event; 
}?>

  <div class="row">
    <div class="col-sm-10 text-center div-barra">

        <div class="col-md-11" >
           <h2><font color="#d9d9d9"> Crie o cronograma do Evento <?= $name_event; ?></font></h2> 
        </div>


    </div>
      <div class="col-sm-10" style="margin-top:50px;">
      <?php 
         if ($formerror) {
                echo "<p><font color='#d9d9d9'>".$formerror."</font></p>";
        }
      ?>    

        <form action="<?= base_url('create-event-team/'.$id_event)?>" method="POST">
          <?php foreach ($activities as $ac) { ?> 
            <div class="col-sm-4">
                  <h4><font color="#d9d9d9"><?= $ac->name_activitie;?></font></h4>
                   <input type="checkbox" name="selecao[]" value="<?=$ac->id_activitie;?>"/>
            </div>
          <?php } ?>
          <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-default">Salvar <span class="glyphicon glyphicon-floppy-disk"></span></button>
          </div>
        </form>
      </div> 
   </div>

