
  <div class="row">
  <div class="col-sm-10 text-center div-barra">
      
        <div class="col-md-11" >
           <h2><font color="#d9d9d9">Entidades</font></h2> 
        </div>

        <div class="col-md-1">
             <a href="<?= site_url('create-entitie-form'); ?>"><span class="glyphicon glyphicon-plus"></a>
        </div>
  </div>
        <div class="col-sm-12" style="margin-top:50px;">
          <?php foreach($entities as $et) { ?>
            <div class="col-sm-3 div-mold"> 
              <h2><font color="#d9d9d9"><?= $et->name_entitie; ?></font></h2>
              <h4><font color="#d9d9d9"><?=$et->phone;?></font></h4>

               <a href="<?= base_url('update-entitie-form/'.$et->id_entitie)?>">
                  <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil">
                  </button>
                </a>
                
              <button type="button" class="btn btn-primary delEntitie" data-id="<?php echo $et->id_entitie ?>" >  
                    <span class="glyphicon glyphicon-trash">
              </button>
            </div>
         <?php } ?>  
       </div>  
   </div>





     <div id="deleteEntitie" class="modal fade">
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
                     
                      <button type="button" id='delete_entitie'  data-dismiss="modal" class="btn btn-primary">Sim</button>
                    
                    
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                  
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
<script type="text/javascript">
  var idEntitie;
   $('.delEntitie').click(function(){
    idEntitie = $(this).data('id');
     $('#deleteEntitie').modal('show');
    });
    $("#delete_entitie").on("click", function(){
      $.ajax({
        url: "<?php echo site_url('entitieController/delete'); ?>",
        type: "POST",
        data: {id_entitie: idEntitie},
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
   
</script>
