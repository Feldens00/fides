

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
                                <h4 class="title">Adicionar Produto</h4>
                               
                            </div>
                            <div class="content">
                              <form action="<?= base_url('update-product');?>" method="POST">
                                  
                                  <?php
                                      foreach ($products as $pd){ 
                                  ?>
                                      
                                  <input type="hidden" class="form-control" name="updateProductId" value="<?= $pd->id_product; ?>">

                                  <div class="form-group">
                                    <label for="name">* Nome:</label>
                                    <input type="text" class="form-control border-input" name="updateProductName" placeholder="Digite o nome do Produto" value="<?= $pd->name_product; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Tipo:</label>
                                    <input type="text" class="form-control border-input" name="updateProductType" placeholder="Digite o nome do Produto" value="<?= $pd->type; ?>">
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