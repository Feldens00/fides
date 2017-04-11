 <?php 
   if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }
  ?>  
<div class="row">
  <div class="col-sm-10">
    <h2><font color="#d9d9d9">Alterar Pessoa</font></h2>
  <form action="<?=base_url('update-people'); ?>" method="POST">
    <?php foreach ($peoples as $pp) { ?>
      
  

     <input type="hidden" class="form-control" name="updatePeopleId" value="<?= $pp->id_people;?>">
    <div class="form-group">
      <label for="name"><font color="#d9d9d9">* Nome:</font></label>
      <input type="text" class="form-control" name="updatePeopleName" placeholder="Digite o nome da Pessoa" value="<?= $pp->name_people;?>">
    </div>
    <div class="form-group">
      <label for="name"><font color="#d9d9d9">Data de Nascimento:</font></label>
      <input type="date" class="form-control" name="updatePeopleBirth"  value="<?= $pp->birth; ?>">
    </div>
    
    <div class="form-group"><font color="#d9d9d9">Telefone:</font></label>
      <input type="text" class="form-control" id="fone" name="updatePeoplePhone" value="<?= $pp->phone; ?>" >
    </div>

     <div class="form-group">
      <label for="adress"><font color="#d9d9d9">Endereço:</font></label>
      <input type="text" class="form-control"  name="updatePeopleAdress" value="<?= $pp->adress; ?>" >
    </div>


     <div class="form-group">
      <label for="cep"><font color="#d9d9d9">Cep:</font></label>
      <input type="text" class="form-control" id="cep" name="updatePeopleCep" value="<?= $pp->cep; ?>"  >
    </div>

     <div class="form-group">
      <label for="negh"><font color="#d9d9d9">Bairro:</font></label>
      <input type="text" class="form-control"  name="updatePeopleNeigh" value="<?= $pp->neighborhood; ?>" >
    </div>
      <div class="form-group">
         <label><font color="#d9d9d9">* Estado</font></label>
                         <select name="estado" class="form-control" >
                                  <option value='<?=$pp->id_state;?>'><?= $pp->name_state;?></option>
                                 <?php
                                     foreach($estados as $estado){
                                          echo "<option value='{$estado->id_state}'>{$estado->name_state}</option>";
                                     }
                                 ?>
                             </select>

                           <label><font color="#d9d9d9">Cidade</font></label>
                            <select name="cidade" id="cidade" class="form-control">
                                     <option value='<?=$pp->id_city;?>'><?= $pp->name_city;?></option>
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

                              
    <?php } ?>
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  </div>
</div>