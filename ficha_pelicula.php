<?php 
include "cabecera.php";
include_once "modelos/pelicula.php";
include_once "modelos/usuario.php";
include_once "sesion_segura.php";
?>

<html lang="es">
<head>
 <meta charset="utf-8">
 <title>Ficha de Película</title>

 <meta http-equiv="X-UA-Compatible" content="IE=edge">     
 <meta name="viewport" content="width=device-width, initial-scale=1">    
 <link rel="stylesheet" href="bootstrap/css/bootstrap.css"  />     
 <link rel="stylesheet" href="style/style.css"  />
 <link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
 <link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
 <script src="js/alertify/lib/alertify.min.js"> </script>

</head>

<body>
  <?php 
  cabeceraPantallaPrincipal(); 
  session_start();	
  $idPeli=$_REQUEST["id"];
  $ObjPeli=Pelicula::getObjetoPelicula($idPeli);

  if($_REQUEST["insertado"] == true){
    ?>
    <script>
      alertify.log('Se ha insertado el comentario correctamente', 'success', 3000);
    </script>
    <?php
  }

  ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 top-margin">

       <?php 
       if(  substr($ObjPeli->foto, 0,3) == "img" ){
        echo "<img src='".$ObjPeli->foto."' alt='null' height='360px' width='100%' class='thumbnail'>";
      }else {echo "<tr><td class='col-md-1'><img src='img/movie_no_poster.jpg' width='100%' /></td>";}
      ?>


    </div>
    <div class="col-lg-9">
     <div class="panel panel-default top-margin inside-padding">
       <div>
        <div class="row-fluid">
          <div class="span6">
            <div class="direction-box top-margin-little">
              <ul>
                <li><strong class="step">Título: </strong><?php echo "$ObjPeli->titulo"; ?></li>
                <li><strong class="step">Director: </strong><?php echo "$ObjPeli->director"; ?></li>
                <li><strong class="step">Actores: </strong><?php echo "$ObjPeli->actores"; ?></li>
                <li><strong class="step">Distribuidora: </strong><?php echo "$ObjPeli->distribuidora"; ?></li>
                <li><strong class="step">Duración: </strong><?php echo "$ObjPeli->duracion";  ?></li>
                <!--<li><strong>Apta</strong> para todos los públicos.</li></ul>-->
              </div>
            </div>
          </div>
        </div>
        <div class="input-group col-md-6 " style="margin:0px 0px 3px 0px">
          <span class="input-group-btn">

            <form method="POST" class="pull-right" action="controladoras/inserComentPelControlador.php" >
              <input type="hidden" value="<?php echo $ObjPeli->idPelicula; ?>" name="idPeli"/>
              <input type="text" class="form-control" placeholder="Escribe un comentario" name="coments"/>
              <input type="submit" class="btn btn-info" value="Publicar"/>					
            </form>
          </span>
        </div>
        <div class="top-margin">
          <div class="share-box-outer">
            <h4>Comentarios película</h4>
          </div>
          <ul class="media-list">
            <?php 					

            $arrayComentarios=Pelicula::getComentariosPelicula($ObjPeli->idPelicula);
            $arrayUsuarios=$arrayComentarios['usuario'];
            $arrayComents=$arrayComentarios['comentario'];

            for($i=0; $i<sizeof($arrayComents); $i++){
             $usuActual = Usuario::getObjetoUsuario($arrayUsuarios[$i]);
             $cmtActual = $arrayComents[$i];

             ?>

             <li class="media">

              <div class="well">

                <a class="media-left" href="#">
                  <img src="img/default_user.png" alt="" height="50px" width="50px" class="thumbnail">
                </a>

                <div class="media-body">
                  <h4 class="media-heading"><?php echo $usuActual->nombreUsuario; ?></h4>
                  <p><?php echo $cmtActual; ?></p>
                </div>
              </div>
            </li>

            <?php
          }
          ?>
        </ul>
      </div>



    </div>
  </div>
</div>
</div>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>



<?php footer(); ?>



</body>