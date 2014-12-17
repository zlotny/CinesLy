<?php include "cabecera.php"; ?>

<?php
include_once "modelos/usuario.php";		
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="javascript/alertify/lib/alertify.min.js"> </script>
  <script src="javascript/general.js"> </script>
  <title>Amigos</title>


  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="javascript/alertify/themes/alertify.core.css" />
  <link rel="stylesheet" href="javascript/alertify/themes/alertify.default.css" />
  <link href="style/style.css" rel="stylesheet" />

</head>
<body>

  <?php cabeceraPantallaPrincipal(); 
  session_start();
  ?>
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

    ?> 
    <div class="panel panel-body"> 
      <div class="form-group">
        <table class="table table-striped">
         <?php 					
         $arrayAmigos=$_SESSION["usuario"]->getAmigos();

         foreach($arrayAmigos as $filaAmigo){

           if(isset($filaAmigo->foto)){
             echo "<tr><td class='col-md-1'><img src='".$filaAmigo->foto."' width='50px'/></td>";
           }else {echo "<tr><td class='col-md-1'><img src='img/default_user.png' width='50px'/></td>";}

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
          <button type="submit" class="btn btn-default">Añadir amigo</button>
        </form>




      </div>
    </div>
  </div>  

  </div

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





<script src="javascript/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
