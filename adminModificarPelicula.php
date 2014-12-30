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

  if($_REQUEST["inserccion"] == "noTitle"){
    echo "<script>alertify.error('Inserte un titulo a la pelicula.');</script>";
  }
  if($_REQUEST["inserccion"] == "bad"){
    echo "<script>alertify.error('Ha ocurrido un error al insertar la pelicula.');</script>";
  }
  if($_REQUEST["inserccion"] == "good"){
    echo "<script>alertify.success('La pelicula se ha insertado correctamente');</script>";
  }

  ?>




  <h1 class="tackle-right"><?php echo $text["h1AdModPel"];?></h1>
  
  <div class="col-md-1"> </div>
  <div class="col-md-8 ">
    <ul class="media-list" style="margin-left:-20px;">

      <!-- Paneles de los cines -->
      <?php

      if(isset($filtro) ){
        $arrayPeliculas=$filtro;
        foreach($arrayPeliculas as $panelPelicula){

          echo '<li class="media" style="margin-top: 15px;">';
          echo '<div class="col-md-12 ">';
          echo '<div class="well">';
          echo '<a class="media-left" href="#">';

          if(substr($panelPelicula["foto"],0,3) == "img"){
            echo '<img src="'.$panelPelicula["foto"].'" alt="" height="140px" width="90px" class="thumbnail">';

          }else{
            echo '<img src="img/movie_no_poster.jpg" alt="" height="140px" width="90px" class="thumbnail">';

          }

          echo '</a>';  
          echo '<div class="media-body">';
            echo "<p><b>".$text['idFilm']."</b>".$panelPelicula['idPelicula']."</p>";
            echo "<p><b>".$text['titulo']."</b>".$panelPelicula['titulo']."</p>";
            echo "<p><b>".$text['genero']."</b>".$panelPelicula['genero']."</p>";
            echo "<p><b>".$text['anho']."</b>".$panelPelicula['anho']."</p>";
            echo "<p><b>".$text['sinopsis']."</b>".$panelPelicula['sinopsis']."</p>";
          ;?>
          <!--borrarase en un futuro -->
          <div class="col-md-8"> </div>
          <div class="col-md-4">
            <!--editar perfil-->
            <button type="button" class="btn btn-primary" data-toggle="modal" aria-label="Left Align" data-target="#modificarPelicula<?php echo $a->idPelicula;?>" > 
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> <?php echo $text["editar"];?>
            </button>

            <!--EliminarPerfil-->
            <button type="button" class="btn btn-danger" aria-label="Left Align" onclick="eliminarPelicula('<?php echo $a->idPelicula?>');">
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> <?php echo $text["eliminar"];?>
            </button>
          </div>

          <!-- Pagina modal para modificar perfil -->
          <div id="modificarPelicula<?php echo $a->idPelicula;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <!--enctype="multipart/form-data" añadido por min-->
            <form id="form-edit-perfil"  enctype="multipart/form-data" action="controladoras/actualizarPelicula.php?idPelicula=<?php echo $panelPelicula["idPelicula"]; ?>" method="POST">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4><?php echo $text["editPeli"];?></h4>
                  </div>
                  <div class="modal-body">
                    <label for="nuevoTitulo" class=""><?php echo $text["cambTitPeli"];?></label>
                    <input type="text" name="nuevoTitulo" class="form-control form-pers" value="<?php echo $panelPelicula["titulo"];?>"><br/>    

                    <label for="director" class=""><?php echo $text["cambDirect"];?></label>
                    <input type="text" name="director" class="form-control form-pers" placeholder="<?php echo $text["m1"];?>" value="<?php echo $panelPelicula["director"]; ?>"> <br/>

                    <label for="actores" class=""><?php echo $text["cambActo"];?></label>
                    <input type="text" name="actores" class="form-control form-pers" placeholder="<?php echo $text["m2"];?>" value="<?php echo $panelPelicula["actores"]; ?>"> <br/>

                    <label for="distribuidora" class=""><?php echo $text["cambDist"];?></label>
                    <input type="text" name="distribuidora" class="form-control form-pers" placeholder="<?php echo $text["m3"];?>" value="<?php echo $panelPelicula["distribuidora"]; ?>"> <br/>

                    <label for="duracion" class=""><?php echo $text["cambDur"];?></label>
                    <input type="text" name="duracion" class="form-control form-pers" placeholder="<?php echo $text["m4"];?>" value="<?php echo $panelPelicula["duracion"]; ?>"> <br/>

                    <label for="anho" class=""><?php echo $text["cambAnho"];?></label>
                    <input type="text" name="anho" class="form-control form-pers" placeholder="<?php echo $text["m5"];?>" value="<?php echo $panelPelicula["anho"]; ?>"> <br/>


                    <label for="fechaEstreno" class=""><?php echo $text["cambFechEst"];?></label>
                    <input type="text" name="fechaEstreno" class="form-control form-pers" placeholder="<?php echo $text["m6"];?>" value="<?php echo $panelPelicula["fecha_estreno"]; ?>"> <br/>


                    <label for="genero" class=""><?php echo $text["cambGen"];?></label>
                    <input type="text" name="genero" class="form-control form-pers" placeholder="<?php echo $text["m7"];?>" value="<?php echo $panelPelicula["genero"]; ?>"> <br/>

                    <label for="pais" class=""><?php echo $text["cambPais"];?></label>
                    <input type="text" name="pais" class="form-control form-pers" placeholder="<?php echo $text["m8"];?>" value="<?php echo $panelPelicula["pais"]; ?>"> <br/>

                    <label for="tipoPeli" class="form-control"><?php echo $text["cambTipo"];?></label><br/>

                    <select name="tipoPeli" class="form-control" aria-labelledby="buscar_peli">
                      <option  value="cartelera"><?php echo $text["carteleras"];?></option>
                      <option  value="especial"><?php echo $text["especial"];?></option>
                      <option  value="proximamente"><?php echo $text["proximamente"];?></option>
                    </select>
                    <br/><br/>

                    <label for="sinopsis" class=""><?php echo $text["cambSinop"];?></label> 
                    <textarea class="form-control eslogan" name="sinopsis" onblur="document.getElementById('bio-form').submit()"><?php echo $panelPelicula["sinopsis"]; ?></textarea><br/>

                    <label for="foto" class=""><?php echo $text["cambFoto"];?></label>
                    <!-- subir foto a implemetar en un futuro-->
                    <!-- MAX_FILE_SIZE debe preceder el campo de entrada de archivo -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                    <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
                    <input name="userfile" type="file" />


                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="idPelicula" class="btn btn-success" value="hola"><?php echo $text["guardCamb"];?></button>
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
        }
      }
      else{
        $arrayPeliculas=Pelicula::mostrarPeliculas();
        foreach($arrayPeliculas as $panelPelicula){
          $a=Pelicula::getObjetoPelicula($panelPelicula["idPelicula"]);
          echo '<li class="media">';
          echo '<div class="col-md-12 ">';
          echo '<div class="well">';
          echo '<a class="media-left" href="#">';
          if(substr($panelPelicula["foto"],0,3) == "img"){
            echo '<img src="'.$panelPelicula["foto"].'" alt="" height="140px" width="90px" class="thumbnail">';

          }else{
            echo '<img src="img/movie_no_poster.jpg" alt="" height="140px" width="90px" class="thumbnail">';

          }
          echo '</a>';  
          echo '<div class="media-body">';         
          echo "<p><b>".$text['idFilm']."</b>".$panelPelicula['idPelicula']."</p>";
          echo "<p><b>".$text['titulo']."</b>".$panelPelicula['titulo']."</p>";
          echo "<p><b>".$text['genero']."</b>".$panelPelicula['genero']."</p>";
          echo "<p><b>".$text['anho']."</b>".$panelPelicula['anho']."</p>";
          echo "<p><b>".$text['sinopsis']."</b>".$panelPelicula['sinopsis']."</p>";
          ;?>

          <!-- Modificar una pelicula--> 
          <div class="col-md-8"> </div>
          <div class="col-md-4">
            
            <!--editar perfil-->
            <button type="button" class="btn btn-primary" data-toggle="modal" aria-label="Left Align" data-target="#modificarPelicula<?php echo $a->idPelicula;?>" > 
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> <?php echo $text["editar"];?>
            </button>

            <!--EliminarPerfil-->
            <button type="button" class="btn btn-danger" aria-label="Left Align" onclick="eliminarPelicula('<?php echo $panelPelicula["idPelicula"]?>', '<?php echo $panelSesion["idPelicula"]?>');">
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> <?php echo $text["eliminar"];?>
            </button>

    	</div>
    
    <!-- Pagina modal para modificar perfil -->
    <div id="modificarPelicula<?php echo $a->idPelicula;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <!--enctype="multipart/form-data" añadido por min-->
      <form id="form-edit-perfil"  enctype="multipart/form-data" action="controladoras/actualizarPelicula.php?idPelicula=<?php echo $panelPelicula["idPelicula"]; ?>" method="POST">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4><?php echo $text["editPeli"];?></h4>
                  </div>
                  <div class="modal-body">
                    <label for="nuevoTitulo" class=""><?php echo $text["cambTitPeli"];?></label>
                    <input type="text" name="nuevoTitulo" class="form-control form-pers" value="<?php echo $panelPelicula["titulo"];?>"><br/>    

                    <label for="director" class=""><?php echo $text["cambDirect"];?></label>
                    <input type="text" name="director" class="form-control form-pers" placeholder="<?php echo $text["m1"];?>" value="<?php echo $panelPelicula["director"]; ?>"> <br/>

                    <label for="actores" class=""><?php echo $text["cambActo"];?></label>
                    <input type="text" name="actores" class="form-control form-pers" placeholder="<?php echo $text["m2"];?>" value="<?php echo $panelPelicula["actores"]; ?>"> <br/>

                    <label for="distribuidora" class=""><?php echo $text["cambDist"];?></label>
                    <input type="text" name="distribuidora" class="form-control form-pers" placeholder="<?php echo $text["m3"];?>" value="<?php echo $panelPelicula["distribuidora"]; ?>"> <br/>

                    <label for="duracion" class=""><?php echo $text["cambDur"];?></label>
                    <input type="text" name="duracion" class="form-control form-pers" placeholder="<?php echo $text["m4"];?>" value="<?php echo $panelPelicula["duracion"]; ?>"> <br/>

                    <label for="anho" class=""><?php echo $text["cambAnho"];?></label>
                    <input type="text" name="anho" class="form-control form-pers" placeholder="<?php echo $text["m5"];?>" value="<?php echo $panelPelicula["anho"]; ?>"> <br/>


                    <label for="fechaEstreno" class=""><?php echo $text["cambFechEst"];?></label>
                    <input type="text" name="fechaEstreno" class="form-control form-pers" placeholder="<?php echo $text["m6"];?>" value="<?php echo $panelPelicula["fecha_estreno"]; ?>"> <br/>


                    <label for="genero" class=""><?php echo $text["cambGen"];?></label>
                    <input type="text" name="genero" class="form-control form-pers" placeholder="<?php echo $text["m7"];?>" value="<?php echo $panelPelicula["genero"]; ?>"> <br/>

                    <label for="pais" class=""><?php echo $text["cambPais"];?></label>
                    <input type="text" name="pais" class="form-control form-pers" placeholder="<?php echo $text["m8"];?>" value="<?php echo $panelPelicula["pais"]; ?>"> <br/>

                    <label for="tipoPeli" class=""><?php echo $text["cambTipo"];?></label><br/>
                      <select name="tipoPeli" class="form-control" aria-labelledby="buscar_peli">
                        <option  value="cartelera"><?php echo $text["carteleras"];?></option>
                        <option  value="especial"><?php echo $text["especial"];?></option>
                        <option  value="proximamente"><?php echo $text["proximamente"];?></option>
                    </select>
                    <br/><br/>

                    <label for="sinopsis" class=""><?php echo $text["cambSinop"];?></label> 
                    <textarea class="form-control eslogan" name="sinopsis" onblur="document.getElementById('bio-form').submit()"><?php echo $panelPelicula["sinopsis"]; ?></textarea><br/>

                    <label for="foto" class=""><?php echo $text["cambFoto"];?></label>
                    <!-- subir foto a implemetar en un futuro-->
                    <!-- MAX_FILE_SIZE debe preceder el campo de entrada de archivo -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                    <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
                    <input name="userfile" type="file" />


                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="idPelicula" class="btn btn-success" value="hola"><?php echo $text["guardCamb"];?></button>
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
  }


}

