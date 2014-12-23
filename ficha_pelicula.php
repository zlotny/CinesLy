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

<h1 class="tackle-right">Ficha de "<?php echo "$ObjPeli->titulo"; ?>"</h1>
<p class="tackle-right">En la ficha detallada de la película puedes ver su información, su póster y los comentarios de los usuarios. ¡Anímate a decir algo!</p>

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
     <div class="panel panel-default top-margin">
       <div class="panel-heading text-weight-bold">Ficha de la Película</div>
       <div class="panel-body">
        <div class="row-fluid">
          <div class="span6">
            <div class="direction-box top-margin-little">    
              <ul>
                <li class="list-no-deco"><strong class="step">Título: </strong><?php echo "$ObjPeli->titulo"; ?></li>
                <li class="list-no-deco"><strong class="step">Director: </strong><?php echo "$ObjPeli->director"; ?></li>
                <li class="list-no-deco"><strong class="step">Actores: </strong><?php echo "$ObjPeli->actores"; ?></li>
                <li class="list-no-deco"><strong class="step">Distribuidora: </strong><?php echo "$ObjPeli->distribuidora"; ?></li>
                <li class="list-no-deco"><strong class="step">Duración: </strong><?php echo "$ObjPeli->duracion";  ?></li>
                <!--<li><strong>Apta</strong> para todos los públicos.</li></ul>-->
              </ul>
              <strong>Valoración:</strong>
              <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-default">1</button>
                <button type="button" class="btn btn-default">2</button>
                <button type="button" class="btn btn-default">3</button>
                <button type="button" class="btn btn-default">4</button>
                <button type="button" class="btn btn-default">5</button>
              </div>   
                <button type="button" class="btn btn-default" onclick="alertify.success('Recomendación guardada con éxito')"><strong>Recomendar <strong></button>      
            </div>
           
          </div>
        </div>
      </div>
          
          <div class="top-margin">
            <div class="share-box-outer">
              <div class="panel panel-default">
                <div class=" text-weight-bold panel-heading">Comentarios</div>
                <div class="panel-body" >
                 <div class="input-group col-md-11" style="margin-left: -10px;" >
                   <span class="input-group-btn ">
                    <form method="POST" action="controladoras/inserComentPelControlador.php" >
                      <input type="hidden" value="<?php echo $ObjPeli->idPelicula; ?>" name="idPeli"/>
                      <input type="text" class="form-control" placeholder="Escribe un comentario" name="coments"/>
                      <input type="submit" class="btn btn-info" value="Publicar"/>          
                    </form>
                  </span>
                </div>
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
                    <a class="media-left" href="perfilAmigo.php?email=<?php echo $usuActual->email; ?>">
                      <?php

                      if(isset($usuActual->foto)){
                        echo "<img src='$usuActual->foto' alt='' height='50px' width='50px' class='thumbnail'>";

                      }else{
                        echo "<img src='img/default_user.png' alt='' height='50px' width='50px' class='thumbnail'>";

                      }

                      ?>
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
            </div>
          </ul>
        </div>
      </div>
    </div>


  </div>
</div>
</div>
</div>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/valoracion.min.js"></script>



</body>