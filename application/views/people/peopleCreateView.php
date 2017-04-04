<div class="row">
  <div class="col-sm-10">
      <h2><font color="#d9d9d9">Adicionar Pessoa</h2>
    <?php 
      if ($formerror) {
        echo "<p><font color='#d9d9d9'>".$formerror."</font></p>";
      }
    ?>    
    <form action="create-people" method="POST">
      <div class="form-group">
        <label for="name"><font color="#d9d9d9">* Nome:</font></label>
        <input type="text" class="form-control" name="peopleName" placeholder="Digite o nome da Pessoa">
      </div>
      <div class="form-group">
        <label for="name"><font color="#d9d9d9">Data de Nascimento:</font></label>
        <input type="date" class="form-control" name="peopleBirth" >
      </div>
      
      <div class="form-group">
        <label for="date2"><font color="#d9d9d9">Telefone:</font></label>
        <input type="text" class="form-control" id="fone" name="peoplePhone" >
      </div>

       <div class="form-group">
        <label for="adress"><font color="#d9d9d9">Endereço:</font></label>
        <input type="text" class="form-control"  name="peopleAdress" >
      </div>


       <div class="form-group">
        <label for="cep"><font color="#d9d9d9">Cep:</font></label>
        <input type="text" class="form-control" id="cep" name="peopleCep" >
      </div>

       <div class="form-group">
        <label for="negh"><font color="#d9d9d9">Bairro:</font></label>
        <input type="text" class="form-control"  name="peopleNeigh" >
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
        
        <!--<div class="form-group">
          <label><font color="#d9d9d9">* Entidade</font></label>
                         <select name="team" class="form-control" >
                                  <option value=''>Selecione uma Equipe</option>
                                 <?php
                                     foreach($teams as $tm)
                                     
                                    echo "<option value='{$tm->id_team}'>{$tm->name_team}</option>";
                                 ?>
                             </select>

        </div>-->
                                
      <button type="submit" class="btn btn-default">Enviar</button>
    </form>
  </div>
</div>