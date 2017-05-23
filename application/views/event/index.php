
<script type="text/javascript"> 
  
$(document).ready(function(){
   var idEvent;
     $('.delEvent').click(function(){
      idEvent = $(this).data('id');
       $('#deleteEvent').modal('show');
      });

      $("#delete_event").on("click", function(){
        $.ajax({
          url: "<?php echo site_url('/eventController/delete'); ?>",
          type: "POST",
          data: {id_event: idEvent},
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

//função do toggle 
function mostrarA(id){
        div_a ="div_a"+id;
        div_icone_a ="div_icone_a"+id;
        div_icone_b ="div_icone_b"+id;
        div_icone_c ="div_icone_c"+id;
      
    if ((document.getElementById(div_a).style.display = "none")&&(  document.getElementById(div_icone_b).style.display == "block")&&(  document.getElementById(div_icone_c).style.display == "block")){
            
            document.getElementById(div_a).style.display = "block";
            document.getElementById(div_icone_b).style.display = "none";
            document.getElementById(div_icone_c).style.display = "none";
            document.getElementById(div_icone_a).className = 'col-sm-12 text-center';

    }else if((document.getElementById(div_a).style.display = "block")&&( document.getElementById(div_icone_b).style.display == "none")&&( document.getElementById(div_icone_c).style.display == "none")) {

             document.getElementById(div_a).style.display = "none";
             document.getElementById(div_icone_b).style.display = "block";
             document.getElementById(div_icone_c).style.display = "block";
             document.getElementById(div_icone_a).className = 'col-sm-4 text-center';
       }
}

function mostrarB(id){
        div_b ="div_b"+id;
        div_icone_b ="div_icone_b"+id;
        div_icone_c ="div_icone_c"+id;
        div_icone_a ="div_icone_a"+id;
        
      
    if ((document.getElementById(div_b).style.display = "none")&&(  document.getElementById(div_icone_a).style.display == "block")&&(  document.getElementById(div_icone_c).style.display == "block")){

            document.getElementById(div_b).style.display = "block";
            document.getElementById(div_icone_a).style.display = "none";
            document.getElementById(div_icone_c).style.display = "none";
            document.getElementById(div_icone_b).className = 'col-sm-12 text-center';


    }else if((document.getElementById(div_b).style.display = "block")&&( document.getElementById(div_icone_a).style.display == "none")&&(  document.getElementById(div_icone_c).style.display == "none")) {
              
             document.getElementById(div_b).style.display = "none";
             document.getElementById(div_icone_a).style.display = "block";
             document.getElementById(div_icone_c).style.display = "block";
             document.getElementById(div_icone_b).className = 'col-sm-4 text-center';
        } 
}

function mostrarC(id){
        div_c ="div_c"+id;
        div_icone_c ="div_icone_c"+id;
        div_icone_a ="div_icone_a"+id;
        div_icone_b ="div_icone_b"+id;
      
    if ((document.getElementById(div_c).style.display = "none")&&(  document.getElementById(div_icone_a).style.display == "block")&&(  document.getElementById(div_icone_b).style.display == "block")){

            document.getElementById(div_c).style.display = "block";
            document.getElementById(div_icone_a).style.display = "none";
            document.getElementById(div_icone_b).style.display = "none";
            document.getElementById(div_icone_c).className = 'col-sm-12 text-center';

    }else if((document.getElementById(div_c).style.display = "block")&&( document.getElementById(div_icone_a).style.display == "none")&&(  document.getElementById(div_icone_b).style.display == "none")) {

             document.getElementById(div_c).style.display = "none";
             document.getElementById(div_icone_a).style.display = "block";
             document.getElementById(div_icone_b).style.display = "block";
             document.getElementById(div_icone_c).className = 'col-sm-4 text-center';
       }
}

</script>

  <div class="row">
    <div class="col-sm-10 text-center div-barra">

        <div class="col-md-11" >
           <h2><font color="#d9d9d9">Eventos</font></h2> 
        </div>

        <div class="col-md-1">
             <a href="<?= site_url('create-event-form'); ?>"><span class="glyphicon glyphicon-plus"></a>
        </div>

    </div>
      <div class="col-sm-12" style="margin-top:50px;">
        <?php foreach($events as $ev) { ?>
            <div id=divEntities class="col-sm-3 div-mold"> 

               
                <div class="col-sm-12">
                  <h2><font color="#d9d9d9"><?= $ev->name_event; ?></font></h2>
                </div>

                  <div class="col-sm-6">
                      <a href="<?= base_url('update-event-form/'.$ev->id_event)?>">
                          <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-pencil">
                          </button>
                      </a>

                      <button type="button" class="btn btn-primary delEvent" data-id="<?php echo $ev->id_event; ?>" >  
                        <span class="glyphicon glyphicon-trash">
                      </button>  
                  </div>
                  
                  <div align="right" class="col-sm-2 col-sm-offset-2">
                    <a  class href="<?= base_url('form-event-team/'.$ev->id_event)?>">
                       <i class="material-icons">group_add</i>
                    </a>
                  </div>  
                  <div align="right" class="col-sm-2">
                    <a  class href="<?= base_url('form-event-people/'.$ev->id_event)?>">
                       <i class="material-icons">person_add</i>
                    </a>
                  </div>  

                  <div class="col-sm-12 painel-event" >
                   <?php 
 
                    
                    echo (" <div id='div_icone_a".$ev->id_event."' onclick='mostrarA(".$ev->id_event.")' class='col-sm-4 text-center' style='display: block; background:#555;' ><font color='white'><i class='material-icons' style='margin-top:5px;'>keyboard_arrow_down</i></font></div>");
                    echo (" <div class='col-sm-12 text-center'id='div_a".$ev->id_event."'  style='display: none; margin-top:5px;'>");
                    ?>
                 
                        <div style="margin-top:10px;" class="col-sm-6">
                           <a  href="<?= base_url('event-team/'.$ev->id_event)?>"> <i class="material-icons">group</i> Visualizar Equipes</a>
                        </div>

                        <div  style="margin-top:10px;" class="col-sm-6">
                           <a  href="<?= base_url('event-people/'.$ev->id_event)?>"> <i class="material-icons">person</i> Visualizar Pessoas</a>
                        </div>

                        <div style="margin-top:10px;" class="col-sm-6">
                           <a  href="<?= base_url('form-event-schedule/'.$ev->id_event)?>"> <i class="material-icons">schedule</i> Cronograma</a>
                        </div>

                         
                      <div style="margin-top:10px;" class="col-sm-6">
                           <a  href="<?= base_url('form-list-product/'.$ev->id_event)?>"><i class="material-icons">shopping_cart</i> Lista de produtos</a>
                        </div>  
                      
                   
                  <?php echo('</div>'); ?>

                   <?php 
 
                    echo (" <div id='div_icone_b".$ev->id_event."' onclick='mostrarB(".$ev->id_event.")' class='col-sm-4 text-center' style='display: block;'><i class='material-icons'  style='margin-top:5px;'>print</i></div>");
                    echo (" <div class='col-sm-12 text-center'id='div_b".$ev->id_event."'  style='display: none; margin-top:5px;'>");
                    ?>
                                                           
                        <div style="margin-top:10px;" class="col-sm-6">
                           <a  href="<?= base_url('print-quadrante/'.$ev->id_event)?>"><i class="material-icons">description</i>Quadrante</a>
                        </div>

                        <div style="margin-top:10px;" class="col-sm-6">
                              <a href="<?= base_url('print/'.$ev->id_event);?>" ><i class="material-icons">description</i>Cronograma</a>
                        </div>
                        
                        <div style="margin-top:10px;" class="col-sm-12">
                              <a href="<?= base_url('print-list/'.$ev->id_event);?>" ><i class="material-icons">description</i>Lista de Produtos</a>
                        </div>
                  <?php echo('</div>'); ?>

                    <?php 
 
                    echo (" <div id='div_icone_c".$ev->id_event."' onclick='mostrarC(".$ev->id_event.")' class='col-sm-4 text-center' style='display: block; background:#428bca;'><font color='white'><i class='material-icons' style='margin-top:5px;'>info_outline</i></font></div>");
                    echo (" <div class='col-sm-12 text-center'id='div_c".$ev->id_event."'  style='display: none; margin-top:5px;'>");
                    ?>
                 
                        <div class="col-sm-12">
                          <div class="col-sm-6">
                            <h6>Data de Inicio: <?= $ev->start_date; ?></h6>
                          </div>

                          <div class="col-sm-6">
                            <h6>Data de Encerramento: <?= $ev->end_date; ?></h6>
                          </div>
                        </div>
                        
                        <div class="col-sm-12">
                          <div class="col-sm-6">
                            <h6>Endereço: <?= $ev->adress; ?></h6>
                          </div>

                          <div class="col-sm-6">
                            <h6>CEP: <?= $ev->cep; ?></h6>
                          </div>
                        </div>
                        
                        <div class="col-sm-12">
                          <div class="col-sm-6">
                            <h6>Telefone: <?= $ev->phone; ?></h6>
                          </div>

                          <div class="col-sm-6">
                            <h6>Bairro: <?= $ev->neighborhood; ?></h6>
                          </div>
                        </div>
                       
                        <div class="col-sm-12">
                          <div class="col-sm-4">
                            <h6>Cidade: <?= $ev->name_city; ?></h6>
                          </div>

                          <div class="col-sm-4">
                            <h6>Estado: <?= $ev->name_state; ?></h6>
                          </div>

                          <div class="col-sm-4">
                            <h6>Entidade: <?= $ev->name_entitie; ?></h6>
                          </div>
                        </div>
                        
                      
                        

                  <?php echo('</div>'); ?>


                  </div>
            </div>
        <?php } ?>  
      </div>
      
   </div>



     <div id="deleteEvent" class="modal fade">
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
                     
                      <button type="button" id='delete_event'  data-dismiss="modal" class="btn btn-primary">Sim</button>
                    
                    
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                  
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
<script type="text/javascript">
 
   
</script>
