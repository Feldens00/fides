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
                                <h4 class="title">Adicionar Equipe</h4>
                               
                            </div>
                            <div class="content">
                             <form action="create-team" method="POST">
                                <div class="form-group">
                                  <label for="name">* Nome:</label>
                                  <input type="text" class="form-control border-input" name="teamName" placeholder="Digite o nome da Equipe">
                                </div>

                                <div class="form-group">
                                  <label for="description">Descrição:</label>
                                  <input type="text" class="form-control border-input" name="teamDescription" placeholder="Digite a descrição">
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
