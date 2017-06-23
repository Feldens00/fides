

  <?php 
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
                                <h4 class="title">Alterar Entidade</h4>
                               
                            </div>
                            <div class="content">
                             <form action="<?= base_url('update-entitie');?>" method="POST">
    
                                <?php foreach ($entities as $et) { ?>

                                <input type="hidden" class="form-control border-input" name="updateEntitieId" value='<?php echo $et->id_entitie ;?>' >
                                <div class="form-group">
                                  <label for="name">* Nome:</label>
                                  <input type="text" class="form-control border-input" name="updateEntitieName" value='<?php echo $et->name_entitie ;?>' >
                                </div>

                                <div class="form-group">
                                  <label for="name">*Responsavel:</label>
                                  <input type="text" class="form-control border-input" name="updateEntitieResponsible" value='<?php echo $et->responsible;?>' >
                                </div>
                                
                                <div class="form-group">
                                  <label for="phone">* Telefone:</label>
                                  <input type="text" class="form-control border-input" id="fone" name="updateEntitiePhone" value='<?php echo $et->phone ;?>' >
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