  <?php 

   if ($formerror) {
      echo ("<div class='row'><div class='wow bounceInUp col-sm-6 col-sm-offset-3 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!   </strong>".$formerror."</div></div>");
    }

  ?>   
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Alterar Pessoa</h4>
                               
                            </div>
                            <div class="content">
                               <form action="<?=base_url('update-people'); ?>" method="POST">
                              <?php foreach ($peoples as $pp) { ?>
                                
                            

                               <input type="hidden" class="form-control" name="updatePeopleId" value="<?= $pp->id_people;?>">
                              <div class="form-group">
                                <label for="name">* Nome:</label>
                                <input type="text" class="form-control border-input" name="updatePeopleName" placeholder="Digite o nome da Pessoa" value="<?= $pp->name_people;?>">
                              </div>
                              <div class="form-group">
                                <label for="name">Data de Nascimento:</label>
                                <input type="date" class="form-control border-input" name="updatePeopleBirth"  value="<?= $pp->birth; ?>">
                              </div>
                              
                              <div class="form-group">Telefone:</label>
                                <input type="text" class="form-control border-input" id="fone" name="updatePeoplePhone" value="<?= $pp->phone; ?>" >
                              </div>

                               <div class="form-group">
                                <label for="adress">Endereço:</label>
                                <input type="text" class="form-control border-input"  name="updatePeopleAdress" value="<?= $pp->adress; ?>" >
                              </div>


                               <div class="form-group">
                                <label for="cep">Cep:</label>
                                <input type="text" class="form-control border-input" id="cep" name="updatePeopleCep" value="<?= $pp->cep; ?>"  >
                              </div>

                               <div class="form-group">
                                <label for="negh">Bairro:</label>
                                <input type="text" class="form-control border-input"  name="updatePeopleNeigh" value="<?= $pp->neighborhood; ?>" >
                              </div>
                                <div class="form-group">
                                   <label>* Estado</label>
                                                   <select name="estado" class="form-control border-input" >
                                                            <option value='<?=$pp->id_state;?>'><?= $pp->name_state;?></option>
                                                           <?php
                                                               foreach($estados as $estado){
                                                                    echo "<option value='{$estado->id_state}'>{$estado->name_state}</option>";
                                                               }
                                                           ?>
                                                       </select>

                                                     <label>Cidade</label>
                                                      <select name="cidade" id="cidade" class="form-control border-input">
                                                               <option value='<?=$pp->id_city;?>'><?= $pp->name_city;?></option>
                                                      </select>
                                </div>
                                 <?php } ?>
                                <div class="form-group text-center">
                                  <button type="submit" class="btn btn-default">Enviar</button>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
