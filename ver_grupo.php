<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link href="style/style.css" rel="stylesheet" />

</head>
<body>
 <?php
 include "cabecera.php";
 include_once "modelos/evento.php";
 include_once "modelos/usuario.php";
 include_once "modelos/sesion.php";
 cabeceraPantallaPrincipal();
 session_start();
 $grupoActual = Evento::getGrupoById($_REQUEST["id"]);
 $usuariosDelGrupo =  Evento::getArrayIntegrantes($_REQUEST["id"]);

 ?>
 <div class="row top-margin">
   <div class="col-sm-3"></div>
   <div class="col-sm-6">
     <div class="panel panel-default">
       <div class="panel-heading">Ver Grupo</div>
       <div class="panel-body">


        <form role="form">
          <div class="form-group">
            <label for="nombre_grupo">Nombre del Grupo: </label><span class="little-right"><?php echo $grupoActual->nombre; ?></span>
          </div>
          <div class="form-group">
            <label for="grupo_peli">Pelicula</label><span class="little-right"><?php  
            $peli = Sesion::getPeliSesion($grupoActual->idSesion);
            echo $peli->titulo;
            ?></span>
            
            
          </div>
          <div class="form-group">
            <label for="grupo_sesion">Sesión:</label><span class="little-right"><?php echo $grupoActual->idSesion; ?></span>
            
          </div>
          <label for="grupo_amigos">Amigos del grupo: </label>
          <div class="form-group scrollable-table">
            <table class="table table-striped ">
              <?php
              foreach($usuariosDelGrupo as $user){
                echo "<tr ><td>$user->nombreUsuario</td></tr>";
              }

              ?>


              

            </table>
          </div>
          <a href="mis_grupos.php"  class="btn btn-success pull-right">Volver</a>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-3"></div>

  


</div>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<footer>
 <section class="container" style="padding:10px">
  <div class="btn-group dropup pull-rigth ">
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

<script src="js/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

</html>