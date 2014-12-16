<?php include "cabecera.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap Carousel Component Slider/Slideshow/Gallery/Banner</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="style/style.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <?php cabeceraPantallaPrincipal(); ?>
  <!-- CABECERA 
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
              <div class="container container-fluid">
              <form class="navbar-form navbar-right" role="search">           
                <a href="perfil.html" class="btn btn-info" >Perfil</a>
                <a href="amigos.html" class="btn btn-info">Amigos</a>
                <a href="catalogo.html" class="btn btn-info">Catálogo</a>
              </form>
              </div>
          </nav>
        </div>
      </div>
    </div>-->
          
          <!-- 1ºAmigo-->
          <div class="col-md-12" id="test">
            <div class="container top-margin">
              <div class="col-md-2">
                <img src="img/logo.png" width="150px" height="150px" class="img-rounded">
              </div>
        
              <div class="col-md-2" id="test">
                <table>
                  <tr><td><label for="Nombre Usuario" class="col-lg control-label">Nombre Amigo</label></td></tr>
                  <tr><td><label for="Correo" class="col-lg control-label">Correo</label></td></tr>
                </table>
              </div>
              
              <div class="col-md-2 col-md-offset-6" id="test">
                <a href="eliminar.html" class="btn btn-info" >Eliminar Amigo</a>
              </div>
            </div>
          </div>

          <!-- 2º Amigo-->
          <div class="col-md-12" id="test">
            <div class="container top-margin">
              <div class="col-md-2">
                <img src="img/logo.png" width="150px" height="150px" class="img-rounded">
              </div>
        
              <div class="col-md-2" id="test">
                <table>
                  <tr><td><label for="Nombre Usuario" class="col-lg control-label">Nombre Amigo</label></td></tr>
                  <tr><td><label for="Correo" class="col-lg control-label">Correo</label></td></tr>
                </table>
              </div>
              
              <div class="col-md-2 col-md-offset-6" id="test">
                <a href="eliminar.html" class="btn btn-info" >Eliminar Amigo</a>
              </div>
            </div>
          </div>
  
          <!-- Boton de mierda-->
          <div class="col-md-12" id="test">
            <div class="container top-margin">
              <div class="col-md-2 col-md-offset-10" id="test">
                  <a href="eliminar.html" class="btn btn-info" >Añadir Amigo</a>
              </div>
            </div>
          </div>



          

          
      
      
      
</body>


  
  
  
<script src="javascript/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>