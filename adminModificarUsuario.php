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
   cabeceraAdministrador();

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




  <h1 class="tackle-right">Lista de Usuarios</h1>
  
  <div class="col-md-1"> </div>
  <div class="col-md-8 ">
    <ul class="media-list" style="margin-left:-20px;">

      <!-- Paneles de los cines -->
      <?php

      if(isset($filtro) ){
        $arrayUsuarios=$filtro;
        foreach($arrayUsuarios as $panelUsuario){

          echo '<li class="media" style="margin-top: 15px;">';
          echo '<div class="col-md-12 ">';
          echo '<div class="well">';
          //echo '<a class="media-left" href="ficha_pelicula.php?id='.$panelUsuario["idPelicula"].'">';

          if(substr($panelUsuario["foto"],0,3) == "img"){
            echo '<img src="'.$panelUsuario["foto"].'" alt="" height="140px" width="90px" class="thumbnail">';

          }else{
            echo '<img src="img/default_user.png" alt="" height="140px" width="90px" class="thumbnail">';

          }

          echo '</a>';  
          echo '<div class="media-body">';
          echo '<p><b>Nombre: </b>'.$panelUsuario["nombreUsuario"].'</p>';
          echo '<p><b>Email: </b>'.$panelUsuario["email"].'</p>';
          echo '<p><b>Tipo Usuario: </b>'.$panelUsuario["tipoUsuario"].'</p>';
          ;?>
          <!-- boton para editar e eliminar-->
          <div class="col-md-8"></div>
          <div class="col-md-4">

            <button type="button" class="btn btn-primary" data-toggle="modal" aria-label="Left Align" data-target="#modificarUsuario1<?php echo $i; ?>"> 
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
          </button>
            <form action="controladoras/administrarUsuario.php?emailA=<?php echo $panelUsuario["email"]; ?>" method="POST">
           <input type="submit" name="accion" class="btn btn-danger" value="Eliminar">
         </form>
          </div>



<div id="modificarUsuario1<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <form id="form-edit-perfil" action="controladoras/administrarUsuario.php?emailA=<?php echo $panelUsuario["email"]; ?>" method="POST">

            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4>Editar Usuario</h4>
                </div>
                <div class="modal-body">
                  <label for="nombreUsuario" class="">Cambiar el nombre del Usuario</label>
                  <input type="text" name="nombreUsuario" class="form-control form-pers" value="<?php echo $panelUsuario["nombreUsuario"];?>"><br/> 
                  
                  <label for="email" class="">Cambiar el correo</label>
                  <input type="text" name="email" class="form-control form-pers" value="<?php echo $panelUsuario["email"];?>"><br/> 

                  <label for="pass" class="">Cambiar pass:</label>
                  <input type="password" name="pass" class="form-control form-pers" placeholder="Introduzca los pass" value="<?php echo $panelUsuario["pass"]; ?>"> <br/>
                  
                  <label for="foto" class="">Cambiar foto:</label>
                  <input type="text" name="foto" class="form-control form-pers" placeholder="Introduzca los pass" value="<?php echo $panelUsuario["foto"]; ?>"> <br/>
                  
                  <label for="tipoUsuario" class="">Cambiar el tipo de usuario(0 usuario normal, 1 admin):</label>
                  <input type="text" name="tipoUsuario" class="form-control form-pers" value="<?php echo $panelUsuario["tipoUsuario"];?>"><br/> 

                  <label for="preferencia1" class="">Cambiar preferencia1:</label>
                  <input type="text" name="preferencia1" class="form-control form-pers" placeholder="Introduzca su preferencia1" value="<?php echo $panelUsuario["preferencia1"]; ?>"> <br/>
                  
                  <label for="preferencia2" class="">Cambiar preferencia2:</label>
                  <input type="text" name="preferencia2" class="form-control form-pers" placeholder="Introduzca su preferencia2" value="<?php echo $panelUsuario["preferencia2"]; ?>"> <br/>

                  <label for="preferencia3" class="">Cambiar preferencia3:</label>
                  <input type="text" name="preferencia3" class="form-control form-pers" placeholder="Introduzca su preferencia3" value="<?php echo $panelUsuario["preferencia3"]; ?>"> <br/>

                  <label for="estado" class="">Cambiar estadp:</label>
                  <input type="text" name="estado" class="form-control form-pers" placeholder="Introduzca su estado" value="<?php echo $panelUsuario["estado"]; ?>"> <br/>
                  
                  <label for="ciudadActual" class="">Cambiar ciudadActual:</label> 
                  <input type="text" name="ciudadActual" class="form-control form-pers" placeholder="Introduzca su ciudadActual" value="<?php echo $panelUsuario["ciudadActual"]; ?>"> <br/>
                  
                  <label for="fechaNacimiento" class="">Cambiar fechaNacimiento:</label>
                  <input type="text" name="fechaNacimiento" class="form-control form-pers" placeholder="Introduzca su fechaNacimiento" value="<?php echo $panelUsuario["fechaNacimiento"]; ?>"> <br/>
  
                  <label for="eslogan" class="">Cambiar eslogan:</label>
                  <input type="text" name="eslogan" class="form-control form-pers" placeholder="Introduzca su eslogan" value="<?php echo $panelUsuario["eslogan"]; ?>"> <br/>
                  <label for="foto" class="">Cambiar foto:</label>


                </div>
                <div class="modal-footer">
                  <input type="submit" name="accion" class="btn btn-success" value="Guardar cambios">

                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </form>
        </div> 

        
          <?php
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</li>';
        }
      }


      
      else{
        $arrayUsuarios=Usuario::mostrarUsuarios();
        $i=0;
        foreach($arrayUsuarios as $panelUsuario){

          echo '<li class="media">';
          echo '<div class="col-md-12 ">';
          echo '<div class="well">';
          echo '<a class="media-left" href="#">';
          if(substr($panelUsuario["foto"],0,3) == "img"){
            echo '<img src="'.$panelUsuario["foto"].'" alt="" height="140px" width="90px" class="thumbnail">';

          }else{
            echo '<img src="img/default_user.png" alt="usuario sin foto" height="140px" width="90px" class="thumbnail">';

          }
          echo '</a>';  
          echo '<div class="media-body">';
          echo '<p><b>Nombre: </b>'.$panelUsuario["nombreUsuario"].'</p>';
          echo '<p><b>Email: </b>'.$panelUsuario["email"].'</p>';
          echo '<p><b>Tipo Usuario: </b>'.$panelUsuario["tipoUsuario"].'</p>';
          
          ?>

       
        <button type="button" class="btn btn-primary" data-toggle="modal" aria-label="Left Align" data-target="#modificarUsuario2<?php echo $i; ?>"> 
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
          </button>
          
          <!--button type="button" class="btn btn-danger" aria-label="Left Align" onclick="eliminarSesion('1', '1');">
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar
            </button>
        <input type="button" class="btn btn-primary right" data-toggle="modal" data-target="#modificarUsuario<?php echo $i; ?>" value="Editar"-->     
         <form action="controladoras/administrarUsuario.php?emailA=<?php echo $panelUsuario["email"]; ?>" method="POST">
           <input type="submit" name="accion" class="btn btn-danger" value="Eliminar">
         </form>

        <div id="modificarUsuario2<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <form id="form-edit-perfil" action="controladoras/administrarUsuario.php?emailA=<?php echo $panelUsuario["email"]; ?>" method="POST">

            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4>Editar Usuario</h4>
                </div>
                <div class="modal-body">
                  <label for="nombreUsuario" class="">Cambiar el nombre del Usuario</label>
                  <input type="text" name="nombreUsuario" class="form-control form-pers" value="<?php echo $panelUsuario["nombreUsuario"];?>"><br/> 
                  
                  <label for="email" class="">Cambiar el correo</label>
                  <input type="text" name="email" class="form-control form-pers" value="<?php echo $panelUsuario["email"];?>"><br/> 

                  <label for="pass" class="">Cambiar pass:</label>
                  <input type="password" name="pass" class="form-control form-pers" placeholder="Introduzca los pass" value="<?php echo $panelUsuario["pass"]; ?>"> <br/>
                  
                  <label for="foto" class="">Cambiar foto:</label>
                  <input type="text" name="foto" class="form-control form-pers" placeholder="Introduzca los pass" value="<?php echo $panelUsuario["foto"]; ?>"> <br/>
                  
                  <label for="tipoUsuario" class="">Cambiar el tipo de usuario(0 usuario normal, 1 admin):</label>
                  <input type="text" name="tipoUsuario" class="form-control form-pers" value="<?php echo $panelUsuario["tipoUsuario"];?>"><br/> 

                  <label for="preferencia1" class="">Cambiar preferencia1:</label>
                  <input type="text" name="preferencia1" class="form-control form-pers" placeholder="Introduzca su preferencia1" value="<?php echo $panelUsuario["preferencia1"]; ?>"> <br/>
                  
                  <label for="preferencia2" class="">Cambiar preferencia2:</label>
                  <input type="text" name="preferencia2" class="form-control form-pers" placeholder="Introduzca su preferencia2" value="<?php echo $panelUsuario["preferencia2"]; ?>"> <br/>

                  <label for="preferencia3" class="">Cambiar preferencia3:</label>
                  <input type="text" name="preferencia3" class="form-control form-pers" placeholder="Introduzca su preferencia3" value="<?php echo $panelUsuario["preferencia3"]; ?>"> <br/>

                  <label for="estado" class="">Cambiar estadp:</label>
                  <input type="text" name="estado" class="form-control form-pers" placeholder="Introduzca su estado" value="<?php echo $panelUsuario["estado"]; ?>"> <br/>
                  
                  <label for="ciudadActual" class="">Cambiar ciudadActual:</label> 
                  <input type="text" name="ciudadActual" class="form-control form-pers" placeholder="Introduzca su ciudadActual" value="<?php echo $panelUsuario["ciudadActual"]; ?>"> <br/>
                  
                  <label for="fechaNacimiento" class="">Cambiar fechaNacimiento:</label>
                  <input type="text" name="fechaNacimiento" class="form-control form-pers" placeholder="Introduzca su fechaNacimiento" value="<?php echo $panelUsuario["fechaNacimiento"]; ?>"> <br/>
  
                  <label for="eslogan" class="">Cambiar eslogan:</label>
                  <input type="text" name="eslogan" class="form-control form-pers" placeholder="Introduzca su eslogan" value="<?php echo $panelUsuario["eslogan"]; ?>"> <br/>
                  <label for="foto" class="">Cambiar foto:</label>


                </div>
                <div class="modal-footer">
                  <input type="submit" name="accion" class="btn btn-success" value="Guardar cambios">

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
        $i=$i+1;
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
    <form role="form" action="controladoras/" method="post">
      <input type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevoUsuario" value="Nuevo Usuario"/>
    </form>
<div id="nuevoUsuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="controladoras/administrarUsuario.php" method="POST">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Nuevo Usuario</h4> 
            <small>Introduce los siguientes datos para introducir un nuevo usuario.</small>
          </div>
          <div class="modal-body">
            <h6> Nombre de usuario: </h6>
            <input type="text" name="nombreUsuario" class="form-control form-pers" placeholder="Nombre de usuario" >
            <h6> Correo electrónico: </h6>
            <input type="text" name="email" class="form-control form-pers" placeholder="Correo electrónico">
            <h6> Contraseña: </h6>
            <input type="password" name="pass" class="form-control form-pers" placeholder="Contraseña" >
            <h6> Tipo de Usuario: </h6>
            <input type="text" name="tipoUsuario" class="form-control form-pers" placeholder="0->User 1->Admin" ><br/>
            <label>
              Los datos podrán ser cambiados en <span class="text-color-red text-weight-bold"> EDITAR. </span></label>
            </div>
            <div class="modal-footer">
              
              <input type="submit" name="accion" class="btn btn-success" value="Insertar Usuario">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </form>
    </div> 
    <p>o busque un usuario </p>

    <!-- formulario para buscar pelicula-->
    <form role="form" action="controladoras/adminFiltrarUsuarios.php" method="post">

      <div class="input-group">

        <input name="busqueda" type="text" class="form-control" placeholder="Buscar un Usuario">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-success">Buscar</button>
        </span>
      </div>            
      <br>
      <div class="form-group">
        <label for="tipo_peli">Tipo de Usuario</label><br>
        <select name="tipo" class="form-control" aria-labelledby="buscar_user">
          <option  value="">Todos los usuarios</option>
          <option  value="administrador">Administrador</option>
          <option  value="usuario">Usuario</option>
        </select>

      </div>
      <!--div class="form-group">
        <label >Género</label>

        <table class="table table-striped">

          <tr ><td>Acción</td><td><input name="accion" value="accion" class="pull-right" type="checkbox"> <span class="pull-right"></span></td></tr>
          <tr ><td>Aventura</td><td><input name="aventura" value="aventura" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr ><td>Comedia</td><td><input name="comedia" value="comedia" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr ><td>Drama</td><td><input name="drama" value="drama" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr ><td>Fantasía</td><td><input name="fantasia" value="fantasia" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr ><td>Ficción</td><td><input name="ficcion" value="ficcion" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr ><td>Pornografía</td><td><input name="pornografia" value="pornografia"  class="pull-right" type="checkbox" onclick="alertify.error('En que pinchas picaron?')"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr ><td>Romántica</td><td><input name="romantica" value="romantica" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr ><td>Suspense</td><td><input name="suspense" value="suspense" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
          <tr ><td>Terror</td><td><input name="terror" value="terror" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>

        </table>
      </div-->

    </form>
  </div>
</div>

</div>

<?php footer(); ?>


</body>	

<script src="js/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

</html>


