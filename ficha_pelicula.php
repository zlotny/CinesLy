<?php 
include	"cabecera.php";
include "modelos/pelicula.php";
include "modelos/usuario.php";
?>

    <html lang="es">
    <head>
       <meta charset="utf-8">
       <title>CinesLy</title>

       <meta http-equiv="X-UA-Compatible" content="IE=edge">     
       <meta name="viewport" content="width=device-width, initial-scale=1">    
       <link rel="stylesheet" href="bootstrap/css/bootstrap.css"  />     
       <link rel="stylesheet" href="style/style.css"  />

   </head>

   <body>
    <?php 
		cabeceraPantallaPrincipal(); 
		session_start();	
		$IdPeli=$_REQUEST["IdPeli"];
		//$ObjPeli=Pelicula::getObjetoPelicula($IdPeli);
		$ObjPeli=new Pelicula(00001,'Hay Leyenda','Isaac González',' ','120 min',' ','Andoni Da Silva',2014,'18/12//2014','Comedia','España',' ',' ',' ',0);
		//Pelicula::comentarPelicula('00001','user@user.com','Hola mis putos amigos');
	?>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 top-margin">
			
			<?php 
				if(isset($filaAmigo->foto)){
				echo "<img src='".$ObjPeli->foto."' alt='null' height='360px' width='100%' class='thumbnail'>";
				}else {echo "<tr><td class='col-md-1'><img src='img/HayLeyenda.jpg' width='100%' /></td>";}
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
                            <li><strong>Apta</strong> para todos los públicos.</li></ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group col-md-6 pull-right" style="margin:0px 0px 3px 0px">
                <span class="input-group-btn">

                    <form method="POST" action="controladoras/inserComentPelControlador.php" >
						<input type="submit" class="btn btn-info" value="Publicar"/>
						<input type="hidden" value="<?php echo $ObjPeli->idPelicula; ?>" name="idPeli"/>
						<input type="text" class="form-control" placeholder="Escribe un comentario" name="coments"/>
					</form>
                </span>
            </div>
			    <div class="top-margin">
                <div class="share-box-outer">
                    <h4>Comentarios película</h4>
                </div>
                <ul class="media-list">
                    <li class="media">

                        <div class="well">

                            <a class="media-left" href="#">
                                <img src="img/default_user.png" alt="" height="50px" width="50px" class="thumbnail">
                            </a>
                            
							<div class="media-body">
                                <h4 class="media-heading">Nombre de Usuario</h4>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

                            </div>

                        </div>

                    </li>
                    <li class="media">

                        <div class="well">

                            <a class="media-left" href="#">
                                <img src="img/default_user.png" alt="" height="50px" width="50px" class="thumbnail">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nombre de Usuario</h4>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

                            </div>

                        </div>

                    </li>

                    <li class="media">

                        <div class="well">

                            <a class="media-left" href="#">
                                <img src="img/default_user.png" alt="" height="50px" width="50px" class="thumbnail">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nombre de Usuario</h4>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

                            </div>

                        </div>

                    </li>

                    <li class="media">

                        <div class="well">

                            <a class="media-left" href="#">
                                <img src="img/default_user.png" alt="" height="50px" width="50px" class="thumbnail">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nombre de Usuario</h4>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

                            </div>

                        </div>

                    </li>



                </ul>
            </div>



        </div>
    </div>
</div>
</div>
<script src="javascript/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="javascript/docs.min.js"></script>
<script src="javascript/ie10-viewport-bug-workaround.js"></script>
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