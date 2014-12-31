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
 <title>Lista de Usuarios - CinesLy</title>


</head>
<body>

 <?php


 include_once "cabecera.php";


       //Esta cabeceira tense que modificar
 cabeceraAdministrador();

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




<h1 class="tackle-right"><?php echo $text["h1ListUsu"];?></h1>

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
          //
        if(substr($panelUsuario["foto"],0,3) == "img"){
           // echo '<img src="'.$panelUsuario["foto"].'" alt="" nmouseover="src="img/logo_foto.png"" onmouseout="" 
            //height="140px" width="90px" data-toggle="modal" data-target="#upload" class="thumbnail">'; 
          ?>

          <img src="<?php echo $panelUsuario["foto"]; ?>"    width='90px' class='thumbnail' data-toggle='' data-target='#'>

          <?php
        }else{ 
           // echo '<img src="img/default_user.png" alt="" height="140px" width="90px" class="thumbnail">';
          ?>
          <img src="img/default_user.png"    width='90px' class='thumbnail' data-toggle='' data-target='#'>

          <?php 
//onmouseover="src='img/logo_foto.png'"  onmouseout="src='img/default_user.png'"
//onmouseover="src='img/logo_foto.png'"  onmouseout="src='<?php echo $panelUsuario["foto"];
        }

        echo '</a>';  
        echo '<div class="media-body">';
        echo '<p><b>Nombre: </b>'.$panelUsuario["nombreUsuario"].'</p>';
        echo '<p><b>Email: </b>'.$panelUsuario["email"].'</p>';
        echo '<p><b>Tipo Usuario: </b>'.$panelUsuario["tipoUsuario"].'</p>';
        ;?>
        <!-- boton para editar e eliminar-->


          <button type="button" class="btn btn-primary" data-toggle="modal" aria-label="Left Align" data-target="#modificarUsuario1<?php echo $i; ?>"> 
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> <?php echo $text["editar"];?>
          </button>
          <form action="controladoras/administrarUsuario.php?emailA=<?php echo $panelUsuario["email"]; ?>" method="POST">
           <input type="submit" name="accion" class="btn btn-danger" value="Eliminar">
         </form>




       <div id="modificarUsuario1<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form id="form-edit-perfil" enctype="multipart/form-data" action="controladoras/administrarUsuario.php?emailA=<?php echo $panelUsuario["email"]; ?>" method="POST">

          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4><?php echo $text["editUser"];?></h4>
              </div>
              <div class="modal-body">
                <label for="nombreUsuario" class=""><?php echo $text["cambNomUsu"];?></label>
                <input type="text" name="nombreUsuario" class="form-control form-pers" value="<?php echo $panelUsuario["nombreUsuario"];?>"><br/> 

                <label for="email" class=""><?php echo $text["cambEmail"];?></label>
                <input type="text" name="email" class="form-control form-pers" value="<?php echo $panelUsuario["email"];?>"><br/> 

                <label for="pass" class=""><?php echo $text["cambPass"];?></label>
                <input type="password" name="pass" class="form-control form-pers" placeholder="<?php echo $text["p1"];?>" value="<?php echo $panelUsuario["pass"]; ?>"> <br/>

                <label for="archivo" class=""><?php echo $text["cambFoto"];?></label>
                <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                <input type="text" name="archivo" class="form-control form-pers" placeholder="<?php echo $text["p1"];?>" value="<?php echo $panelUsuario["foto"]; ?>"> <br/>

                <label for="tipoUsuario" class=""><?php echo $text["cambTipUsu"];?></label>
                <input type="text" name="tipoUsuario" class="form-control form-pers" value="<?php echo $panelUsuario["tipoUsuario"];?>"><br/> 

                <label for="preferencia1" class=""><?php echo $text["cambPref1"];?></label>
                <input type="text" name="preferencia1" class="form-control form-pers" placeholder="<?php echo $text["p2"];?>" value="<?php echo $panelUsuario["preferencia1"]; ?>"> <br/>

                <label for="preferencia2" class=""><?php echo $text["cambPref2"];?></label>
                <input type="text" name="preferencia2" class="form-control form-pers" placeholder="<?php echo $text["p3"];?>" value="<?php echo $panelUsuario["preferencia2"]; ?>"> <br/>

                <label for="preferencia3" class=""><?php echo $text["cambPref3"];?></label>
                <input type="text" name="preferencia3" class="form-control form-pers" placeholder="<?php echo $text["p4"];?>" value="<?php echo $panelUsuario["preferencia3"]; ?>"> <br/>

                <label for="estado" class=""><?php echo $text["cambEstado"];?></label>
                <input type="text" name="estado" class="form-control form-pers" placeholder="<?php echo $text["p5"];?>" value="<?php echo $panelUsuario["estado"]; ?>"> <br/>

                <label for="ciudadActual" class=""><?php echo $text["cambCity"];?></label> 
                <input type="text" name="ciudadActual" class="form-control form-pers" placeholder="<?php echo $text["p6"];?>" value="<?php echo $panelUsuario["ciudadActual"]; ?>"> <br/>

                <label for="fechaNacimiento" class=""><?php echo $text["cambFechNac"];?></label>
                <input type="text" name="fechaNacimiento" class="form-control form-pers" placeholder="<?php echo $text["p7"];?>" value="<?php echo $panelUsuario["fechaNacimiento"]; ?>"> <br/>

                <label for="eslogan" class=""><?php echo $text["cambEslo"];?></label>
                <input type="text" name="eslogan" class="form-control form-pers" placeholder="<?php echo $text["p8"];?>" value="<?php echo $panelUsuario["eslogan"]; ?>"> <br/>




              </div>
              <div class="modal-footer">
                <input type="submit" name="accion" class="btn btn-success" value="Guardar cambios">

                <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $text["cerrar"];?></button>
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
           // echo '<img src="'.$panelUsuario["foto"].'" alt="" nmouseover="src="img/logo_foto.png"" onmouseout="" 
            //height="140px" width="90px" data-toggle="modal" data-target="#upload" class="thumbnail">'; 
        ?>

        <img src="<?php echo $panelUsuario["foto"]; ?>"    width='90px' class='thumbnail' data-toggle='' data-target='#'>

        <?php
      }else{ 
           // echo '<img src="img/default_user.png" alt="" height="140px" width="90px" class="thumbnail">';
        ?>
        <img src="img/default_user.png"   width='90px' class='thumbnail' data-toggle='' data-target='#'>

        <?php
      }
      echo '</a>';  
      echo '<div class="media-body">';

      echo "<p><b>".$text['nombre1']."</b>".$panelUsuario["nombreUsuario"]."</p>";
      echo "<p><b>".$text['email']."</b>".$panelUsuario["email"]."</p>";
      echo "<p><b>".$text['typeUser']."</b>".$panelUsuario["tipoUsuario"]."</p>";

  

      ?>


      <button type="button" class="btn btn-primary " data-toggle="modal" aria-label="Left Align" data-target="#modificarUsuario2<?php echo $i; ?>"> 
        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> <?php echo $text["editar"];?>
      </button>


      <form action="controladoras/administrarUsuario.php?accion=Eliminar&emailA=<?php echo $panelUsuario["email"]; ?>" method="POST">
       <input type="submit"  class="btn btn-danger " value="<?php echo $text["eliminar"];?>">
     </form>

     <div id="modificarUsuario2<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <form id="form-edit-perfil" enctype="multipart/form-data" action="controladoras/administrarUsuario.php?emailA=<?php echo $panelUsuario["email"]; ?>" method="POST">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4><?php echo $text["editUser"];?></h4>
            </div>
            <div class="modal-body">
              <label for="nombreUsuario" class=""><?php echo $text["cambNomUsu"];?></label>
              <input type="text" name="nombreUsuario" class="form-control form-pers" value="<?php echo $panelUsuario["nombreUsuario"];?>"><br/> 

              <label for="email" class=""><?php echo $text["cambEmail"];?></label>
              <input type="text" name="email" class="form-control form-pers" value="<?php echo $panelUsuario["email"];?>"><br/> 

              <label for="pass" class=""><?php echo $text["cambPass"];?></label>
              <input type="password" name="pass" class="form-control form-pers" placeholder="<?php echo $text["p1"];?>" value="<?php echo $panelUsuario["pass"]; ?>"> <br/>

              <label for="archivo" class=""><?php echo $text["cambFoto"];?></label>
              <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
              <input type="file" name="archivo" class="form-control form-pers" placeholder="<?php echo $text["p1"];?>" value="<?php echo $panelUsuario["foto"]; ?>"> <br/>

              <label for="tipoUsuario" class=""><?php echo $text["cambTipUsu"];?></label>
              <input type="text" name="tipoUsuario" class="form-control form-pers" value="<?php echo $panelUsuario["tipoUsuario"];?>"><br/> 

              <label for="preferencia1" class=""><?php echo $text["cambPref1"];?></label>
              <input type="text" name="preferencia1" class="form-control form-pers" placeholder="<?php echo $text["p2"];?>" value="<?php echo $panelUsuario["preferencia1"]; ?>"> <br/>

              <label for="preferencia2" class=""><?php echo $text["cambPref2"];?></label>
              <input type="text" name="preferencia2" class="form-control form-pers" placeholder="<?php echo $text["p3"];?>" value="<?php echo $panelUsuario["preferencia2"]; ?>"> <br/>

              <label for="preferencia3" class=""><?php echo $text["cambPref3"];?></label>
              <input type="text" name="preferencia3" class="form-control form-pers" placeholder="<?php echo $text["p4"];?>" value="<?php echo $panelUsuario["preferencia3"]; ?>"> <br/>

              <label for="estado" class=""><?php echo $text["cambEstado"];?></label>
              <input type="text" name="estado" class="form-control form-pers" placeholder="<?php echo $text["p5"];?>" value="<?php echo $panelUsuario["estado"]; ?>"> <br/>

              <label for="ciudadActual" class=""><?php echo $text["cambCity"];?></label> 
              <input type="text" name="ciudadActual" class="form-control form-pers" placeholder="<?php echo $text["p6"];?>" value="<?php echo $panelUsuario["ciudadActual"]; ?>"> <br/>

              <label for="fechaNacimiento" class=""><?php echo $text["cambFechNac"];?></label>
              <input type="text" name="fechaNacimiento" class="form-control form-pers" placeholder="<?php echo $text["p7"];?>" value="<?php echo $panelUsuario["fechaNacimiento"]; ?>"> <br/>

              <label for="eslogan" class=""><?php echo $text["cambEslo"];?></label>
              <input type="text" name="eslogan" class="form-control form-pers" placeholder="<?php echo $text["p8"];?>" value="<?php echo $panelUsuario["eslogan"]; ?>"> <br/>



            </div>
            <div class="modal-footer">
              <input type="submit" name="accion" class="btn btn-success" value="Guardar cambios">

              <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $text["cerrar"];?></button>
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
      <input type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevoUsuario" value="<?php echo $text["h4NewUsu"];?>"/>
    </form>
    <div id="nuevoUsuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <form action="controladoras/administrarUsuario.php" method="POST">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><?php echo $text["h4NewUsu"];?></h4> 
              <small><?php echo $text["smallAMU"];?></small>
            </div>
            <div class="modal-body">
              <h6> <?php echo $text["nomUsu"];?> </h6>
              <input type="text" name="nombreUsuario" class="form-control form-pers" placeholder="<?php echo $text["nomUsu"];?>" >
              <h6> <?php echo $text["email"];?></h6>
              <input type="text" name="email" class="form-control form-pers" placeholder="<?php echo $text["email"];?>">
              <h6> <?php echo $text["pass"];?> </h6>
              <input type="password" name="pass" class="form-control form-pers" placeholder="<?php echo $text["pass"];?>" >
              <h6> <?php echo $text["typeUser"];?> </h6>
              <input type="text" name="tipoUsuario" class="form-control form-pers" placeholder="<?php echo $text["typeUser"];?>" ><br/>
              <label>
                <?php echo $text["laberAMU"];?> <span class="text-color-red text-weight-bold"> <?php echo $text["laberAMU1"];?> </span></label>
              </div>
              <div class="modal-footer">

                <input type="submit" name="accion" class="btn btn-success" value="Insertar Usuario">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $text["cerrar"];?></button>
              </div>
            </div>
          </div>
        </form>
      </div> 
      <p><?php echo $text["oFindUsu"];?> </p>

      <!-- formulario para buscar usuario-->
      <form role="form" action="controladoras/adminFiltrarUsuarios.php" method="post">

        <div class="input-group">

          <input name="busqueda" type="text" class="form-control" placeholder="<?php echo $text["findUsu"];?>">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-success"><?php echo $text["find"];?></button>
          </span>
        </div>            
        <br>
        <div class="form-group">
          <label for="tipo_peli"><?php echo $text["typeUser"];?></label><br>
          <select name="tipo" class="form-control" aria-labelledby="buscar_user">
            <option  value=""><?php echo $text["allUsers"];?></option>
            <option  value="administrador"><?php echo $text["admin"];?></option>
            <option  value="usuario"><?php echo $text["user"];?></option>
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


