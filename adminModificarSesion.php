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

   include_once "modelos/sesion.php";
   include_once "modelos/pelicula.php";

   include_once "cabecera.php";


       //Esta cabeceira tense que modificar
   cabeceraAdministrador();

   session_start();
  /*
  if($_REQUEST["filtrado"]==true){
    $filtro=$_SESSION["filtro"];
    unset($_SESSION["filtro"]);
  }*/

  if($_REQUEST["update"] == "bad"){
    echo "<script>alertify.error('Ha ocurrido un error al modificar la sesion.');</script>";
  }
  if($_REQUEST["update"] == "good"){
    echo "<script>alertify.success('La sesion se ha actualizado correctamente');</script>";
  }
  if($_REQUEST["faltanDatos"] == "yes"){
    echo "<script>alertify.error('faltan por especificar datos de la sesion');</script>";
  }
  if($_REQUEST["duplicado"] == "yes"){
    echo "<script>alertify.error('Ya existe una sesion con esa sala y fecha');</script>";
  }
  if($_REQUEST["inserccion"] == "bad"){
    echo "<script>alertify.error('Ha ocurrido un error al insertar la sesion.');</script>";
  }
  if($_REQUEST["inserccion"] == "good"){
    echo "<script>alertify.success('La sesion se ha insertado correctamente');</script>";
  }

  
