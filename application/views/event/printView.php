<!DOCTYPE html>
<html>
<head>
	<title>Fides</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css');?>">
  <script src="<?= base_url('assets/js/jquery-3.1.0.js');?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
  <style type="text/css">
  	.div-barra {
      
      border-bottom-width: 2px; 
      border-bottom-style: solid; 
      border-bottom-color:#333;
      padding-bottom:20px;
    }
  </style>
</head>
<body>
	<div class="col-sm-12">
		<h2>Atividades</h2>
	
	
		<table class=" table table-bordered">
		    <thead>
		      <tr>
		        <th>Nome</th>
		        <th>Descrição</th>
		        <th>Horário</th>
		      </tr>
		    </thead>
		     	<?php foreach ($all as $act) { ?>
		    <tbody>
		      <tr>
		        <td><h6><?= $act->name_activitie;?></h6></td>
		        <td><h6><?= $act->description;?></h6></td>
		        <td><h6><?= $act->horary;?></h6></td>
			  </tr>
		    </tbody>
		    	<?php } ?>
		  </table>
		

	</div>
</body>
</html>