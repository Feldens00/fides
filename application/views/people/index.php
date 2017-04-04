

  <div class="row">
    <div class="col-sm-10 text-center div-barra">

        <div class="col-md-11" >
           <h2><font color="#d9d9d9">Pessoas</font></h2> 
        </div>

        <div class="col-md-1">
             <a href="<?= site_url('create-people-form'); ?>"><span class="glyphicon glyphicon-plus"></a>
        </div>

    </div>
      <div class="col-sm-12" style="margin-top:50px;">
        <?php foreach($peoples as $pp) { ?>
            <div id=divPeoples class="col-md-3 div-mold"> 
              <h2><font color="#d9d9d9"><?= $pp->name_people; ?></font></h2>

               <a href="<?= base_url('update-people-form/'.$pp->id_people)?>">
            <button type="button" class="btn btn-default">
                  <span class="glyphicon glyphicon-pencil">
            </button>
          </a>
        <button type="button" class="btn btn-primary delPeople" data-id="<?php echo $pp->id_people; ?>" >  
           <span class="glyphicon glyphicon-trash">
        </button>
            </div>
        <?php } ?>  
      </div>
      
   </div>




     <div id="deletePeople" class="modal fade">
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
                     
                      <button type="button" id='delete_people'  data-dismiss="modal" class="btn btn-primary">Sim</button>
                    
                    
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                  
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
<script type="text/javascript">
  var idPeople;
   $('.delPeople').click(function(){
    idPeople = $(this).data('id');
     $('#deletePeople').modal('show');
    });

    $("#delete_people").on("click", function(){
      $.ajax({
        url: "<?php echo site_url('/peopleController/delete'); ?>",
        type: "POST",
        data: {id_people: idPeople},
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
