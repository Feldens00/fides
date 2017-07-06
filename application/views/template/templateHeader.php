<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Fides</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
 

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?=base_url("assets/css/animate.css");?>">
    <link href="<?= base_url('assets/css/paper-dashboard.css');?>" rel="stylesheet"/>
    <script src="<?= base_url('assets/js/jquery-3.1.0.js');?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/jquery.maskedinput.js');?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/utilidade.js');?>"></script>
    <script src="<?=base_url('assets/wow/dist/wow.min.js');?>"></script>
 
    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script   type="text/javascript" src="<?= base_url('assets/js/paper-dashboard.js');?>"></script>
    
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?= base_url('assets/css/themify-icons.css');?>" rel="stylesheet">
     
    <script>
        new WOW().init();
    </script>

    <script type="text/javascript">
        var path = '<?php echo site_url(); ?>'
    </script>

</head>
<body>

<div class="wrapper">
  <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
    Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
    Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
  -->

      <div class="sidebar-wrapper">
            <div class="logo">
                <a href="entitie" class="simple-text">
                    <img src="<?=base_url('assets/images/logo.png');?>" style="width:100px; height:50px;" class=" img-responsive" alt="Cinque Terre">
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="<?= base_url('entitie');?>">
                        <i class="ti-pie-chart"></i>
                        <p>Entidades</p>
                    </a>
                </li>
            
                <li class="active">
                    <a href="<?= base_url('event');?>">
                        <i class="ti-calendar"></i>
                        <p>Eventos</p>
                    </a>
                </li>
            
                <li class="active">
                    <a href="<?= base_url('team');?>">
                        <i class="ti-user">*</i>
                        <p>Equipes</p>
                    </a>
                </li>

                <li class="active">
                    <a href="<?= base_url('people');?>">
                        <i class="ti-user"></i>
                        <p>Pessoas</p>
                    </a>
                </li>

                <li class="active">
                    <a href="<?= base_url('product');?>">
                        <i class="ti-shopping-cart"></i>
                        <p>Produtos</p>
                    </a>
                </li>

                <li class="active">
                    <a href="<?= base_url('activitie');?>">
                        <i class="ti-time"></i>
                        <p>Atividades</p>
                    </a>
                </li>

            </ul>
      </div>
    </div>

    <div class="main-panel">
    <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                      <a class="navbar-brand" href="#"> <?= $this->session->userdata('email')?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?=base_url('logout');?>">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                <p>Sair</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row" id="content">
                  <?php echo $contents ?>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                    </ul>
                </nav>
        <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>  
</html>
