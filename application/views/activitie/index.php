<script type="text/javascript">

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});


function mostrar(id){
 
    
        $("#a"+id).toggle();
    
}

$(document).ready(function(){
       var idActivitie;
   $('.delActivitie').click(function(){
    idActivitie= $(this).data('id');
     $('#deleteActivitie').modal('show');
    });

    $("#delete_activitie").on("click", function(){
      $.ajax({
        url: "<?php echo site_url('/activitieController/delete'); ?>",
        type: "POST",
        data: {id_activitie: idActivitie},
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



              <div class="col-sm-10 text-center div-barra">

                  <div class="col-md-10" >
                     <h2>Atividades</h2> 
                  </div>

                  <div class="col-md-1" title="Crie uma Atividade" data-toggle="tooltip">
                       <a href="#" title="Hooray!" data-toggle="modal" data-target="#addActivitie"><span class="glyphicon glyphicon-plus"></a>
                  </div>

              </div>

              <div class="container-fluid">
               <div class="row">
                 <?php foreach($activities as $ac) { ?>
                          <div class="col-lg-3">
                              <div class="card">
                                  <div class="content">
                                      <div class="row">
                                              <div class="col-sm-12 text-center"> 
                                                <h4><?= $ac->name_activitie;?></h4>
                                              </div>
                                      </div>
                                      <div class="container-fluid">
                                          <hr />
                                          <div class="row">
                                                <div class="col-xs-12">
                                                            <a href="<?= base_url('update-activitie-form/'.$ac->id_activitie)?>">
                                                                <button type="button" class="btn btn-default">
                                                                      <span class="glyphicon glyphicon-pencil">
                                                                </button>
                                                            </a>

                                                            <button type="button" class="btn btn-primary delActivitie" data-id="<?php echo $ac->id_activitie; ?>" >  
                                                              <span class="glyphicon glyphicon-trash">
                                                            </button>  
                                                </div>


                                               <?php 
                             
                                                echo (" <div class='col-xs-12 text-center'><i class='ti-angle-down'  id='b".$ac->id_activitie."'  onclick='mostrar(".$ac->id_activitie.")' ></i></div>");
                                                echo (" <div class='col-sm-12' id='a".$ac->id_activitie."' style='display: none; margin-top:5px;'>");
                                                ?>
                                                
                                                      <div class="col-sm-12">
                                                        <h4><font color="#d9d9d9"><?= $ac->description;?></font></h4>
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

<div id="addActivitie" class="modal fade">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">Criar uma nova atividade</h4>
                    </div>
                    <div class="modal-body">
                       
                                          
                        <form action="<?= base_url('create-activitie');?>" method="POST">
                            <div class="form-group">
                              <label for="name">* Nome:</label>
                              <input type="text" class="form-control" name="activitieName" placeholder="Digite o nome da atividade" required>
                            </div>
                            <div class="form-group">
                              <label for="name">Descrição:</label>
                              <textarea class="form-control" name="activitieDescription"></textarea> 
                            </div>                           
                    </div>
                    <div class="modal-footer">
                     
                            <button type="submit" class="btn btn-default">Enviar</button>
                          </form>

                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->



 <div id="deleteActivitie" class="modal fade">
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
                     
                      <button type="button" id='delete_activitie'  data-dismiss="modal" class="btn btn-primary">Sim</button>
                    
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
