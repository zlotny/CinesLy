<?php 
include_once "sesion_segura.php";
include_once "cabecera.php";
    



?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/alertify/lib/alertify.min.js"> </script>
  <script src="js/general.js"> </script>
  <title>Amigos - CinesLy</title>


  <link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
  <link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
  <link rel="stylesheet" href="js/alertify/themes/alertify.bootstrap.css" />

  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link href="style/style.css" rel="stylesheet" />

</head>
<body>

  <?php 
  cabeceraAmigos(); 

  if($_REQUEST["filtrado"]==true){
    $filtro=$_SESSION["filtro"];
    unset($_SESSION["filtro"]);
  }

  $posiblesAmigos = $_SESSION["usuario"]->getPosiblesAmigos();

// print_r($text);
if(isset($filtro) ){
  ?>

 

  <h1 class="tackle-right"><?php echo $text["h1Amigos"];?></h1>
  <p class="tackle-right"><?php echo $text["pAmigos"];?></p>
  <div class="row top-margin">
    <div class="col-md-1"> </div>
    <div class="col-md-6">
      <div class="panel panel-default">
       <div class="panel panel-heading"><?php echo $text["misAmigos"];?></div>
       <a href='#' data-toggle="modal" data-target="#addfriend" class='btn btn-info high-right'><?php echo $text["addFriend"];?></a>
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





   



  $arrayAmigos=$_SESSION["usuario"]->getAmigos();

  foreach($filtro as $amigoFiltrado){

    $filaAmigo=Usuario::getObjetoUsuario($amigoFiltrado["email"]);
    if(isset($filaAmigo->foto)){
      echo "<tr><td class='col-md-1'><a href='perfilAmigo.php?email=".$filaAmigo->email."'><img src='".$filaAmigo->foto."' width='50px'/></a></td>";
    }
    else {
      echo "<tr><td class='col-md-1'><a href='perfilAmigo.php?email=".$filaAmigo->email."'><img src='img/default_user.png' width='50px'/></a></td>";
    }

$url = $_SERVER['PHP_SELF'];  
$server = $_SERVER["SERVER_NAME"]; 

    ?>
    <td class='col-md-4'><?php echo $filaAmigo->nombreUsuario; ?><br/><?php echo $filaAmigo->email; ?></td>
    <td class='col-md-1'><a onclick="pruebaEliminar('<?php echo $filaAmigo->email; ?>','<?php echo $server.$url ?>')"  class='btn btn-info'><?php echo $text["elimnar"];?></a></td>
  </tr>
  <?php

}
?>
</table>            
</div>          
</div>        
</div>
</div> 




<div class="col-md-4"> 

  <div class="panel panel-default">
   <div class="panel panel-heading"><?php echo $text["pPersonas"];?></div>
   <div class="panel panel-body">
     <table class="table table-striped">
      <?php
      foreach($posiblesAmigos as $filaAmigo){
        echo "<form role='form' action='controladoras/addamigo.php'>";
        if(isset($filaAmigo->foto)){
          echo "<tr><td class='col-md-1'><a href='perfilAmigo.php?email=".$filaAmigo->email."'><img src='".$filaAmigo->foto."' width='50px'/></a></td>";
        }
        else {
          echo "<tr><td class='col-md-1'><a href='perfilAmigo.php?email=".$filaAmigo->email."'><img src='img/default_user.png' width='50px'/></a></td>";
        }
        ?>
        <td class='col-md-4'><?php echo $filaAmigo->nombreUsuario; ?><br/><?php echo $filaAmigo->email; ?></td>
        <input type="hidden" id="emailAmigoAdd" name="email" value="<?php echo $filaAmigo->email; ?>" />
        <td class='col-md-1'><input type="submit" class='btn btn-info' value="<?php echo $text["add"];?>"></td>
      </tr>
      <?php
      echo "</form>";
    }
    ?>







  </table>
</div>
</div> 
</div>


<div class="col-md-1"> </div> 
<br/>
</div>

<div id="addfriend" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3><?php echo $text["addFriend"];?></h3>
      </div>
      <div class="modal-body" style="text-align:left">
        <div class="row"></div>


        <form role="form" action="controladoras/addamigo.php">
          <div class="form-group">
            <label><?php echo $text["emailFriend"];?></label>
            <input type="email" class="form-control" id="emailAmigoAdd" name="email" placeholder="<?php echo $text["emailFriend1"];?>">
          </div>
          <button type="submit" class="btn btn-primary"><?php echo $text["addFriend1"];?></button>
        </form>



      </div>
    </div>
  </div>  

</div>


<?phpfooter(); 






}else{
  ?>









  <h1 class="tackle-right"><?php echo $text["h1Amigos"];?></h1>
  <p class="tackle-right"><?php echo $text["pAmigos"];?> </p>
  <div class="row top-margin">
    <div class="col-md-1"> </div>
    <div class="col-md-6">
      <div class="panel panel-default">
       <div class="panel panel-heading"><?php echo $text["misAmigos"];?></div>
       <a href='#' data-toggle="modal" data-target="#addfriend" class='btn btn-info high-right'><?php echo $text["addFriend"];?></a>
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
        <label><?php echo $text["pendConf"];?></label>
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

$url = $_SERVER['PHP_SELF'];  
$server = $_SERVER["SERVER_NAME"]; 

    ?>
    <td class='col-md-4'><?php echo $filaAmigo->nombreUsuario; ?><br/><?php echo $filaAmigo->email; ?></td>
    <td class='col-md-1'><a onclick="pruebaEliminar('<?php echo $filaAmigo->email; ?>','<?php echo $server.$url ?>')"  class='btn btn-info'><?php echo $text["eliminar"];?></a></td>
  </tr>
  <?php

}
?>
</table>						
</div>					
</div>				
</div>
</div> 


