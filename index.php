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
      <section class="container" style="padding:10px;">
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />
        </div>
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />

        </div>
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />

        </div>
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />

        </div>
      </section>
      <section class="container" style="padding:10px;">
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />
        </div>
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />

        </div>
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />

        </div>
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />

        </div>
      </section>
      <section class="container" style="padding:10px;">
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />
        </div>
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />

        </div>
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />

        </div>
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />

        </div>
      </section>
      <section class="container" style="padding:10px;">
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />
        </div>
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />

        </div>
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />

        </div>
        <div class="col-sm-3">
          <img src="img/HayLeyenda.jpg" class="peli" />

        </div>
      </section>
    </div>
  </div>
</div>



<?php footer(); ?>


</body>
</html>