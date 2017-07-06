<?php foreach ($events as $ev) {
  $id_event = $ev->id_event;
  $name_event = $ev->name_event; 

}


   if ($formerror) {
      echo ("<div class='row'><div class='wow bounceInUp col-sm-6 col-sm-offset-3 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!   </strong>".$formerror."</div></div>");
    }
?>   

     <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                               <div class="col-sm-12">
                                  <h4 class="title"><?= $name_event; ?></h4>
                                </div>
                                <div class="col-sm-8">
                                  <p class="category">Adicionar equipes ao evento.</p>
                                </div>
                                <div class="col-sm-4 ">
                                  <form action="<?= base_url('search-team-create/'.$id_event)?>" method="POST">
                                    <div class="input-group">
                                        <input type="text" class="form-control border-input" name="search" placeholder="Pesquisar..." required>
                                        <span class="input-group-btn">
                                          <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                        </span>
                                    </div>
                                  </form>
                                </div>
                            </div>
                            <form action="<?= base_url('create-event-team/'.$id_event)?>" method="POST">
                            <div class="content table-responsive table-full-width" style="overflow: auto; height: 500px;">
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

     
