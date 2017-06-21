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
	
		 <table class=" table table-bordered">
		  <?php
		  		foreach ($peoplesTeams as $pt) { ?>


		<?php
		 	$name_team;

		 	if ($name_team != $pt->name_team) {
		 		$name_team = $pt->name_team;
		 		echo("<thead>
		 					
		 					<tr>
		 						<th style='padding-bottom: 5px; padding-top: 5px;' align=center colspan='4' >
		 							<h2>".$name_team."</h2>
		 						</th>
		 					</tr>
		 					
		 					<tr>
		 						<th><b>Nome</b></td>
		 						<th><b>Email</b></td>
		 						<th><b>Cidade</b></td>
		 						<th><b>Estado</b></td>
		 					</tr>
		 			   </thead>");
		 	}
		 ?> 
		    <tbody>
		      <tr>
		        <td><?= $pt->name_people;?></td>
		        <td><?= $pt->email;?></td>
		        <td><?=$pt->name_city;?></td>
		        <td><?=$pt->name_state;?></td>
		      </tr>
		    </tbody>
		    <?php } ?>
		  </table>
		

	</div>
	

	<?php foreach ($peoplesEvents as $pe) { ?>
	<div class="col-sm-12">
		<h2>Pessoas sem Equipe definida</h2>
	</div>

		 <table class=" table table-bordered">
		 	<thead>
		 					
		 					<tr>
		 						<td><b>Nome</b></td>
		 						<td><b>Email</b></td>
		 						<td><b>Cidade</b></td>
		 						<td><b>Estado</b></td>
		 					</tr>
		 			   </thead>
		   <tbody>
		      <tr>
		        <td><?= $pe->name_people;?></td>
		        <td><?= $pe->email;?></td>
		        <td><?=$pe->name_city;?></td>		      
		        <td><?=$pe->name_state;?></td>
			  </tr>
		    </tbody>
		  </table>
	<?php } ?>
</body>
</html>