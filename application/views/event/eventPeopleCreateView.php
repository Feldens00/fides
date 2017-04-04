<?php foreach ($events as $ev) {
  $id_event = $ev->id_event;
  $name_event = $ev->name_event; 
}?>

  <div class="row">
    <div class="col-sm-10 text-center div-barra">

        <div class="col-md-11" >
           <h2><font color="#d9d9d9">Adicione Pessoas ao Evento <?= $name_event; ?></font></h2> 
        </div>


    </div>
      <div class="col-sm-10 div-mold" style="margin-top:50px;">
      <?php 
         if ($formerror) {
                echo "<p><font color='#d9d9d9'>".$formerror."</font></p>";
        }
      ?>    
       <form action="<?= base_url('create-event-people/'.$id_event)?>" method="POST">
          <div class="table-responsive">
             <table class="table table-condesed">
              <thead>
                <tr>
                  <th><font color="#d9d9d9">id</font></th>
                  <th><font color="#d9d9d9">nome</font></th>
                   <th><font color="#d9d9d9"><?= $id_event;?></font></th>
                </tr>
              </thead>
              <tbody>
               <?php foreach ($peoples as $p) { ?> 
                <tr>
                  <td><font color="#d9d9d9"><?= $p->id_people;?></font></td>
                  <td><font color="#d9d9d9"><?= $p->name_people;?></font></td>
                  <td align="center" width="70">
                          <input type="checkbox" name="selecao[]" value="<?=$p->id_people;?>"/>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>  
          </div>
          <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-default">Salvar <span class="glyphicon glyphicon-floppy-disk"></span></button>
          </div>
        </form>
      </div> 
   </div>

