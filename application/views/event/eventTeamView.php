 <?php foreach ($events as $ev) { 
    $name_event = $ev->name_event;
    $id_event = $ev->id_event;
  }?>
    
  <div class="row">
    <div class="col-sm-10 text-center div-barra">
   
        <div class="col-sm-10" >
           <h2>
                <font color="#d9d9d9">Equipes do Evento <?= $name_event;?> 
                </font>
           </h2> 
        </div>

    </div>
      <div class="col-sm-10 div-mold" style="margin-top:50px;">
      <?php 
         if ($formerror) {
                echo "<p><font color='#d9d9d9'>".$formerror."</font></p>";
        }
      ?>    
       <form action="<?= base_url('delete-event-team/'.$id_event)?>" method="POST">
          <div class="table-responsive">
             <table class="table table-condesed">
              <thead>
                <tr>
                  <th><font color="#d9d9d9">Id</font></th>
                  <th><font color="#d9d9d9">Nome</font></th>
                   <th><font color="#d9d9d9">Remover</font></th>
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
                <button type="submit" class="btn btn-default">remover <span class="glyphicon glyphicon-floppy-disk"></span></button>
          </div>
        </form>
      </div> 
   </div>
