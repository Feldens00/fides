

  <?php 
   if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }

  ?>     <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Adicionar Entidade</h4>
                               
                            </div>
                            <div class="content">
                             <form action="create-entitie" method="POST">
                             
                                <div class="form-group">
                                  <label for="name">* Nome:</label>
                                  <input type="text" class="form-control  border-input" name="entitieName" placeholder="Digite o nome da entidade">
                                </div>

                                <div class="form-group">
                                  <label for="name">* Responsavel:</label>
                                  <input type="text" class="form-control  border-input" name="entitieResponsible" placeholder="Digite o nome do Responsavel pela entidade">
                                </div>

                                <div class="form-group">
                                  <label for="phone">* Telefone:</label>
                                  <input type="text" class="form-control  border-input" id="fone" name="entitiePhone" >
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

 
