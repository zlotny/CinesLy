<?php 
include "cabecera.php"; 

?>
<html>
<head>
  <meta charset="utf-8">
  <title>CinesLy</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link href="style/style.css" rel="stylesheet" />
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/jssor.slider.min.js"></script>
  <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
  <script type="text/javascript" src="js/general.js"></script>


</head>
<body>
  <div class="row">
    <?php  cabeceraIndex(); ?>
  </div>

  <div class="row">
    <?php  include "slider/slider.php"; ?>
  </div>


  <div id="third" >
    <div id="second" >
      <div id="first" >
        <section class="container" style="padding:10px;background-color: white;">
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
        <section class="container" style="padding:10px;background-color: white;">
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
        <section class="container" style="padding:10px;background-color: white;">
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
        <section class="container" style="padding:10px;background-color: white;">
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


  <footer>
   <section class="container" style="padding:10px;">
    <div class="btn-group dropup pull-right">
      <button type="button" class="btn btn-default">Idioma</button>
      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        &nbsp
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
        &nbsp
      </button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Gallego</a></li>
        <li><a href="#">Inglés</a></li>
        <li class="divider"></li>
        <li><a href="#">Español</a></li>
      </ul>
    </div>
  </section>
</footer>


</body>
</html>