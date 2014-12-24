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
    <script src="js/general.js"> </script>
    <link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
    <link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
    <title>Lista de peliculas - CinesLy</title>


  </head>
  <body>

   <?php

   error_reporting(E_ERROR | E_PARSE);

   include_once "modelos/pelicula.php";

   include_once "cabecera.php";


       //Esta cabeceira tense que modificar
   cabeceraCartelera();

   session_start();
   if($_REQUEST["filtrado"]==true){
    $filtro=$_SESSION["filtro"];
    unset($_SESSION["filtro"]);
  }

  if($_REQUEST["update"] == "bad"){
    echo "<script>alertify.error('Ha ocurrido un error al modificar la pelicula.');</script>";
  }
  if($_REQUEST["update"] == "good"){
    echo "<script>alertify.success('La pelicula se ha actualizado correctamente');</script>";
  }

  ?>




  <h1 class="tackle-right">Catálogo de Películas</h1>
  
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
          ;?>
          <!-- boton para editar e eliminar-->
          <div class="col-md-8"></div>
          <div class="col-md-4">

            <button type="button" class="btn btn-default" aria-label="Left Align">
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
            </button>
            <button type="button" class="btn btn-default" aria-label="Left Align">
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar
            </button>
          </div>

          <?php
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
          echo '<p><b>Nombre: </b>'.$panelPelicula["titulo"].'</p>';
          echo '<p><b>Genero: </b>'.$panelPelicula["genero"].'</p>';
          echo '<p><b>Año: </b>'.$panelPelicula["anho"].'</p>';
          echo '<p><b>Sinopsis: </b>'.$panelPelicula["sinopsis"].'</p>'
          ;?>

          <!-- boton para editar e eliminar
          <div class="col-md-8"></div>
          <div class="col-md-4">

            <button type="button" class="btn btn-primary" aria-label="Left Align">
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
            </button>
            <button type="button" class="btn btn-danger" aria-label="Left Align">
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar
            </button>
          </div>
        -->

        <!-- Modificar una pelicula -->
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modificarPerfil" value="<?php echo $panelPelicula["idPelicula"]; ?>"> 
          <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
          
        </button>
        <?php $a=$panelPelicula["idPelicula"];echo $a ?>
        <div id="modificarPerfil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <!--enctype="multipart/form-data" añadido por min-->
          <form id="form-edit-perfil"  enctype="multipart/form-data" action="controladoras/actualizarPelicula.php?idPelicula=<?php echo $panelPelicula["idPelicula"]; ?>" method="POST">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4>Editar Pelicula</h4>
                </div>
                <div class="modal-body">
                  <?php echo $a; ?>
                  <label for="nuevoTitulo" class="">Cambiar el titulo de la pelicula</label>
                  <input type="text" name="nuevoTitulo" class="form-control form-pers" value="<?php echo $panelPelicula["titulo"];?>"><br/>    
                  
                  <label for="director" class="">Cambiar Director:</label>
                  <input type="text" name="director" class="form-control form-pers" placeholder="Introduzca su el director" value="<?php echo $panelPelicula["director"]; ?>"> <br/>
                  
                  <label for="actores" class="">Cambiar Actores:</label>
                  <input type="text" name="actores" class="form-control form-pers" placeholder="Introduzca los actores" value="<?php echo $panelPelicula["actores"]; ?>"> <br/>
                  
                  <label for="distribuidora" class="">Cambiar Distribuidora:</label>
                  <input type="text" name="distribuidora" class="form-control form-pers" placeholder="Introduzca su distribuidora" value="<?php echo $panelPelicula["distribuidora"]; ?>"> <br/>
                  
                  <label for="duracion" class="">Cambiar Duracion:</label>
                  <input type="text" name="duracion" class="form-control form-pers" placeholder="Introduzca su duración" value="<?php echo $panelPelicula["duracion"]; ?>"> <br/>
                  
                  <label for="anho" class="">Cambiar Año:</label>
                  <input type="text" name="anho" class="form-control form-pers" placeholder="Introduzca su año" value="<?php echo $panelPelicula["anho"]; ?>"> <br/>
                  
                  <label for="genero" class="">Cambiar Genero:</label>
                  <input type="text" name="genero" class="form-control form-pers" placeholder="Introduzca sus generos" value="<?php echo $panelPelicula["genero"]; ?>"> <br/>
                  
                  <label for="pais" class="">Cambiar País:</label>
                  <input type="text" name="pais" class="form-control form-pers" placeholder="Introduzca su país" value="<?php echo $panelPelicula["pais"]; ?>"> <br/>
                  
                  <label for="tipoPeli" class="">Cambiar Tipo:</label><br/>
                  <select name="tipoPeli" aria-labelledby="buscar_peli">
                    <option  value="">Todas las peliculas</option>
                    <option  value="cartelera">En Cartelera</option>
                    <option  value="especial">Especiales</option>
                    <option  value="proximamente">Proximamente</option>
                  </select>
                  <br/><br/>

                  <label for="sinopsis" class="">Cambiar Sinopsis:</label> 
                  <textarea class="form-control eslogan" name="sinopsis" onblur="document.getElementById('bio-form').submit()"><?php echo $panelPelicula["sinopsis"]; ?></textarea><br/>
                  
                  <label for="foto" class="">Cambiar foto:</label>
                  <!-- subir foto a implemetar en un futuro-->
                  <!-- MAX_FILE_SIZE debe preceder el campo de entrada de archivo -->
                  <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                  <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
                  <input name="userfile" type="file" />


                </div>
                <div class="modal-footer">
                  <button type="submit" name="idPelicula" class="btn btn-success" value="hola">Guardar Cambios</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </form>
        </div>  
        <div class="clearfix"></div>
        
        <?php  
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

