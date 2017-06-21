<script type="text/javascript">

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});


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
<?php 

 if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }


?>
   
<div class="row">
	    <div class="col-sm-12">



              <div class="col-sm-10 text-center">

                  <div class="col-md-10" >
                     <h2>Produtos</h2> 
                  </div>

                  <div class="col-md-1" title="Crie um Produto" data-toggle="tooltip">
                       <a href="#" title="Hooray!" data-toggle="modal" data-target="#addProduct"><span class="glyphicon glyphicon-plus"></a>
                  </div>

              </div>

        <div class="container-fluid">
         <div class="row">
           <?php foreach($products as $pd) { ?>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                        <div class="col-sm-12"> 
                                          <h2><?= $pd->name_product;?></h2>
                                        </div>

                                         <div class="col-sm-12">
                                            <h4><?= $pd->type;?></h4>
                                          </div>
                                </div>  
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <div class="col-sm-12">
                                                    <a href="<?= base_url('update-product-form/'.$pd->id_product)?>">
                                                        <button type="button" class="btn btn-default">
                                                              <span class="glyphicon glyphicon-pencil">
                                                        </button>
                                                    </a>

                                                    <button type="button" class="btn btn-primary delProduct" data-id="<?php echo $pd->id_product; ?>" >  
                                                      <span class="glyphicon glyphicon-trash">
                                                    </button>  
                                        </div>
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
                              <input type="text" class="form-control" name="productName" placeholder="Digite o nome do Produto" required>
                            </div>
                            <div class="form-group">
                              <label for="name">* Tipo:</label>
                              <input type="text" class="form-control" name="productType" placeholder="Digite o tipo do Produto" required>
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
