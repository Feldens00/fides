 <?php 
   if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }
  ?>     
  <div class="row">
    <div class="col-sm-10">
        <h2><font color="#d9d9d9">Adicionar Equipe</font></h2>
     
        <form action="create-team" method="POST">
          <div class="form-group">
            <label for="name"><font color="#d9d9d9">* Nome:</font></label>
            <input type="text" class="form-control" name="teamName" placeholder="Digite o nome da Equipe">
          </div>
          <!--<div class="form-group">
             <label><font color="#d9d9d9">* Evento</font></label>
                             <select name="teamEvent" class="form-control" >
                                      <option value=''>Selecione um evento</option>
                                     <?php
                                         foreach($events as $ev)
                                         
                                        echo "<option value='{$ev->id_event}'>{$ev->name_event}</option>";
                                     ?>
                                 </select>

                                    
          </div>-->
            
          <button type="submit" class="btn btn-default">Enviar</button>
        </form>
    </div>
  </div>
