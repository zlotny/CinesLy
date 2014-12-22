<?php 
include "cabecera.php";
include_once "modelos/usuario.php";		
include_once "sesion_segura.php";
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/alertify/lib/alertify.min.js"> </script>
  <script src="js/general.js"> </script>
  <title>Amigos</title>


  <link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
  <link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
  <link rel="stylesheet" href="js/alertify/themes/alertify.bootstrap.css" />

  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link href="style/style.css" rel="stylesheet" />

</head>
<body>

  <?php cabeceraPantallaPrincipal(); 
  session_start();
  ?>

  <h1 class="tackle-right">Lista de amigos</h1>
  <p class="tackle-right">En esta página podrás gestionar tus amistades. Añade nuevos amigos y acepta las invitaciones de quienes te hayan agregado. </p>
  <div class="row top-margin">
    <div class="col-md-3"> </div>
    <div class="col-md-6">
      <div class="panel panel-default">
       <div class="panel panel-heading">Mis amigos</div>
       <a href='#' data-toggle="modal" data-target="#addfriend" class='btn btn-info high-right'>Añadir un amigo</a>
       <?php 
       if($_REQUEST["not_found"] == true){
        echo "<script>
        alertify.log('El usuario a añadir no se ha encontrado, o puede que haya habido un error en el sistema', 'error', 5000);
      </script>";
    }

    if($_REQUEST["error_existent"] == true){
      echo "<script>
      alertify.log('El usuario que has indicado ya está solicitado como amigo (o en tu lista de amigos). En caso contrario, ha ocurrido un error grave', 'error', 5000);
    </script>";
  }
  ?> 
  <div class="panel panel-body"> 
    <div class="form-group">
      <table class="table table-striped">
       <?php 					




       $arrayAmigos=$_SESSION["usuario"]->getAmigosParaConfirmar();

       foreach($arrayAmigos as $filaAmigo){

         if(isset($filaAmigo->foto)){
          echo "<tr class='warning text-color-black'><td class='col-md-1'><a href='perfilAmigo.php?email=".$filaAmigo->email."'><img src='".$filaAmigo->foto."' width='50px'/></a></td>";
        }
        else {
          echo "<tr class='warning text-color-black'><td class='col-md-1'><a href='perfilAmigo.php?email=".$filaAmigo->email."'><img src='img/default_user.png' width='50px'/></a></td>";
        }


        ?>
        <td class='col-md-4'><?php echo $filaAmigo->nombreUsuario; ?><br/><?php echo $filaAmigo->email; ?></td>
        <td class='col-md-1'> <span >
          <a class="btn btn-success boton-cuadrado" href="controladoras/aceptarUsuario.php?action=accept&email=<?php echo $filaAmigo->email;?>">V</a>
          <a class="btn btn-danger boton-cuadrado" href="controladoras/aceptarUsuario.php?action=deny&email=<?php echo $filaAmigo->email;?>">X</a>
        </span></td>
      </tr>
      <?php

    }


    $arrayAmigos=$_SESSION["usuario"]->getAmigosSinConfirmar();

    foreach($arrayAmigos as $filaAmigo){

      if(isset($filaAmigo->foto)){
        echo "<tr class='warning text-color-black'><td class='col-md-1'><a href='perfilAmigo.php?email=".$filaAmigo->email."'><img src='".$filaAmigo->foto."' width='50px'/></a></td>";
      }
      else {
        echo "<tr class='warning text-color-black'><td class='col-md-1'><a href='perfilAmigo.php?email=".$filaAmigo->email."'><img src='img/default_user.png' width='50px'/></a></td>";
      }
      ?>
      <td class='col-md-4'><?php echo $filaAmigo->nombreUsuario; ?><br/><?php echo $filaAmigo->email; ?></td>
      <td class='col-md-1'> <span >
        <label>Pendiente de confirmación</label>
      </span></td>
    </tr>
    <?php

  }



  $arrayAmigos=$_SESSION["usuario"]->getAmigos();

  foreach($arrayAmigos as $filaAmigo){

    if(isset($filaAmigo->foto)){
      echo "<tr><td class='col-md-1'><a href='perfilAmigo.php?email=".$filaAmigo->email."'><img src='".$filaAmigo->foto."' width='50px'/></a></td>";
    }
    else {
      echo "<tr><td class='col-md-1'><a href='perfilAmigo.php?email=".$filaAmigo->email."'><img src='img/default_user.png' width='50px'/></a></td>";
    }
    ?>
    <td class='col-md-4'><?php echo $filaAmigo->nombreUsuario; ?><br/><?php echo $filaAmigo->email; ?></td>
    <td class='col-md-1'><a onclick="confirmarEliminar('<?php echo $filaAmigo->email; ?>')"  class='btn btn-info'>Eliminar</a></td>
  </tr>
  <?php

}
?>
</table>						
</div>					
</div>				
</div>
</div> </div>

<div class="col-md-3"> </div> 
<br/>
</div>

<div id="addfriend" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Añadir un amigo</h3>
      </div>
      <div class="modal-body" style="text-align:left">
        <div class="row"></div>


        <form role="form" action="controladoras/addamigo.php">
          <div class="form-group">
            <label>Email del amigo a añadir</label>
            <input type="email" class="form-control" id="emailAmigoAdd" name="email" placeholder="Introduzca el email del amigo a añadir">
          </div>
          <button type="submit" class="btn btn-primary">Añadir amigo</button>
        </form>



      </div>
    </div>
  </div>  

</div>
<?php footer(); ?>

</body>





<script src="js/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