/*
  if($_REQUEST["inserccion"] == "noTitle"){
    echo "<script>alertify.error('Inserte un titulo a la pelicula.');</script>";
  }
  if($_REQUEST["inserccion"] == "bad"){
    echo "<script>alertify.error('Ha ocurrido un error al insertar la pelicula.');</script>";
  }
  if($_REQUEST["inserccion"] == "good"){
    echo "<script>alertify.success('La pelicula se ha insertado correctamente');</script>";
  }
  */
  ?>




  <h1 class="tackle-right">Sesiones Existentes</h1>
  
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
          echo '<a class="media-left" href="#">';

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
          <br/>
          <button type="button" class="btn btn-primary" data-toggle="modal" aria-label="Left Align" data-target="#modificarSesion<?php echo $panelSesion["idSesion"];?>" > 
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
          </button>

          <!--EliminarPerfil-->
          <button type="button" class="btn btn-danger" aria-label="Left Align" onclick="eliminarSesion('<?php echo $panelSesion["idSesion"]?>', '<?php echo $panelSesion["idPelicula"]?>');">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar
          </button>

          <!--</div>-->

          <!-- Pagina modal para modificar perfil -->
          <div id="modificarSesion<?php echo $panelSesion["idSesion"];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <!--enctype="multipart/form-data" añadido por min-->
            <form id="form-edit-perfil"  enctype="multipart/form-data" action="controladoras/actualizarSesion.php?idSesion=<?php echo $panelSesion["idSesion"]; ?>" method="POST">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Editar Sesión</h4>
                  </div>
                  <div class="modal-body">
                    <label for="sala" class="">Cambiar la Sala:</label>
                    <input type="text" name="sala" class="form-control form-pers" value="<?php echo $panelSesion["sala"];?>"><br/>    

                    <label for="fecha" class="">Cambiar la Fecha:</label>
                    <input type="text" name="fecha" class="form-control form-pers" placeholder="Introduzca su fecha" value="<?php echo $panelSesion["fecha"]; ?>"> <br/>

                    <label for="capacidad" class="">Cambiar la Capacidad:</label>
                    <input type="text" name="capacidad" class="form-control form-pers" placeholder="Introduzca los capacidad" value="<?php echo $panelSesion["capacidad"]; ?>"> <br/>

                    <label for="idPelicula" class="">ID de la pelicula de la sesion ( no modificable ):</label>
                    <input type="text" name="idPelicula" class="form-control form-pers" placeholder="Introduzca su idPelicula" value="<?php echo $panelSesion["idPelicula"]; ?>" readonly> <br/>


                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="idSesion" class="btn btn-success">Guardar Cambios</button>
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
      else{
        $arraySesiones=Sesion::mostrarSesiones();
        foreach($arraySesiones as $panelSesion){
          //$a=Pelicula::getObjetoPelicula($panelPelicula["idPelicula"]);
          /*$sql="SELECT * FROM pelicula WHERE idPelicula = '".$panelSesion["idPelicula"]."'";
          $resultado=mysql_query($sql);
          $peliculaSesion=mysql_fetch_array($resultado);
          */
          $peliculaSesion=Pelicula::mostrarPelicula($panelSesion["idPelicula"]);
          echo '<li class="media">';
          echo '<div class="col-md-1 "></div>';
          echo '<div class="col-md-11 ">';
          echo '<div class="well">';
          echo '<a class="media-left" href="#">';
          if(substr($peliculaSesion["foto"],0,3) == "img"){
            echo '<img src="'.$peliculaSesion["foto"].'" alt="" height="140px" width="90px" class="thumbnail">';

          }else{
            echo '<img src="img/movie_no_poster.jpg" alt="" height="140px" width="90px" class="thumbnail">';

          }
          echo '</a>';  
          echo '<div class="media-body">';
          echo '<p><b>Sala: </b>'.$panelSesion["sala"].'</p>';
          echo '<p><b>Fecha: </b>'.$panelSesion["fecha"].'</p>';
          echo '<p><b>Capacidad: </b>'.$panelSesion["capacidad"].'</p>';
          echo '<p><b>idPelicula: </b>'.$panelSesion["idPelicula"].'</p>';
          echo '<p><b>Titulo de la pelicula: </b>'.$peliculaSesion["titulo"].'</p>';
          ?>

          <!-- Modificar una pelicula 
          <div class="col-md-8"> </div>
          <div class="col-md-4 pull-right">-->

            <!--editar perfil-->
            <br/>
            <button type="button" class="btn btn-primary" data-toggle="modal" aria-label="Left Align" data-target="#modificarSesion<?php echo $panelSesion["idSesion"];?>" > 
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
            </button>

            <!--EliminarPerfil-->
            <button type="button" class="btn btn-danger" aria-label="Left Align" onclick="eliminarSesion('<?php echo $panelSesion["idSesion"]?>', '<?php echo $panelSesion["idPelicula"]?>');">
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar
            </button>

            <!--</div>-->

            <!-- Pagina modal para modificar perfil -->
            <div id="modificarSesion<?php echo $panelSesion["idSesion"];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <!--enctype="multipart/form-data" añadido por min-->
              <form id="form-edit-perfil"  enctype="multipart/form-data" action="controladoras/actualizarSesion.php?idSesion=<?php echo $panelSesion["idSesion"]; ?>" method="POST">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4>Editar Sesión</h4>
                    </div>
                    <div class="modal-body">
                      <label for="sala" class="">Cambiar la Sala:</label>
                      <input type="text" name="sala" class="form-control form-pers" value="<?php echo $panelSesion["sala"];?>"><br/>    

                      <label for="fecha" class="">Cambiar la Fecha:</label>
                      <input type="text" name="fecha" class="form-control form-pers" placeholder="Introduzca su fecha" value="<?php echo $panelSesion["fecha"]; ?>"> <br/>

                      <label for="capacidad" class="">Cambiar la Capacidad:</label>
                      <input type="text" name="capacidad" class="form-control form-pers" placeholder="Introduzca los capacidad" value="<?php echo $panelSesion["capacidad"]; ?>"> <br/>

                      <label for="idPelicula" class="">ID de la pelicula de la sesion ( no modificable ):</label>
                      <input type="text" name="idPelicula" class="form-control form-pers" placeholder="Introduzca su idPelicula" value="<?php echo $panelSesion["idPelicula"]; ?>" readonly> <br/>


                    </div>
                    <div class="modal-footer">
                      <button type="submit" name="idSesion" class="btn btn-success">Guardar Cambios</button>
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

    <div class="custom-panel-right-fixed col-md-3" >
     <div class="panel panel-default">

      <div class="panel-body">
        <!-- insertar una pelicula-->
        <button type="button" class="btn btn-primary" data-toggle="modal" aria-label="Left Align" data-target="#insertarSesion" > 
          <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Inserte una Sesion
        </button>

        <div id="insertarSesion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <!--enctype="multipart/form-data" añadido por min-->
          <form id="form-edit-perfil"  enctype="multipart/form-data" action="controladoras/insertarSesion.php" method="POST">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4>Insertar Sesion</h4>
                </div>
                <div class="modal-body">
                  <label for="sala" class="">Introduzca la Sala:</label>
                  <input type="text" name="sala" class="form-control form-pers" value="<?php echo $panelSesion["sala"];?>"><br/>    

                  <label for="fecha" class="">Introduzca la Fecha:</label>
                  <input type="text" name="fecha" class="form-control form-pers" placeholder="Introduzca su fecha" value="<?php echo $panelSesion["fecha"]; ?>"> <br/>

                  <label for="capacidad" class="">Introduzca la Capacidad:</label>
                  <input type="text" name="capacidad" class="form-control form-pers" placeholder="Introduzca los capacidad" value="<?php echo $panelSesion["capacidad"]; ?>"> <br/>
                  
                  <label for="idPelicula" class="">ID de la pelicula de la sesion: </label>
                  <select name="idPelicula" class="form-control" aria-labelledby="buscar_peli">
                  <?php 
                    $arrayPeliculas=Pelicula::mostrarPeliculas();
                    foreach($arrayPeliculas as $panelPelicula){
                      echo '<option  value='.$panelPelicula["idPelicula"].'>'.$panelPelicula["idPelicula"].' - '.$panelPelicula["titulo"].' </option>';
                    }  
                  ?>
                  </select>

                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Guardar Sesion</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </form>
        </div>  
        <div class="clearfix"></div>

        <br>

        <p>o busquela </p>

        <!-- formulario para buscar pelicula-->
        <form role="form" action="controladoras/adminFiltrarCatalogo.php" method="post">

          <div class="input-group">

            <input name="busqueda" type="text" class="form-control" placeholder="Buscar Pelicula">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-success">Buscar</button>
            </span>
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


