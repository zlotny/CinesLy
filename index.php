<?php 
include "cabecera.php"; 

?>
<html>
<head>
  <meta charset="utf-8">
  <title>CinesLy</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/jssor.slider.min.js"></script>
  <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
  <script src="js/alertify/lib/alertify.min.js"> </script>
  <script type="text/javascript" src="js/general.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link href="style/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
  <link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />


</head>
<body id="index_body">
  <div class="row">
    <?php  
    cabeceraIndex(); 
    if($_REQUEST["login"] == "bad"){
      echo "<script>
      alertify.log('Inicio de sesión erróneo, comprueba que has introducido bien todos tus datos', 'error', 5000);
    </script>";
  }

  if($_REQUEST["sesion"] == "bad"){
    echo "<script>
    alertify.log('Para utilizar CinesLy, primero debes iniciar sesión', 'error', 5000);
  </script>";
}

?>
</div>


<div class="row">
  <?php  include "slider/slider.php"; ?>
</div>



<div id="third" >
  <div id="second" >
    <div id="first" >

      <div class="seccion center-text" style="opacity: 0.95;">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <h1>CinesLy</h1>
          <h3 class="near-top">Disfruta del cine, en compañía</h3>
          </div>
          <div class="col-md-1"></div>
        </div>

        <div class="seccion-small center-text" style="background-color:rgba(44, 62, 80,0.2); color:black; ">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <h1 class="text-weight-bold">Actualmente en cartelera</h1>
          </div>
          <div class="col-md-1"></div>
        </div>

        <div style="display:inline"><input type="button" class="btn btn-info" data-toggle="modal" data-target="#lot" value="Comprobar Loteria"></input></div>
        <div id="lot" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 style="font-family: 'tahoma';font-size:16px !important; line-height:20px;margin-top:5px; padding-bottom:5px;">Comprueba tu número de <a href="http://loteria.rtve.es/" title="Loter&iacute;a de Navidad">Lotería de Navidad</a></h3>
            </div>
            <div class="modal-body">
              <iframe frameborder="0" width="100%" height="130px" src="http://www.rtve.es/comunes/loteria-navidad/2014/comprobarNumeroForm.html"></iframe>
         
            </div>
          </div>
        </div>
        </div>
        <section class="container" style="padding:10px;">
          <div class="col-md-1"></div>
          <div class="col-sm-2">
            <img src="img/HayLeyenda.jpg" class="peli" />
          </div>
          <div class="col-sm-2">
            <img src="img/HayLeyenda.jpg" class="peli" />
          </div>
          <div class="col-sm-2">
            <img src="img/HayLeyenda.jpg" class="peli" />
          </div>
          <div class="col-sm-2">
            <img src="img/HayLeyenda.jpg" class="peli" />
          </div>
          <div class="col-sm-2">
            <img src="img/HayLeyenda.jpg" class="peli" />
          </div>
          <div class="col-md-1"></div>
        </section>

        <div class="seccion center-text" style="opacity: 0.95;">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <h1>CinesLy</h1>
            <h3 class="near-top">Disfruta del cine, en compañía</h3>
            </div>
            <div class="col-md-1"></div>
          </div>

        </div>
      </div>
    </div>



    <?php footer(); ?>


  </body>
  </html>