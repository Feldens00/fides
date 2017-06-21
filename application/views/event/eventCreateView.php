 <?php 
   if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }
  ?>  
<div class="row">
  <div class="col-sm-10">
    <h2><font color="#d9d9d9">Adicionar Evento</font></h2>
   
  <form action="create-event" method="POST">
    <div class="form-group">
      <label for="name"><font color="#d9d9d9">* Nome:</font></label>
      <input type="text" class="form-control" name="eventName" placeholder="Digite o nome do evento">
    </div>
    <div class="form-group">
      <label for="name"><font color="#d9d9d9">Data de Inicio:</font></label>
      <input type="date" class="form-control" name="eventStartDate" >
    </div>
    
    <div class="form-group">
      <label for="date1"><font color="#d9d9d9">Data de Termino:</font></label>
      <input type="date" class="form-control" name="eventEndDate" >
    </div>
    
    <div class="form-group">
      <label for="date2"><font color="#d9d9d9">Telefone:</font></label>
      <input type="text" class="form-control" id="fone" name="eventPhone" >
    </div>

     <div class="form-group">
      <label for="adress"><font color="#d9d9d9">Endereço:</font></label>
      <input type="text" class="form-control"  name="eventAdress" >
    </div>


     <div class="form-group">
      <label for="phone"><font color="#d9d9d9">Cep:</font></label>
      <input type="text" class="form-control" id="cep" name="eventCep" >
    </div>

     <div class="form-group">
      <label for="phone"><font color="#d9d9d9">Bairro:</font></label>
      <input type="text" class="form-control"  name="eventNeigh" >
    </div>

    <div class="form-group">
       <label for="phone"><font color="#d9d9d9">Valor da Inscrição:</font></label>
        <input type="text" class="form-control" id="money"  name="eventInscription" required>
    </div>

    <div class="form-group">
      <label><font color="#d9d9d9">* Estado</font></label>
                       <select name="estado" class="form-control" >
                               <?php
                                   foreach($estados as $estado)
                                   
                                  echo "<option value='{$estado->id_state}'>{$estado->name_state}</option>";
                               ?>
                           </select>

                         <label><font color="#d9d9d9">* Cidade</font></label>
                          <select name="cidade" id="cidade" class="form-control">
                                 <option value="">Escolha um estado</option>
                          </select>
    </div>
    <div class="form-group">

        <label><font color="#d9d9d9">* Entidade</font></label>
                           <select name="entitie" class="form-control" >
                                    <option value=''>Selecione uma entidade</option>
                                   <?php
                                       foreach($entities as $entitie)
                                       
                                      echo "<option value='{$entitie->id_entitie}'>{$entitie->name_entitie}</option>";
                                   ?>
                               </select>
    </div>
                              
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  </div>
  
</div>