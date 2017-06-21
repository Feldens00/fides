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

<?php foreach ($maxProduct as $max) { 
	$totalProduct = $max->total;
	}

	foreach ($total as $tt) {
		  			$totalInscription = $tt->amount_inscription;
	}
?>

	
		
		 <table class=" table table-bordered">
		    <thead>
		      <tr>
		      	<th colspan="4"><h5>Total arrecadado com inscrições</h5></th>
		        <th><h4>R$<?=$totalInscription;?></h4></th>
		      </tr>
		      <tr>
		        <th colspan="4"><h5>Total da Lista</h5></th>
		        <th><h4>R$<?=$totalProduct;?></h4></th>
		      </tr>
		      <tr>
		        <th>Nome</th>
		        <th>Tipo</th>
		        <th>Quantidade</th>
		        <th>Valor Unitario</th>
		        <th>Total por Produto</th>
		      </tr>
		    </thead>
		     	<?php foreach ($all as $pd) { ?>
		    <tbody>
		      <tr>
		        <td><h6><?= $pd->name_product;?></h6></td>
		        <td><?= $pd->type;?></td>
		        <td><h6><?= $pd->quantity;?></h6></td>
		        <td><h6>R$<?= $pd->unitary_value;?></h6></td>
		        <td><h6>R$<?= $pd->amount;?></h6></td>
			  </tr>
		    </tbody>
		    	<?php } ?>
		  </table>
		

	</div>
</body>
</html>