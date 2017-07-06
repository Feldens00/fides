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
                                <h4 class="title">Adicionar Evento</h4>
                               
                            </div>
                            <div class="content">
                              <form action="create-event" method="POST">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="name">* Nome:</label>
                                      <input type="text" class="form-control border-input" name="eventName" placeholder="Digite o nome do evento">
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label for="name">Data de Inicio:</label>
                                      <input type="date" class="form-control border-input" name="eventStartDate" >
                                    </div>
                                  </div>
                                 
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label for="date1">Data de Termino:</label>
                                      <input type="date" class="form-control border-input" name="eventEndDate" >
                                    </div>
                                  </div>
                                 
                                </div>
                                  <div class="row">

                                    <div class="col-sm-2">
                                      <div class="form-group">
                                        <label for="date2">Telefone:</label>
                                        <input type="text" class="form-control border-input" id="fone" name="eventPhone" >
                                      </div>
                                    </div>

                                     <div class="col-sm-2">
                                       <div class="form-group">
                                          <label for="phone">Cep:</label>
                                          <input type="text" class="form-control border-input" id="cep" name="eventCep" >
                                        </div>
                                     </div>

                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label for="adress">Endereço:</label>
                                        <input type="text" class="form-control border-input"  name="eventAdress" >
                                      </div>
                                    </div>

                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label for="phone">Bairro:</label>
                                        <input type="text" class="form-control border-input"  name="eventNeigh" >
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">

                                    <div class="col-sm-3">
                                      <div class="form-group">
                                          <label>* Estado</label>
                                                           <select name="estado" class="form-control border-input" >
                                                                   <?php
                                                                       foreach($estados as $estado)
                                                                       
                                                                      echo "<option value='{$estado->id_state}'>{$estado->name_state}</option>";
                                                                   ?>
                                                               </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                      <div class="form-group">
                                        <label>* Cidade</label>
                                              <select name="cidade" id="cidade" class="form-control border-input">
                                                <option value="">Escolha um estado</option>
                                              </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">

                                            <label>* Entidade</label>
                                                               <select name="entitie" class="form-control border-input" >
                                                                        <option value=''>Selecione uma entidade</option>
                                                                       <?php
                                                                           foreach($entities as $entitie)
                                                                           
                                                                          echo "<option value='{$entitie->id_entitie}'>{$entitie->name_entitie}</option>";
                                                                       ?>
                                                                   </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                           <label for="phone">Valor da Inscrição:</label>
                                            <input type="text" class="form-control border-input" id="money"  name="eventInscription">
                                        </div>
                                    </div>
                                  </div>
 
                                
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