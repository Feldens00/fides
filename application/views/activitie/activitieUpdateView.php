

<?php 
      if ($formerror) {
      echo ("<div class=' col-sm-3 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }
    ?>    
 <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Alterar Atividade</h4>
                               
                            </div>
                            <div class="content">
                             <form action="<?= base_url('update-activitie');?>" method="POST">
      
                                <?php
                                    foreach ($activities as $ac){ 
                                ?>
                                    
                                <input type="hidden" class="form-control " name="updateActivitieId" value="<?= $ac->id_activitie; ?>">
                            

                                <div class="form-group">
                                  <label for="name">* Nome:</label>
                                  <input type="text" class="form-control border-input" name="updateActivitieName" placeholder="Digite o nome da atividade" value="<?= $ac->name_activitie; ?>">
                                </div>
                                <div class="form-group">
                                  <label for="name">Descrição:</label>
                                  <textarea class="form-control border-input" name="updateActivitieDescription" ><?= $ac->description; ?></textarea> 
                                </div>
                                                        
                               <?php  } ?>
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