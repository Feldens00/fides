

<?php 
      if ($formerror) {
      echo ("<div class=' col-sm-3 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }
    ?>    
<div class="row">
  <div class="col-sm-10">
     <h2><font color="#d9d9d9">Alterar Produto</font></h2>
    <form action="<?= base_url('update-product');?>" method="POST">
      
      <?php
          foreach ($products as $pd){ 
      ?>
          
      <input type="hidden" class="form-control" name="updateProductId" value="<?= $pd->id_product; ?>">

      <div class="form-group">
        <label for="name">* Nome:</label>
        <input type="text" class="form-control" name="updateProductName" placeholder="Digite o nome do Produto" value="<?= $pd->name_product; ?>">
      </div>
      <div class="form-group">
        <label for="name">Tipo:</label>
        <input type="text" class="form-control" name="updateProductType" placeholder="Digite o nome do Produto" value="<?= $pd->type; ?>">
      </div>
                              
     <?php  } ?>
      <button type="submit" class="btn btn-default">Enviar</button>
    </form>
  </div>
  
</div>