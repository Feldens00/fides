

<?php foreach ($teams as $tm) { 
  $id_team = $tm->id_team;
  $name_team = $tm->name_team;
}

  foreach ($peoples as $p2) {
    $id_event = $p2 ->events_id_event;
    }

    echo "<h2> evento :".$id_event."</h2>";
   if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }
 
?>



            <div class="col-sm-5">        
              <div class="content">
               <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><?= $name_team; ?></h4>
                                <p class="category">Remover pessoas da equipe.</p>
                            </div>
                            </form>
                            <form action="<?= base_url('delete-team-people/'.$id_team.'/'.$id_event)?>" method="POST">
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                      <th>id</th>
                                      <th>nome</th>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($peoples as $p) { ?> 
                                        <tr>
                                          <td><?= $p->id_people;?></td>
                                          <td><?= $p->name_people;?></td>
                                          <td><?= $id_team; ?></td>
                                          <td align="center" width="70">
                                                  <input type="checkbox" name="selecao[]" value="<?= $p->id_people;?>"/>
                                          </td>
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                             <div class="col-sm-12 text-center">
                                  <button type="submit" class="btn btn-default">Remover
                                     <span class="glyphicon glyphicon-floppy-disk"></span>
                                  </button>
                              </div>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
           </div> 

          


