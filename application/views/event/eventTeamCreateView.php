<?php foreach ($events as $ev) {
  $id_event = $ev->id_event;
  $name_event = $ev->name_event; 

}
if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }
?>

  <div class="row">
    <div class="col-sm-10 text-center div-barra">

        <div class="col-md-11" >
           <h2><font color="#d9d9d9">Adicione Equipes ao Evento <?= $name_event; ?></font></h2> 
        </div>


    </div>
      <div class="col-sm-10 div-mold" style="margin-top:50px;">
     
       <form action="<?= base_url('create-event-team/'.$id_event)?>" method="POST">
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
               <?php foreach ($teams as $tm) { ?> 
                <tr>
                  <td><font color="#d9d9d9"><?= $tm->id_team;?></font></td>
                  <td><font color="#d9d9d9"><?= $tm->name_team;?></font></td>
                  <td align="center" width="70">
                          <input type="checkbox" name="selecao[]" value="<?=$tm->id_team;?>"/>
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

