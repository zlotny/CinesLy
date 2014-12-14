<?php include "cabecera.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Perfil de Usuario</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link href="style/style.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
      <?php cabeceraPantallaPrincipal(); ?>

      <div class="col-md-2" ></div>
      <!-- 1º COLUMNA -->
      <div class="col-md-4">
        <div class="container top-margin">  
          <div class="col-md-2 ">
            <img src="img/default_user.png" width="150px" class="img-rounded">
          </div>

          <div class="col-md-2" id="test">
            <table>
              <tr><td><label for="Nombre Usuario" class="col-lg control-label">Nombre Usuario</label></td></tr>
              <tr><td><label for="Correo" class="col-lg control-label">Correo</label></td></tr>
            </table>
          </div>
        </div>

        <form class="form-horizontal top-margin" role="form">

          <div class="form-group" >
          <label for="contraseña" class="col-lg-3 ">Contraseña</label>
            <div class="col-lg-5">
              <input type="password" class="form-control" id="contraseña" placeholder="Contraseña">
            </div>
          </div>

          <div class="form-group">
            <label for="nueva_contraseña" class="col-lg-3 ">Nueva Contraseña</label>
            <div class="col-lg-5">
              <input type="password" class="form-control" id="nueva_contraseña" placeholder="Nueva Contraseña">
            </div>
          </div>

          <div class="form-group">
            <label for="repita_contraseña" class="col-lg-3 ">Repetir Contraseña</label>
            <div class="col-lg-5">
              <input type="password" class="form-control" id="repita_contraseña" placeholder="Repetir contraseña">
            </div>
          </div>

          <div class="form-group">
            <label for="cambiar_correo" class="col-lg-3 control-label">Cambiar Correo</label>
            <div class="col-lg-5">
              <input type="text" class="form-control" id="cambiar_correo" placeholder="Cambiar Correo">
            </div>
          </div>

        </form>

        <form>
          <div class="col-md-8  col-md-offset-1">
            <table class="table table-bordered">

              <tr>
                <th colspan="2">Películas recomendadas</th>
              </tr>

              <tr>
                <td><label>Pelicula 1</label></td>
                <td><input type="checkbox" value="" checked>Eliminar</td>
              </tr>

              <tr>
                <td><label>Pelicula 2</label></td>
                <td><input type="checkbox" value="" checked>Eliminar</td>
              </tr>

              <tr>
                <td><label>Pelicula 3</label></td>
                <td><input type="checkbox" value="" checked>Eliminar</td>
              </tr>

              <tr>
                <td><label>Pelicula 4</label></td>
                <td><input type="checkbox" value="" checked>Eliminar</td>
              </tr>

            </table>
          </div>
        </form>
      </div>
    </div>
    <!-- 2º COLUMNA -->
    <div class="col-md-4" id="test">
      <table class="table table-bordered">

        <tr>
          <th colspan="2">Publicaciones</th>
        </tr>

        <tr>
          <td><label>Publicacion 1</label></td>
          <td><input type="checkbox" value="" checked>Eliminar</td>
        </tr>

        <tr>
          <td><label>Publicacion 2</label></td>
          <td><input type="checkbox" value="" checked>Eliminar</td>
        </tr>

        <tr>
          <td><label>Publicacion 3</label></td>
          <td><input type="checkbox" value="" checked>Eliminar</td>
        </tr>

        <tr>
          <td><label>Publicacion 4</label></td>
          <td><input type="checkbox" value="" checked>Eliminar</td>
        </tr>
      </table>

      <a href="perfil.html" class="btn btn-info" >Eliminar Cuenta</a>
      <a href="amigos.html" class="btn btn-info">Validar</a>


    </div>

    <div class="col-md-2" ></div>


  </body>




  <script src="javascript/jquery-2.1.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>






