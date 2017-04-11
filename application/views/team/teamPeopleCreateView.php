<?php foreach ($teams as $tm) { 
  $id_team = $tm->id_team;
  $name_team = $tm->name_team;
}

   if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }

?> 

  <div class="row">
    <div class="col-sm-10 text-center div-barra">

        <div class="col-md-11" >
           <h2><font color="#d9d9d9">Adicione Pessoas a Equipe <?= $name_team; ?></font></h2> 
        </div>


    </div>
      <div class="col-sm-10 div-mold" style="margin-top:50px;">
        
       <form action="<?= base_url('create-team-people/'.$id_team)?>" method="POST">
          <div class="table-responsive">
             <table class="table table-condesed">
              <thead>
                <tr>
                  <th><font color="#d9d9d9">id</font></th>
                  <th><font color="#d9d9d9">nome</font></th>
                </tr>
              </thead>
              <tbody>
               <?php foreach ($peoples as $p) { ?> 
                <tr>
                  <td><font color="#d9d9d9"><?= $p->id_people;?></font></td>
                  <td><font color="#d9d9d9"><?= $p->name_people;?></font></td>
                  <td><font color="#d9d9d9"><?= $id_team; ?></font></td>
                  <td align="center" width="70">
                          <input type="checkbox" name="selecao[]" value="<?= $p->id_people;?>"/>
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

