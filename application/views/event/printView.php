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
	</div>
	 <?php foreach ($all as $act) { ?>
		
		 <table class=" table table-bordered">
		    <tbody>
		      <tr>
		        <td><h6>Nome: <?= $act->name_activitie;?></h6></td>
		        <td>Descrição: <?= $act->description;?></td>
			  </tr>
		
		      <tr>
		        <td><h6>Horário: <?= $act->horary;?></h6></td>
		      </tr>
		    </tbody>
		  </table>
		

	</div>
	<?php } ?>
</body>
</html>