?> 

</ul>
</div>

<!-- Barra lateral   col-md-offset-10 -->

<div class="admin-custom-panel-right-fixed col-md-3" >
 <div class="panel panel-default">

  <div class="panel-body">
  <!-- insertar una pelicula-->
    <button type="button" class="btn btn-primary" data-toggle="modal" aria-label="Left Align" data-target="#insertarPelicula" > 
      <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> <?php echo $text["inserMov"];?>
    </button>

    <div id="insertarPelicula" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <!--enctype="multipart/form-data" añadido por min-->
      <form id="form-edit-perfil"  enctype="multipart/form-data" action="controladoras/insertarPelicula.php" method="POST">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4><?php echo $text["inserMov"];?></h4>
            </div>
            <div class="modal-body">
              <label for="nuevoTitulo" class=""><?php echo $text["tituloPel"];?></label>
              <input type="text" name="nuevoTitulo" class="form-control form-pers" value=""><br/>    
              
              <label for="director" class=""><?php echo $text["director"];?></label>
              <input type="text" name="director" class="form-control form-pers" placeholder="<?php echo $text["m1"];?>" value=""> <br/>
              
              <label for="actores" class=""><?php echo $text["actores"];?></label>
              <input type="text" name="actores" class="form-control form-pers" placeholder="<?php echo $text["m2"];?>" value=""> <br/>
              
              <label for="distribuidora" class=""><?php echo $text["distr"];?></label>
              <input type="text" name="distribuidora" class="form-control form-pers" placeholder="<?php echo $text["m3"];?>" value=""> <br/>
              
              <label for="duracion" class=""><?php echo $text["duracion"];?></label>
              <input type="text" name="duracion" class="form-control form-pers" placeholder="<?php echo $text["m4"];?>" value=""> <br/>
              
              <label for="anho" class=""><?php echo $text["anho"];?></label>
              <input type="text" name="anho" class="form-control form-pers" placeholder="<?php echo $text["m5"];?>" value=""> <br/>
              
              <label for="genero" class=""><?php echo $text["genero"];?></label>
              <input type="text" name="genero" class="form-control form-pers" placeholder="<?php echo $text["m9"];?>" value=""> <br/>
              
              <label for="pais" class=""><?php echo $text["pais"];?></label>
              <input type="text" name="pais" class="form-control form-pers" placeholder="<?php echo $text["m8"];?>" value=""> <br/>
              
              <label for="tipoPeli" class="">Tipo:</label><br/>
              <select name="tipoPeli" class="form-control" aria-labelledby="buscar_peli">
                <option  value="cartelera"><?php echo $text["carteleras"];?></option>
                <option  value="especial"><?php echo $text["especial"];?></option>
                <option  value="proximamente"><?php echo $text["proximamente"];?></option>
              </select>
              <br/><br/>

              <label for="fechaEstreno" class="">Fecha de estreno(AAAA-MM-DD):</label>
              <input type="text" name="fechaEstreno" class="form-control form-pers" placeholder="<?php echo $text["m6"];?>" value=""> <br/>

              <label for="sinopsis" class="">Sinopsis:</label> 
              <textarea class="form-control eslogan" name="sinopsis" onblur="document.getElementById('bio-form').submit()">""</textarea><br/>
              
              <label for="foto" class="">foto:</label>
              <!-- subir foto a implemetar en un futuro-->
              <!-- MAX_FILE_SIZE debe preceder el campo de entrada de archivo -->
              <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
              <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
              <input name="userfile" type="file" />


            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success"><?php echo $text["guardCamb"];?></button>
              <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $text["cerrar"];?></button>
            </div>
          </div>
        </div>
      </form>
    </div>  
    <div class="clearfix"></div>

    <br>

    <p><?php echo $text["pBusq"];?></p>

    <!-- formulario para buscar pelicula-->
    <form role="form" action="controladoras/adminFiltrarCatalogo.php" method="post">

      <div class="input-group">

        <input name="busqueda" type="text" class="form-control" placeholder="<?php echo $text["findFilm"];?>">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-success"><?php echo $text["find"];?></button>
        </span>
      </div>            
      <br>
      <div class="form-group">
        <label for="tipo_peli"><?php echo $text["typeFlim"];?></label><br>
            <select name="tipo" class="form-control" aria-labelledby="buscar_peli">
              <option  value=""><?php echo $text["allFilms"];?></option>
              <option  value="cartelera"><?php echo $text["carteleras"];?></option>
              <option  value="especial"><?php echo $text["especial"];?></option>
              <option  value="proximamente"><?php echo $text["proximamente"];?></option>
            </select>

      </div>
      <div class="form-group">
        <label >Género</label>

        <table class="table table-striped">

          <tr ><td><?php echo $text["accion"];?></td><td><input name="accion" value="accion" class="pull-right" type="checkbox"> <span class="pull-right"></span></td></tr>
              <tr ><td><?php echo $text["aventura"];?></td><td><input name="aventura" value="aventura" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td><?php echo $text["comedia"];?></td><td><input name="comedia" value="comedia" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td><?php echo $text["drama"];?></td><td><input name="drama" value="drama" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td><?php echo $text["fantasia"];?></td><td><input name="fantasia" value="fantasia" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td><?php echo $text["ficcion"];?></td><td><input name="ficcion" value="ficcion" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td><?php echo $text["porn"];?></td><td><input name="pornografia" value="pornografia"  class="pull-right" type="checkbox" > <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td><?php echo $text["romantica"];?></td><td><input name="romantica" value="romantica" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td><?php echo $text["suspense"];?></td><td><input name="suspense" value="suspense" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
              <tr ><td><?php echo $text["terror"];?></td><td><input name="terror" value="terror" class="pull-right" type="checkbox"> <span class="pull-right">&nbsp;</span></td></tr>
        </table>
      </div>

    </form>
  </div>
</div>

</div>

<?php footer(); ?>


</body> 

<script src="js/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

</html>


