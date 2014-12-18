<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
	<link href="style/style.css" rel="stylesheet" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

    </head>
    <body>

     <?php
     error_reporting(E_ERROR | E_PARSE);
     include "modelos/pelicula.php";
     include "filtrarCatalogo.php";
     include "cabecera.php";
     cabeceraCartelera();
     ?>
     
   
       <div class="col-md-2"> </div>
       <div class="col-md-7 ">
        <ul class="media-list">

          <!-- Paneles de los cines -->
          <?php
          
          $arrayPeliculas=Pelicula::mostrarPeliculas();

          foreach($arrayPeliculas as $panelPelicula){
            echo '<li class="media">';
              echo '<div class="col-md-12 ">';
                echo '<div class="well">';
                  echo '<a class="media-left" href="ficha_pelicula.php?id='.$panelPelicula["idPelicula"].'">';
                  if( substr($panelPelicula["foto"], 0,3) == "img"){

                    echo '<img src="'.$panelPelicula["foto"].'" alt="" height="140px" class="thumbnail">';
                  }else{
                    echo '<img src="img/movie_no_poster.jpg" alt="" height="140px"  class="thumbnail">';

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
              <button type="submit" class="btn btn-default">Buscar</button>
            </span>
          </div>            
          <br>
          <div class="form-group">
            <label for="tipo_peli">Tipo de Peliculas</label>

            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="buscar_peli" data-toggle="dropdown" aria-expanded="true">
                Tipo de Peliculas
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="buscar_peli">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Todas las peliculas</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">En Cartelera</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Especiales</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Proximamente</a></li>

              </ul>
            </div>

          </div>
          <div class="form-group">
            <label >Género</label>

            <table class="table table-striped">
              <tr ><td>Acción</td><td><input  class="pull-right" type="checkbox"> <span class="pull-right"></span></td></tr>
              <tr ><td>Aventura</td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Comedia</td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Drama</td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Fantasía</td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Ficción</td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Pornografía</td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Romántica</td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Suspense</td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td>Terror</td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
            </table>
          </div>

        </form>
      </div>
    </div>

  </div>



</body>	

<script src="js/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

</html>


