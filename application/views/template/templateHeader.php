<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fides</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css');?>">
  <script src="<?= base_url('assets/js/jquery-3.1.0.js');?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/jquery.maskedinput.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/utilidade.js');?>"></script>
  
  <script type="text/javascript">

    var path = '<?php echo site_url(); ?>'

  </script>

  <style type="text/css">
 
  /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #333;

      height: 100%;
    }

    .div-mold{
      background:#555;
      margin:10px;  
      
      padding:10px;
      -moz-border-radius:7px;
      -webkit-border-radius:7px;
    }
    
    .div-barra {
      
      border-bottom-width: 2px; 
      border-bottom-style: solid; 
      border-bottom-color:#555;
      padding-bottom:20px;
    }
    
    .background-dark{
       background-color: #333;
    }
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body class="background-dark">

<div class="container-fluid" style="margin-top:50px">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <div class="col-sm-12 div-barra">
        <i>
          <h4>
            <font color="#d9d9d9">Fides</font>
          </h4>
        </i>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="<?= base_url(''); ?>"><i class="material-icons">account_balance</i> Entidades</a></li>
          <li><a href="<?= base_url('event'); ?>"> <i class="material-icons">event</i> Eventos</a></li>
          <li><a href="<?= base_url('team'); ?>"> <i class="material-icons">group</i> Equipes</a></li>
          <li><a href="<?= base_url('people'); ?>"> <i class="material-icons">person</i> Pessoas</a></li>
        </ul><br>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search Blog..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>
        </div>
      </div>
    </div>

    <div id="contents" class="col-sm-10">
        <?php echo $contents ?>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
