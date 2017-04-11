

<?php foreach ($teams as $tm) { 
  $id_team = $tm->id_team;
  $name_team = $tm->name_team;
}
   if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }
 
?>

<div class="row">
    <div class="col-sm-10 text-center">
     
        <div class="col-sm-10 div-barra" >
            <h2>
                <font color="#d9d9d9">Equipe <?= $name_team;?> 
                </font>
           </h2> 
    </div>

      <div class="col-sm-5 div-mold" style="margin-top:50px;">
        <div class="col-sm-12">
           <h4><font color="#d9d9d9">Pessoas</font</h4>
        </div>
         
       
        <div class="col-sm-12">
          <form action="<?= base_url('delete-team-people/'.$id_team)?>" method="POST">
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
                 <?php foreach ($peoples as $p) { ?> 
                  <tr>
                    <td><font color="#d9d9d9"><?= $p->id_people;?></font></td>
                    <td ><font color="#d9d9d9"><?= $p->name_people;?></font></td>
                     <td align="center" width="70">
                            <input type="checkbox" name="selecao[]" value="<?=$p->id_people;?>"/>
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

         <div class="col-sm-5 div-mold" style="margin-top:50px;">
           <div class="col-sm-12">
             <h4><font color="#d9d9d9">Eventos</font</h4>
          </div>
         
          <div class="col-sm-12">
              <div class="table-responsive">
               <table class="table table-condesed">
                <thead>
                  <tr>
                    <th><font color="#d9d9d9">Id</font></th>
                    <th><font color="#d9d9d9">Nome</font></th>
                  </tr>
                </thead>
                <tbody>
                 <?php foreach ($events as $ev) { ?> 
                  <tr>
                    <td><font color="#d9d9d9"><?= $ev->id_event;?></font></td>
                    <td><font color="#d9d9d9"><?= $ev->name_event;?></font></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>  
            </div>
          </div>
        
 
      </div> 
  </div>

