

<?php 
      if ($formerror) {
      echo ("<div class=' col-sm-3 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }
    ?>    
<div class="row">
  <div class="col-sm-10">
     <h2><font color="#d9d9d9">Alterar Evento</font></h2>
    <form action="<?= base_url('update-event');?>" method="POST">
      
      <?php
          foreach ($events as $ev){ 
      ?>
          
      <input type="hidden" class="form-control" name="updateEventId" value="<?= $ev->id_event; ?>">
      <div class="form-group">

        <label for="name"><font color="#d9d9d9">* Nome:</font></label>
        <input type="text" class="form-control" name="updateEventName" 
        placeholder="Digite o nome do evento" value="<?= $ev->name_event; ?>">
      </div>
      <div class="form-group">
        <label for="name"><font color="#d9d9d9">Data de Inicio:</font></label>
        <input type="date" class="form-control" name="updateEventStartDate" value="<?= $ev->start_date; ?>">
      </div>
      
      <div class="form-group">
        <label for="date1"><font color="#d9d9d9">Data de Termino:</font></label>
        <input type="date" class="form-control" name="updateEventEndDate" value="<?= $ev->end_date; ?>">
      </div>
      
      <div class="form-group">
        <label for="date2"><font color="#d9d9d9">Telefone:</font></label>
        <input type="text" class="form-control" id="fone" name="updateEventPhone" value="<?= $ev->phone; ?>">
      </div>

       <div class="form-group">
        <label for="adress"><font color="#d9d9d9">Endereço:</font></label>
        <input type="text" class="form-control"  name="updateEventAdress" value="<?= $ev->adress; ?>">
      </div>


       <div class="form-group">
        <label for="phone"><font color="#d9d9d9">Cep:</font></label>
        <input type="text" class="form-control" id="cep" name="updateEventCep" value="<?= $ev->cep; ?>">
      </div>

       <div class="form-group">
        <label for="phone"><font color="#d9d9d9">Bairro:</font></label> 
        <input type="text" class="form-control"  name="updateEventNeigh" value="<?= $ev->neighborhood; ?>">
      </div>
        <div class="form-group">
          <label><font color="#d9d9d9">* Estado</font></label>      
                         <select name="estado" class="form-control" >
                                  <option value='<?=$ev->id_state;?>'><?= $ev->name_state;?></option>
                                 <?php
                                     foreach($estados as $estado){
                                          echo "<option value='{$estado->id_state}'>{$estado->name_state}</option>";
                                     }
                                 ?>
                             </select>

                           <label><font color="#d9d9d9">Cidade</font></label>
                            <select name="cidade" id="cidade" class="form-control">
                                     <option value='<?=$ev->id_city;?>'><?= $ev->name_city;?></option>
                            </select>
        </div>
        
        <div class="form-group">
           <label><font color="#d9d9d9">* Entidade</font></label>
                         <select name="entitie" class="form-control" >
                                    <option value='<?=$ev->id_entitie;?>'><?= $ev->name_entitie;?></option>
                                 <?php
                                     foreach($entities as $entitie){
                                      echo "<option value='{$entitie->id_entitie}'>{$entitie->name_entitie}</option>";
                                     }
                                       
                                   ?>
                          </select>
        </div>
                      
     <?php  } ?>
      <button type="submit" class="btn btn-default">Enviar</button>
    </form>
  </div>
  
</div>