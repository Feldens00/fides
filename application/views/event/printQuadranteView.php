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
      
      border-bottom-width: 1px; 
      border-bottom-style: solid; 
      border-bottom-color:#333;
      padding-bottom:20px;

    }
  </style>
</head>
<body>

	 <?php foreach ($peoplesTeams as $pt) { ?>

	 <div class="col-sm-12">

		<?php
		 	$name_team;

		 	if ($name_team != $pt->name_team) {
		 		$name_team = $pt->name_team;
		 		echo("<h2>Equipe ".$name_team."</h2>");
		 	}
		 ?> 
	</div>
	
	
		 <table class=" table table-bordered">
		    <tbody>
		      <tr>
		        <td><h6>Nome: <?= $pt->name_people;?></h6></td>
		        <td>Email: <?= $pt->email;?></td>
			  </tr>
		
		      <tr>
		        <td><h6>Cidade: <?=$pt->name_city;?></h6></td>
		        <td><h6>Estado: <?=$pt->name_state;?></h6></td>
		      </tr>
		    </tbody>
		  </table>
		

	</div>
	<?php } ?>

	<?php foreach ($peoplesEvents as $pe) { ?>
	<div class="col-sm-12">
		<h2>Pessoas sem Equipe definida</h2>
	</div>

		 <table class=" table table-bordered">
		   <tbody>
		      <tr>
		        <td><h6>Nome: <?= $pe->name_people;?></h6></td>
		        <td>Email: <?= $pe->email;?></td>
			  </tr>
		
		      <tr>
		        <td><h6>Cidade: <?=$pe->name_city;?></h6></td>		      
		        <td><h6>Estado: <?=$pe->name_state;?></h6></td>
		      </tr>
		    </tbody>
		  </table>
	<?php } ?>
</body>
</html>