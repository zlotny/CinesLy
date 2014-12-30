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
  <link rel="stylesheet" href="js/alertify/themes/alertify.bootstrap.css" />

</head>
<body>
 <?php
 session_start();
 include_once "cabecera.php";
 include_once "modelos/evento.php";
 include_once "modelos/usuario.php";
 include_once "modelos/sesion.php";
 cabeceraVerGrupo();
 $grupoActual = Evento::getGrupoById($_REQUEST["id"]);
 $usuariosDelGrupo =  Evento::getArrayIntegrantes($_REQUEST["id"]);

 ?>
 <div class="row top-margin">
   <div class="col-sm-3"></div>
   <div class="col-sm-6">
     <div class="panel panel-default">
       <div class="panel-heading"><?php echo $text["verGrupo"];?></div>
       <div class="panel-body">


        <div class="form-group">
            <label for="nombre_grupo"><?php echo $text["nameGroup"];?></label><span class="little-right"><?php echo $grupoActual->nombre; ?></span>
          </div>
          <div class="form-group">
            <label for="grupo_peli"><?php echo $text["film"];?></label><span class="little-right"><?php  
            $peli = Sesion::getPeliSesion($grupoActual->idSesion);
            echo $peli->titulo;
            ?></span>
            
            
          </div>
          <div class="form-group">
            <label for="grupo_sesion"><?php echo $text["sesion"];?>:</label><span class="little-right"><?php echo $grupoActual->idSesion; ?></span>
            
          </div>
          <label for="grupo_amigos"><?php echo $text["friendsGroup"];?></label>
          <div class="form-group scrollable-table">
            <table class="table table-striped ">
              <?php
              foreach($usuariosDelGrupo as $user){
                echo "<tr ><td>$user->nombreUsuario</td></tr>";
              }

              ?>


              

            </table>
          </div>
		  <button data-toggle="modal" data-target="#editGroup" class="btn btn-success"><?php echo $text["editar"];?></button>
		  
		  
		  
		  
		  <div id="editGroup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            
            <form action="#" method="POST">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4><?php echo $text["editGroup"];?></h4>
                  </div>
                  <div class="modal-body">
                    
                    <label for="pais" class=""><?php echo $text["cambNomGrup"];?></label>
                    <input type="text" name="pais" class="form-control form-pers" placeholder="Introduzca nuevo nombre" value="<?php echo $grupoActual->nombre; ?>"> <br/>

                    <label for="pais" class=""><?php echo $text["cambPel"];?></label>
                    <input type="text" name="pais" class="form-control form-pers" placeholder="Introduzca nuevo nombre" value="<?php echo $peli->titulo; ?>"> <br/>

                    <label for="pais" class=""><?php echo $text["cambSes"];?></label>
                    <input type="text" name="pais" class="form-control form-pers" placeholder="Introduzca nuevo nombre" value="<?php echo $grupoActual->idSesion; ?>"> <br/>


                  </div>
                  <div class="modal-footer">
                    <button name="idPelicula" class="btn btn-success" value="hola"><?php echo $text["guardCamb"];?></button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $text["cerrar"];?></button>
                  </div>
                </div>
              </div>
            </form>
          </div>  
          <div class="clearfix"></div>
		
		  
          <a href="mis_grupos.php"  class="btn btn-success pull-right"><?php echo $text["volver"];?></a>
      </div>
    </div>
  </div>
  <div class="col-sm-3"></div>
</div>

<script src="js/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

<?php footer(); ?>

</body>	
</html>