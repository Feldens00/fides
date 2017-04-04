
<div class="row">
  <div class="col-sm-10">
    <h2><font color="#d9d9d9">Adicionar Entidade</font></h2> 
  <?php 
    if ($formerror) {
      echo "<p>".$formerror."</p>";
    }
  ?>    
  <form action="create-entitie" method="POST">
    <div class="form-group">
      <label for="name"><font color="#d9d9d9">* Nome:</font></label>
      <input type="text" class="form-control" name="entitieName" placeholder="Digite o nome da entidade">
    </div>
    <div class="form-group">
      <label for="phone"><font color="#d9d9d9">* Telefone:</font></label>
      <input type="text" class="form-control" id="fone" name="entitiePhone" >
    </div>
   
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  </div>
  
</div>