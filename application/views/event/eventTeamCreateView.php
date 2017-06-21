<?php foreach ($events as $ev) {
  $id_event = $ev->id_event;
  $name_event = $ev->name_event; 

}
if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }
?>

     <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><?= $name_event; ?></h4>
                                <p class="category">Adicione equipes ao evento.</p>
                            </div>
                            <form action="<?= base_url('create-event-team/'.$id_event)?>" method="POST">
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                      <th>id</th>
                                      <th>nome</th>
                                      <th><?= $id_event;?></th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($teams as $tm) { ?> 
                                      <tr>
                                        <td><?= $tm->id_team;?></td>
                                        <td><?= $tm->name_team;?></td>
                                        <td align="center" width="70">
                                                <input type="checkbox" name="selecao[]" value="<?=$tm->id_team;?>"/>
                                        </td>
                                      </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                             <div class="col-sm-12 text-center">
                                  <button type="submit" class="btn btn-default">Salvar
                                     <span class="glyphicon glyphicon-floppy-disk"></span>
                                  </button>
                              </div>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

     
