
<script type="text/javascript">
 function mostraBtn(){
     document.getElementById('btn_del').style.display = "block";
 }

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

</script>
<?php 
foreach ($events as $ev) {
  $id_event = $ev->id_event;
  $name_event = $ev->name_event; 
}



 if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }


?>
   


  <div class="row">
    <div class="col-sm-12" style="padding-bottom: 100px;">

           <div class="col-sm-10 text-center div-barra">

                  <div class="col-md-10" >
                     <h2><font color="#d9d9d9"> Lista de Produtos do Evento <?= $name_event; ?></font></h2> 
                  </div>

                

                  <div class="col-md-1" title="Adicione um produto a Lista" data-toggle="tooltip">
                        <a  class="#" data-toggle="modal" data-target="#addProduct"><span class="glyphicon glyphicon-schedule"><span class="glyphicon glyphicon-plus"></a>
                  </div>
                   
              </div>
          <div class="col-sm-12" style="margin-top:50px;">
             
                <form action="<?= base_url('delete-list-product/'.$id_event)?>" method="POST">
                  <div class="col-sm-12"  style="overflow: auto;  height: 350px;">
                  <?php foreach ($productEvent as $pe) { ?> 
                    <div class="col-sm-3 div-mold">
                          <div class="col-sm-10">
                            <h2><font color="#d9d9d9"><?= $pe->name_product;?></font></h2>
                          </div>
                          <div class="col-sm-2">
                            <input type="checkbox"  onclick="mostraBtn()" name="selecao[]" value="<?=$pe->id_product;?>"/>
                          </div>
                           
                            <div class="col-sm-4">
                                  <h4><font color="#d9d9d9"><?= $pe->type;?></font></h4>
                           </div>

                            <div class="col-sm-4">
                                  <h4><font color="#d9d9d9"><?= $pe->amount;?></font></h4>
                           </div>

                           <div class="col-sm-4">
                                  <h4><font color="#d9d9d9"><?= $pe->unitary_value;?></font></h4>
                           </div>

                           <div class="col-sm-4">
                                  <h4><font color="#d9d9d9"><?= $pe->quantity;?></font></h4>
                           </div>
                    </div>
                  <?php } ?>
                  </div>
                  <div class="col-sm-10 text-center" id="btn_del"  style="margin-top:50px; display: none;">
                        <button type="submit" class="btn btn-default">Remover<span class="glyphicon glyphicon-floppy-disk"></span></button>
                  </div>
                </form>
          </div> 
    </div>
  </div>





<div id="addProduct" class="modal fade">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <label class="modal-title">Adicionar Produto ao Cronograma</label>
                    </div>
                    <div class="modal-body">
                       
                                          
                        <form action="<?= base_url('create-list-product/'.$id_event)?>" method="POST">
                            
                            <div class="form-group">
                               <label for="date2">*Produto</label>
                              <select name="productId" class="form-control" >
                                   <?php
                                       echo "<option>Seleciona um Produto</option>";
                                       foreach($products as $pd)
                                         
                                          echo "<option value='{$pd->id_product}'>{$pd->name_product}</option>";
                                   ?>
                              </select>
                            </div>


                            <div class="form-group">
                              <label for="date2">* Quantidade:</label>
                              <input type="number" class="form-control"  name="productQuantity"  required>
                            </div>

                            <div class="form-group">
                              <label for="money">* Valor Unitario:</label>
                              <input type="text" class="form-control" id="money"  name="productUnitary" required>
                            </div>
                                    
                           
                    </div>
                    <div class="modal-footer">
                     
                            <button type="submit" class="btn btn-default">Enviar</button>

                          </form>

                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->