<div class="col-md-4"> 

  <div class="panel panel-default">
   <div class="panel panel-heading"><?php echo $text["pPersonas"];?></div>
   <div class="panel panel-body">
     <table class="table table-striped">
      <?php
      foreach($posiblesAmigos as $filaAmigo){
        echo "<form role='form' action='controladoras/addamigo.php'>";
        if(isset($filaAmigo->foto)){
          echo "<tr><td class='col-md-1'><a href='perfilAmigo.php?email=".$filaAmigo->email."'><img src='".$filaAmigo->foto."' width='50px'/></a></td>";
        }
        else {
          echo "<tr><td class='col-md-1'><a href='perfilAmigo.php?email=".$filaAmigo->email."'><img src='img/default_user.png' width='50px'/></a></td>";
        }
        ?>
        <td class='col-md-4'><?php echo $filaAmigo->nombreUsuario; ?><br/><?php echo $filaAmigo->email; ?></td>
        <input type="hidden" id="emailAmigoAdd" name="email" value="<?php echo $filaAmigo->email; ?>" />
        <td class='col-md-1'><input type="submit" class='btn btn-info' value="<?php echo $text["add"];?>"></td>
      </tr>
      <?php
      echo "</form>";
    }
    ?>







  </table>
</div>
</div> 
</div>


<div class="col-md-1"> </div> 
<br/>
</div>

<div id="addfriend" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3><?php echo $text["addFriend1"];?></h3>
      </div>
      <div class="modal-body" style="text-align:left">
        <div class="row"></div>


        <form role="form" action="controladoras/addamigo.php">
          <div class="form-group">
            <label><?php echo $text["emailFriend"];?></label>
            <input type="email" class="form-control" id="emailAmigoAdd" name="email" placeholder="<?php echo $text["emailFriend1"];?>">
          </div>
          <button type="submit" class="btn btn-primary"><?php echo $text["addFriend1"];?></button>
        </form>



      </div>
    </div>
  </div>  

</div>


<?php footer();} ?>

</body>





<script src="js/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
