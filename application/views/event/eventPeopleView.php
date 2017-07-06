 <?php foreach ($events as $ev) { 
    $name_event = $ev->name_event;
    $id_event = $ev->id_event;
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
                                <h4 class="title"><?= $name_event; ?></h4>
                                <p class="category">Remova pessoas do evento.</p>
                            </div>
                            <form action="<?= base_url('delete-event-people/'.$id_event)?>" method="POST">
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                      <th>id</th>
                                      <th>nome</th>
                                      <th><?= $id_event;?></th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($peoples as $p) { ?> 
                                      <tr>
                                        <td><?= $p->id_people;?></td>
                                        <td><?= $p->name_people;?></td>
                                        <td align="center" width="70">
                                                <input type="checkbox" name="selecao[]" value="<?=$p->id_people;?>"/>
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