<div class="admin-custom-panel-right-fixed col-md-3" >
 <div class="panel panel-default">

  <div class="panel-body">
    <!-- formulario para inserta pelicula-->
    <form role="form" action="controladoras/adminFiltrarCatalogo.php" method="post">
      <button type="submit" class="btn btn-success ">Inserte una Pelicula</button>
    </form>
    <p>o busquela </p>

    <!-- formulario para buscar pelicula-->
    <form role="form" action="controladoras/adminFiltrarCatalogo.php" method="post">

      <div class="input-group">

        <input name="busqueda" type="text" class="form-control" placeholder="Buscar Pelicula">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-success">Buscar</button>
        </span>
      </div>            
      <br>
      <div class="form-group">
        <label for="tipo_peli">Tipo de Peliculas</label><br>
        <select name="tipo" aria-labelledby="buscar_peli">
          <option  value="">Todas las peliculas</option>
          <option  value="cartelera">En Cartelera</option>
          <option  value="especial">Especiales</option>
          <option  value="proximamente">Proximamente</option>
        </select>

      </div>
      <div class="form-group">
        <label >Género</label>

        <table class="table table-striped">

          <tr><td>Acción</td><td><input name="accion" value="accion" class="pull-right" type="checkbox"> <span class="pull-right"></span></td></tr>
          <tr><td>Aventura</td><td><input name="aventura" value="aventura" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr><td>Comedia</td><td><input name="comedia" value="comedia" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr><td>Drama</td><td><input name="drama" value="drama" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr><td>Fantasía</td><td><input name="fantasia" value="fantasia" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr><td>Ficción</td><td><input name="ficcion" value="ficcion" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr><td>Pornografía</td><td><input name="pornografia" value="pornografia"  class="pull-right" type="checkbox" onclick="alertify.error('En que pinchas picaron?')"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr><td>Romántica</td><td><input name="romantica" value="romantica" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr><td>Suspense</td><td><input name="suspense" value="suspense" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr><td>Terror</td><td><input name="terror" value="terror" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>

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


