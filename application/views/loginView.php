<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Fides</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

    <style type="text/css">
      .bg-3 { 
      background-color: #ffffff; /* White */
      color: #555555;
      }

      .bg-1{
        background-color: #FB8C00;
        /*background-color: #f4f3ef;*/
      }
      .material-icons.md-200 { font-size: 200px; }
      .material-icons.orange600 { color: #FB8C00; }
    </style>
</head>
<body class="bg-1">

            <nav class="navbar navbar-default">
                          <div class="container-fluid">
                                <div class="row">
                                <div class="col-xs-7">
                                  <img src="<?=base_url('assets/images/logo.png');?>" style="width:100px; height:50px;" class=" img-responsive" alt="Cinque Terre">
                                </div>
                                <div class="col-xs-5">
                                   <ul class="nav navbar-nav navbar-right">
                                      <li class="dropdown">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                                            <p>Entrar</p>
                                            <b class="caret"></b>
                                          </a>
                                          <ul class="dropdown-menu">
                                            <li><a href="#" data-toggle="modal" data-target="#myModal">Logar</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#myModal2" >Cadastrar</a></li>
                                            <li><a href="<?=base_url('login-facebook');?>">Logar com <i class="ti-facebook"></i></a></li>
                                          </ul>
                                      </li>
                                  </ul>
                                </div>
                                </div>
                          </div>
                          <div class="jumbotron bg-3">
                            <div class="container text-center">
                              <div class="col-sm-offset-4" style="margin-top:20px; margin-bottom: 20px;">
                                <img src="<?=base_url('assets/images/logo.png');?>" class=" img-responsive" alt="Cinque Terre">
                              </div>   
                              <p>Software gerenciador de eventos religiosos </p>
                            </div>
                          </div>
                      </nav>

<?php 

   if ($formerror) {
      echo ("<div class=' wow bounceInLeft col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!   </strong>".$formerror."</div>");
    }

?>   
                  <div class="col-sm-12">

                      <div class="container-fluid bg-3 text-center">    
                          <div class="col-sm-3 wow fadeInLeft" data-wow-duration="3s"  style="margin-top:20px; margin-bottom: 20px;">
                            <img src="<?=base_url('assets/images/fe1.jpg');?>" class=" img-rounded img-responsive" alt="Cinque Terre" widht="250px" height="250px">
                          </div>
                          <div class="col-sm-4 col-sm-offset-5 wow fadeInDown"><br><br>
                            <h5>O Fides é um programa para gerenciamentos de eventos religiosos, tem como principal objetivo auxiliar as pessoas a documentar e gerenciar informações destes eventos.</h5>
                          </div>
                      </div>

                      <div class="container-fluid bg-3 text-center" style="margin-top:30px;"> 
                        <div class="col-sm-4 wow fadeInDown" data-wow-duration="3s"><br><br>
                            <h5>Totalmente responsivo, o Fides pode ser utilizao em qualquer plataforma, entre elas smartphones, tablets, notebooks e computadores.</h5>
                          </div>   
                          <div class="col-sm-3 col-sm-offset-4 wow fadeInLeft"  data-wow-duration="3s" style="margin-top:20px; margin-bottom: 20px;" >
                            <img src="<?=base_url('assets/images/responsive.png');?>" class="img-rounded img-responsive" alt="Cinque Terre" widht="250px" height="250px">
                          </div>
                      </div>

                     
                      <div class="container-fluid bg-3 text-center" style="margin-top:30px;">    
                          <div class="col-sm-3 wow fadeInLeft"  data-wow-duration="3s" style="margin-top:20px; margin-bottom: 20px;">
                            <img src="<?=base_url('assets/images/gratuito.png');?>" class="img-rounded img-responsive" alt="Cinque Terre" widht="250px" height="250px">
                          </div>
                          <div class="col-sm-4 col-sm-offset-5 wow fadeInDown" data-wow-duration="3s" ><br><br>
                            <h5>Sem propagandas, taxas de inscrição ou outras cobranças o Fides é 100% gratuito.</h5>
                          </div>
                      </div>

                      <div class="col-sm-12 bg-3 text-center" style="margin-top:30px;">    
                          <div class="col-sm-12" style="margin-top:10px; margin-bottom: 10px;">
                            <h3>Com Fides é possivel:</h3>
                          </div>
                      </div>

                      <div class="col-sm-4" style="margin-top:30px;" >
                        <div class="card">
                            <div class="content">
                              <div class=" text-center wow zoomIn" data-wow-duration="3s" >
                                  <p>Controlar e gerenciar entidades e eventos</p>
                                  <i class="material-icons md-200 orange600">event</i>
                              </div>
                            </div>
                        </div>
                      </div> 

                       <div class="col-sm-4" style="margin-top:30px;" >
                        <div class="card">
                            <div class="content">
                              <div class=" text-center wow zoomIn" data-wow-duration="3s" >
                                  <p>Controlar e gerenciar equipes</p>
                                  <i class="material-icons md-200 orange600">people</i>
                              </div>
                            </div>
                        </div>
                      </div> 

                      <div class="col-sm-4" style="margin-top:30px;" >
                        <div class="card">
                            <div class="content">
                              <div class=" text-center wow zoomIn" data-wow-duration="3s" >
                                  <p>Controlar e gerenciar pessoas</p>
                                  <i class="material-icons md-200 orange600">account_circle</i>
                              </div>
                            </div>
                        </div>
                      </div> 
                   
                      <div class="col-sm-4" style="margin-top:30px;" >
                        <div class="card">
                            <div class="content">
                              <div class=" text-center wow zoomIn" data-wow-duration="3s" >
                                  <p>Controlar e gerenciar despesas</p>
                                  <i class="material-icons md-200 orange600">shopping_cart</i>
                              </div>
                            </div>
                        </div>
                      </div> 

                       <div class="col-sm-4" style="margin-top:30px;" >
                        <div class="card">
                            <div class="content">
                              <div class=" text-center wow zoomIn" data-wow-duration="3s" >
                                  <p>Controlar e gerenciar atividades</p>
                                  <i class="material-icons md-200 orange600">query_builder</i>
                              </div>
                            </div>
                        </div>
                      </div> 

                       <div class="col-sm-4" style="margin-top:30px;" >
                        <div class="card">
                            <div class="content">
                              <div class=" text-center wow zoomIn" data-wow-duration="3s" >
                                  <p>Documentar dados de um evento</p>
                                  <i class="material-icons md-200 orange600">print</i>
                              </div>
                            </div>
                        </div>
                      </div> 

                    </div>
         

              
         
                  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Realizar Login</h4>
        </div>
        <div class="modal-body">
           <form action="<?=base_url('login');?>" method="POST">
              
                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control border-input" name="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                      <label>Senha</label>
                      <input type="password" name="password" class="form-control border-input">
                  </div>
                                        
               
        </div>
        <div class="modal-footer">
                  <div class="col-sm-12">
                      <button type="submit" class="btn btn-default">logar</button>
                  </div>
              
            </form>
        </div>
      </div>
      
    </div>
  </div>



  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cadastrar-se</h4>
        </div>
        <div class="modal-body">
           <form action="<?=base_url('create-user');?>" method="POST">
                  <div class="form-group">
                      <label>Nome</label>
                      <input type="text" class="form-control border-input" name="nameUser" placeholder="Nome">
                  </div>
                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control border-input" name="emailUser" placeholder="Email">
                  </div>
                  <div class="form-group">
                      <label>Senha</label>
                      <input type="password"  name="passwordUser" class="form-control border-input">
                  </div>
                                        
               
        </div>
        <div class="modal-footer">
                  <div class="col-sm-12">
                      <button type="submit" class="btn btn-default">Cadastrar</button>
                  </div>
              
            </form>
        </div>
      </div>
      
    </div>
  </div>
             

</body>
</html>
