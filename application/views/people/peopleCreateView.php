 <?php 
   if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }
  ?>  





<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Adicionar Pessoa</h4>
                               
                            </div>
                            <div class="content">
                                <form action="create-people" method="POST">
                                <div class="form-group">
                                  <label for="name">* Nome:</label>
                                  <input type="text" class="form-control border-input" name="peopleName" placeholder="Digite o nome da Pessoa">
                                </div>
                                <div class="form-group">
                                  <label for="name">Data de Nascimento:</label>
                                  <input type="date" class="form-control border-input" name="peopleBirth" >
                                </div>
                                
                                <div class="form-group">
                                  <label for="date2">Telefone:</label>
                                  <input type="text" class="form-control border-input" id="fone" name="peoplePhone" >
                                </div>

                                 <div class="form-group">
                                  <label for="adress">Endereço:</label>
                                  <input type="text" class="form-control border-input"  name="peopleAdress" >
                                </div>


                                 <div class="form-group">
                                  <label for="cep">Cep:</label> 
                                  <input type="text" class="form-control border-input" id="cep" name="peopleCep" >
                                </div>

                                 <div class="form-group">
                                  <label for="negh">Bairro:</label>
                                  <input type="text" class="form-control border-input"  name="peopleNeigh" >
                                </div>
                                  <div class="form-group">
                                     <label>* Estado</label>
                                                     <select name="estado" class="form-control border-input" >
                                                             <?php
                                                                 foreach($estados as $estado)
                                                                 
                                                                echo "<option value='{$estado->id_state}'>{$estado->name_state}</option>";
                                                             ?>
                                                         </select>

                                                       <label>* Cidade</label>
                                                        <select name="cidade" id="cidade" class="form-control border-input">
                                                               <option value="">Escolha um estado</option>
                                                        </select>
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
