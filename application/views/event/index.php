
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
             document.getElementById(div_icone_a).className = 'col-xs-4 text-center';
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
             document.getElementById(div_icone_b).className = 'col-xs-4 text-center';
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
             document.getElementById(div_icone_c).className = 'col-xs-4 text-center';
       }
}

</script>
<div class="row">
  <div class="container-fluid text-center">
      <div class="card">
          <div class="row">
            <div class="col-sm-12">
              <div class="col-sm-4 col-sm-offset-4" >
             <h2>Eventos</h2> 
          </div>

          <div class="col-sm-1" style="margin: 25px;">
               <a href="<?= site_url('create-event-form'); ?>">
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
           <?php foreach($events as $ev) { ?>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <h4><?= $ev->name_event; ?></h4>
                                        </div>
                                </div>
                                <div class="container-fluid">
                                    <hr />
                                    <div class="row"> 
                                        <div class="col-xs-12" style="margin-bottom: 10px;">
                                            <div class="col-xs-8">
                                                <a href="<?= base_url('update-event-form/'.$ev->id_event)?>">
                                                    <button type="button" class="btn btn-default">
                                                          <span class="glyphicon glyphicon-pencil"></span>
                                                    </button>
                                                </a>
                                           
                                                <button type="button" class="btn btn-primary delEvent" data-id="<?php echo $ev->id_event; ?>" >  
                                                  <span class="glyphicon glyphicon-trash">
                                                </button>  
                                            </div>    
                                            
                                            <div class="col-xs-2" >
                                              <a href="<?= base_url('form-event-team/'.$ev->id_event)?>">
                                                 <i class="ti-user">*</i>
                                              </a>
                                            </div>
                                            <!--<div class="col-xs-2">
                                              <a href="<?= base_url('form-event-people/'.$ev->id_event)?>">
                                                 <i class="ti-user"></i>
                                              </a>
                                            </div>-->
                                      
                                        </div>
                                           <?php 
                         
                                            
                                            echo (" <div id='div_icone_a".$ev->id_event."' onclick='mostrarA(".$ev->id_event.")' class='col-xs-4 text-center' style='display: block;' ><i class='ti-angle-down' style='margin-top:5px;'></i></div>");
                                            echo (" <div class='col-sm-12 text-center'id='div_a".$ev->id_event."'  style='display: none; margin-top:5px;'>");
                                            ?>
                                         
                                                <div style="margin-top:10px;" class="col-sm-12">
                                                   <a  href="<?= base_url('event-team/'.$ev->id_event)?>">Visualizar Equipes</a>
                                                </div>

                                               <!-- <div  style="margin-top:10px;" class="col-sm-6">
                                                   <a  href="<?= base_url('event-people/'.$ev->id_event)?>">Visualizar Pessoas</a>
                                                </div>-->

                                                <div style="margin-top:10px;" class="col-sm-6">
                                                   <a  href="<?= base_url('form-event-schedule/'.$ev->id_event)?>">Cronograma</a>
                                                </div>

                                                 
                                              <div style="margin-top:10px;" class="col-sm-6">
                                                   <a  href="<?= base_url('form-list-product/'.$ev->id_event)?>">Lista de Despesas</a>
                                                </div>  
                                              
                                           
                                          <?php echo('</div>'); ?>

                                           <?php 
                         
                                            echo (" <div id='div_icone_b".$ev->id_event."' onclick='mostrarB(".$ev->id_event.")' class='col-xs-4 text-center' style='display: block;'><i class='ti-printer'  style='margin-top:5px;'></i></div>");
                                            echo (" <div class='col-sm-12 text-center'id='div_b".$ev->id_event."'  style='display: none; margin-top:5px;'>");
                                            ?>
                                                                                   
                                                <div style="margin-top:10px;" class="col-sm-6">
                                                   <a  href="<?= base_url('print-quadrante/'.$ev->id_event)?>">Quadrante</a>
                                                </div>

                                                <div style="margin-top:10px;" class="col-sm-6">
                                                      <a href="<?= base_url('print/'.$ev->id_event);?>" >Cronograma</a>
                                                </div>
                                                
                                                <div style="margin-top:10px;" class="col-sm-12">
                                                      <a href="<?= base_url('print-list/'.$ev->id_event);?>" >Lista de Despesas</a>
                                                </div>
                                          <?php echo('</div>'); ?>

                                            <?php 
                         
                                            echo (" <div id='div_icone_c".$ev->id_event."' onclick='mostrarC(".$ev->id_event.")' class='col-xs-4 text-center' style='display: block;'><i class='ti-info' style='margin-top:5px;'></i></div>");
                                            echo (" <div class='col-sm-12 text-center'id='div_c".$ev->id_event."'  style='display: none; margin-top:5px;'>");
                                            ?>
                                                   <div class="col-sm-12">
                                                    <p><font size="2"> Inicio: <?= $ev->start_date; ?> / Final: <?= $ev->end_date; ?></font></p>
                                                  </div>

                                                  <div class="col-sm-12">
                                                    <p><font size="2">CEP: <?= $ev->cep; ?></font></p>
                                                  </div>
                                                   

                                                  <div class="col-sm-12">
                                                    <p><font size="2">Telefone: <?= $ev->phone; ?></font></p>
                                                  </div>

                                                  <div class="col-sm-12">
                                                    <p><font size="2"> Bairro: <?= $ev->neighborhood; ?> / Endereço: <?= $ev->adress; ?></font></p>
                                                  </div>

                                                  <div class="col-sm-12">
                                                    <p><font size="2">Cidade: <?= $ev->name_city; ?> / <?= $ev->name_state; ?></font></p>
                                                  </div>
                                            
                                                  <div class="col-sm-12">
                                                    <p><font size="2">Entidade: <?= $ev->name_entitie; ?></font></p>
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

