<?php
include_once "sesion_segura.php";
?>

<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
	<link href="style/style.css" rel="stylesheet" />
  <script src="js/alertify/lib/alertify.min.js"> </script>
  <link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
  <link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
  <title>Catálogo de Películas - CinesLy</title>



  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

    </head>
    <body>

     <?php

     error_reporting(E_ERROR | E_PARSE);

     include_once "modelos/pelicula.php";
     include_once "cabecera.php";
     
     
     cabeceraCartelera();
     session_start();
     if($_REQUEST["filtrado"]==true){
      $filtro=$_SESSION["filtro"];
      unset($_SESSION["filtro"]);
    }

    ?>



    
<h1 class="tackle-right">Catálogo de Películas</h1>
<p class="tackle-right">Busca y comenta tus películas favoritas. Haz click sobre el póster de una película para ver su ficha detallada</p>
    <div class="col-md-1"> </div>
    <div class="col-md-8 ">
      <ul class="media-list" style="margin-left:-20px;">

        <!-- Paneles de los cines -->
        <?php

        if(isset($filtro) ){
          $arrayPeliculas=$filtro;
          foreach($arrayPeliculas as $panelPelicula){

            echo '<li class="media" style="margin-top: 15px;">';
            echo '<div class="col-md-12 ">';
            echo '<div class="well">';
            echo '<a class="media-left" href="ficha_pelicula.php?id='.$panelPelicula["idPelicula"].'">';

            if(substr($panelPelicula["foto"],0,3) == "img"){
              echo '<img src="'.$panelPelicula["foto"].'" alt="" height="140px" width="90px" class="thumbnail">';

            }else{
              echo '<img src="img/movie_no_poster.jpg" alt="" height="140px" width="90px" class="thumbnail">';

            }

            echo '</a>';  
            echo '<div class="media-body">';
            echo '<p><b>Nombre: </b>'.$panelPelicula["titulo"].'</p>';
            echo '<p><b>Genero: </b>'.$panelPelicula["genero"].'</p>';
            echo '<p><b>Año: </b>'.$panelPelicula["anho"].'</p>';
            echo '<p><b>Sinopsis: </b>'.$panelPelicula["sinopsis"].'</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</li>';
          }
        }
        else{
          $arrayPeliculas=Pelicula::mostrarPeliculas();
          foreach($arrayPeliculas as $panelPelicula){
            echo '<li class="media">';
            echo '<div class="col-md-12 ">';
            echo '<div class="well">';
            echo '<a class="media-left" href="ficha_pelicula.php?id='.$panelPelicula["idPelicula"].'">';
            if(substr($panelPelicula["foto"],0,3) == "img"){
              echo '<img src="'.$panelPelicula["foto"].'" alt="" height="140px" width="90px" class="thumbnail">';

            }else{
              echo '<img src="img/movie_no_poster.jpg" alt="" height="140px" width="90px" class="thumbnail">';

            }
            echo '</a>';  
            echo '<div class="media-body">';
            echo '<p><b>Título: </b>'.$panelPelicula["titulo"].'</p>';
            echo '<p><b>Genero: </b>'.$panelPelicula["genero"].'</p>';
            echo '<p><b>Año: </b>'.$panelPelicula["anho"].'</p>';
            echo '<p><b>Sinopsis: </b>'.$panelPelicula["sinopsis"].'</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</li>';
          }


        }

        ?> 

      </ul>
    </div>

    <!-- Barra lateral   col-md-offset-10 -->

    <div class="custom-panel-right-fixed col-md-3" >
     <div class="panel panel-default">

      <div class="panel-body">

        <form role="form" action="controladoras/filtrarCatalogo.php" method="post">

          <div class="input-group">

            <input name="busqueda" type="text" class="form-control" placeholder="Buscar Pelicula">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-success">Buscar</button>
            </span>
          </div>            
          <br>
          <div class="form-group">
            <label for="tipo_peli">Tipo de Peliculas</label><br>
            <select name="tipo" class="form-control" aria-labelledby="buscar_peli">
              <option  value="">Todas las peliculas</option>
              <option  value="cartelera">En Cartelera</option>
              <option  value="especial">Especiales</option>
              <option  value="proximamente">Proximamente</option>
            </select>

          </div>
          <div class="form-group">
            <label >Género</label>

            <table class="table table-striped">

              <tr ><td>Acción</td><td><input name="accion" value="accion" class="pull-right" type="checkbox"> <span class="pull-right"></span></td></tr>
              <tr ><td>Aventura</td><td><input name="aventura" value="aventura" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Comedia</td><td><input name="comedia" value="comedia" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Drama</td><td><input name="drama" value="drama" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Fantasía</td><td><input name="fantasia" value="fantasia" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Ficción</td><td><input name="ficcion" value="ficcion" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Pornografía</td><td><input name="pornografia" value="pornografia"  class="pull-right" type="checkbox" > <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Romántica</td><td><input name="romantica" value="romantica" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Suspense</td><td><input name="suspense" value="suspense" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Terror</td><td><input name="terror" value="terror" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>

            </table>
          </div>

        </form>
      </div>
    </div>

  </div>

<?php footer(); ?>


</body>	

<script src="js/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

</html>


