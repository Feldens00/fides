
  <?php 

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
                                <h4 class="title">Alterar Equipe</h4>
                               
                            </div>
                            <div class="content">
                              <form action="<?= base_url('update-team'); ?>" method="POST">
                                <?php foreach ($teams as $tm) { ?>
                                

                                <input type="hidden" class="form-control" name="updateTeamId" value="<?= $tm->id_team; ?>">
                                <div class="form-group">
                                  <label for="name">* Nome:</label>
                                  <input type="text" class="form-control border-input" name="updateTeamName" placeholder="Digite o nome da Equipe" value="<?= $tm->name_team; ?>">
                                </div>

                                 <div class="form-group">
                                        <label for="description">Descrição:</label>
                                        <textarea class="form-control border-input" placeholder="Digite a descrição da equipe" name="updateTeamDescription" ><?=$tm->description;?></textarea>
                                  </div>                           
                                <?php } ?>
                                <div class="form-group text-center">
                                  <button type="submit" class="btn btn-default">Enviar</button>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
