<!DOCTYPE html>
<html>
<head>
	<title></title>
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
<div class="container">
	<div class="col-sm-12">
		 <?php foreach ($events as $ev) { ?> 
		<h2>Cronograma do Evento <?= $ev->name_event;?></h2>
		<?php } ?>
	</div>
	
	<div class="col-sm-12">
	<h3>Atividades</h3>
	<?php foreach ($all as $al) { ?> 
		<div class="col-sm-8 div-barra" >
			<div class="col-sm-12"><h4>Nome: <?= $al->name_activitie;?></h4></div>
			<div class="col-sm-12"><h4>Descrição: <?= $al->description;?></h4></div>
			<div class="col-sm-12"><h4>Horario: <?= $al->horary;?></h4></div>
		</div>
	<?php } ?>
	</div>
</div>
</body>
</html>