<?php
include_once "sesion_segura.php";
include_once "modelos/pelicula.php";
include_once "modelos/usuario.php";
include_once "modelos/sesion.php";
session_start();

?>

<html>
<head>
  <title>Mis Grupos - CinesLy</title>
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
     include "cabecera.php";
     cabeceraPantallaPrincipal();
     ?>
     <div class="container">
       <div class="row top-margin">
        <div class="col-sm-6">
         <div class="panel panel-default">
           <div class="panel-heading">Nuevo Grupo</div>
           <div class="panel-body">


            <form action="controladoras/crearGrupo.php" role="form">
              <div class="form-group">
                <label for="nombre_grupo">Nombre del Grupo</label>
                <input name="nombreGrupo" class="form-control" id="nombre_grupo"
                placeholder="Nombre de tu grupo">
              </div>
              <div class="form-group">
                <label for="add_peli">Añadir Película</label><br/>

                <select name="peliculaID" class="form-control">
                  <?php
                  $pelis = Pelicula::getPeliculasCartelera();
                  foreach($pelis as $peli){
                    echo "<option value='$peli->idPelicula' >$peli->titulo</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="add_sesion">Añadir Sesión</label><br/>
                <select name="idSesion" class="form-control">
                  <?php
                  $sesiones = Sesion::getFuturasSesiones();
                  foreach($sesiones as $sesion){
                    $peliReferencia = Pelicula::getObjetoPelicula($sesion->idPelicula);
                    echo "<option value='$sesion->idSesion'>$sesion->idSesion: $peliReferencia->titulo</option>";
                  }
                  
                  ?>
                </select>
              </div>
              <label for="add_amigos">Añadir Amigos</label>
              <div class="form-group scrollable-table">
                <table class="table table-striped">
                  <?php
                  $amigos = $_SESSION["usuario"]->getAmigos();
                  foreach($amigos as $amigo){
                    echo "<tr><td>$amigo->nombreUsuario</td><td><input class='pull-right' value='$amigo->email' name='arrayamigos[]' type='checkbox'> <span class='pull-right'>Añadir&nbsp;</span></td></tr>";
                  }
                  ?>
                </table>
              </div>
              <button type="submit" class="btn btn-success pull-right">Crear</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading">Grupos</div>
          <div class="panel-body">
           <div class="form-group scrollable-table">

            <table class="table table-striped">
              <tr><td>Nombre</td><td>Nº Integrantes</td><td></td><td></td></tr>
              <tr ><td>Grupo 1</td><td>10</td><td><a href="ver_grupo.php" class="btn btn-default btn-mini btn-makesmall"> Ver </a></td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">Borrar&nbsp;</span></td></tr>
              <tr ><td>Grupo 2</td><td>14</td><td><a href="ver_grupo.php" class="btn btn-default btn-mini btn-makesmall"> Ver </a></td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">Borrar&nbsp;</span></td></tr>

            </table>
          </div>
          <button type="submit" class="btn btn-default pull-right">Validar</button>
        </div>
      </div>
    </div>
  </div>
</div>
</body>	

<script src="js/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

<?php footer(); ?>


</html>