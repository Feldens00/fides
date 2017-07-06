<script type="text/javascript">

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

function mostrar(id){
 
    
        $("#a"+id).toggle();
    
}
$(document).ready(function(){
       var idProduct;
   $('.delProduct').click(function(){
    idProduct= $(this).data('id');
     $('#deleteProduct').modal('show');
    });

    $("#delete_product").on("click", function(){
      $.ajax({
        url: "<?php echo site_url('/productController/delete'); ?>",
        type: "POST",
        data: {id_product: idProduct},
        success: function(data){
          window.location.reload();
          if(!data){
           console.log(data);
           
           
          }else{
            console.log(data);

          }
        },
        error: function(data){
          console.log(data);
         
        }
      });
    }); 
});
</script>
   
<div class="row">
    <div class="container-fluid text-center">
      <div class="card">
          <div class="row">
            <div class="col-sm-12">
              <div class="col-sm-4 col-sm-offset-4" >
             <h2>Produtos</h2> 
          </div>

          <div class="col-sm-1" style="margin: 25px;">
               <a href="#" title="Hooray!" data-toggle="modal" data-target="#addProduct">
                <button type="button" class=" btn btn-primary">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
               </a>
          </div>
            </div>
          </div> 
      </div>  
    </div>
        <div class="container-fluid">
         <div class="row">
           <?php foreach($products as $pd) { ?>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                        <div class="col-sm-12 text-center"> 
                                          <h4><?= $pd->name_product;?></h4>
                                        </div>
                                </div>  
                                <div class="container-fluid">
                                    <hr />
                                    <div class="row">
                                        <div class="col-xs-12">
                                                    <a href="<?= base_url('update-product-form/'.$pd->id_product)?>">
                                                        <button type="button" class="btn btn-default">
                                                              <span class="glyphicon glyphicon-pencil">
                                                        </button>
                                                    </a>

                                                    <button type="button" class="btn btn-primary delProduct" data-id="<?php echo $pd->id_product; ?>" >  
                                                      <span class="glyphicon glyphicon-trash">
                                                    </button>  
                                        </div>

                                               <?php 
                             
                                                echo (" <div class='col-xs-12 text-center'><i class='ti-info'  id='b".$pd->id_product."'  onclick='mostrar(".$pd->id_product.")' ></i></div>");
                                                echo (" <div class='col-sm-12' id='a".$pd->id_product."' style='display: none; margin-top:5px;'>");
                                                ?>
                                                      
                                                        <div class="col-sm-12">
                                                          <p>Tipo: <?=$pd->type;?></p>
                                                        </div>
                                                        
                                                     

                                                <?php echo('</div>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php } ?>
                </div>
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
                      <h4 class="modal-title">Criar um novo Produto</h4>
                    </div>
                    <div class="modal-body">
                       
                                          
                        <form action="<?= base_url('create-product');?>" method="POST">
                            <div class="form-group">
                              <label for="name">* Nome:</label>
                              <input type="text" class="form-control border-input" name="productName" placeholder="Digite o nome do Produto" required>
                            </div>
                            <div class="form-group">
                              <label for="name">* Tipo:</label>
                              <input type="text" class="form-control border-input" name="productType" placeholder="Digite o tipo do Produto" required>
                            </div>                           
                    </div>
                    <div class="modal-footer">
                     
                            <button type="submit" class="btn btn-default">Enviar</button>
                          </form>

                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->



 <div id="deleteProduct" class="modal fade">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">Apagar</h4>
                    </div>
                    <div class="modal-body">
                      <p><strong>Realmente deseja apagar o cadastro?</strong></p>
                    </div>
                    <div class="modal-footer">
                     
                      <button type="button" id='delete_product'  data-dismiss="modal" class="btn btn-primary">Sim</button>
                    
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
