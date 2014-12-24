<?php
include_once "sesion_segura.php";
include_once "modelos/pelicula.php";
include_once "modelos/usuario.php";
include_once "modelos/sesion.php";
include_once "modelos/evento.php";

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
  <script src="js/alertify/lib/alertify.min.js"> </script>
  <script src="js/general.js"> </script>
  <link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
  <link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
  <link rel="stylesheet" href="js/alertify/themes/alertify.bootstrap.css" />

</head>
<body>
 <?php
 include "cabecera.php";
 cabeceraPantallaPrincipal();


 if($_GET["estado"] == "error"){
  echo "<script>
  alertify.log('Ha habido un error al insertar tu grupo, comprueba que todos los campos son correctos', 'error', 5000);
</script>";

}else{
  if($_GET["estado"] == "correcto"){
    echo "<script>
    alertify.log('El grupo se ha creado correctamente', 'success', 5000);
  </script>";
}
}



?>
<div class="container">
 <div class="row top-margin">
  <div class="col-sm-6">
   <div class="panel panel-default">
     <div class="panel-heading">Nuevo Grupo</div>
     <div class="panel-body">


      <form action="controladoras/crearGrupo.php" role="form" method="POST">
        <div class="form-group">
          <label for="nombre_grupo">Nombre del Grupo</label>
          <input name="nombreGrupo" class="form-control" id="nombre_grupo"
          placeholder="Nombre de tu grupo">
        </div>
        <div class="form-group">
          <label for="descripcion_grupo">Descripción</label>
          <input type="text" name="descripcionGrupo" class="form-control" id="descripcion_grupo" placeholder="Introduce una descripción">
        </div>
        <div class="form-group">
          <label for="add_sesion">Elegir Sesión</label><br/>
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
        <?php
        $grupos = Evento::listarGrupos($_SESSION["usuario"]->email);
        foreach ($grupos as $grupo){
          echo "<tr ><td>$grupo->nombre</td><td>".Evento::getNumIntegrantes($grupo->idEvento)."</td><td><a href='ver_grupo.php?id=$grupo->idEvento' class='btn btn-default btn-mini btn-makesmall'> Ver </a></td><td><input  class='pull-right' type='checkbox'> <span class='pull-right'>Borrar&nbsp;</span></td></tr>";

        }
        ?>
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