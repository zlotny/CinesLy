<?php
error_reporting(E_ERROR | E_PARSE);


include_once "multidioma/esp.php";
include_once "modelos/usuario.php";
include_once "modelos/pelicula.php";
include_once "modelos/sesion.php";
include_once "modelos/evento.php";

session_start();

if(!isset($_SESSION["idioma"])){
	$text = $textos;
}else{
	$text = $_SESSION["idioma"];
}

function cabeceraCartelera(){
	if(!isset($_SESSION["idioma"])){
		include "multidioma/esp.php";
		$text = $textos;
	}else{
		$text = $_SESSION["idioma"];
	}
	?>
	
	<script src="js/alertify/lib/alertify.min.js"> </script>
	<script src="js/general.js"> </script>

	<link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
	<link rel="stylesheet" href="js/alertify/themes/alertify.bootstrap.css" />
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
					<div class="container container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="pantallaPrincipal.php"><img src="img/logo_blanco_wide.png" alt="" class="main-logo"></a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							
							
							
							<ul class="nav navbar-nav navbar-right">
								<li>
									<span data-toggle="modal" data-target="#reg"class="glyphicon glyphicon-globe notif"></span>
									<span class="badge badge-important" style="position:relative;right:20px;top:15px;"><?php $numNotif=$_SESSION['usuario']->numNotificaciones(); echo $numNotif; ?></span>

								</li>
								<li><a href="pantallaPrincipal.php"><?php echo $text["miMuro"];?> </a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $text["perfil"];?> <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="perfil.php"><?php echo $text["verPerfil"];?></a></li>
										<li><a href="mis_grupos.php"><?php echo $text["misGrupos"];?></a></li>
										<li class="dropdown-danger"><a onclick="cerrarSesion()"><?php echo $text["cerrarSesion"];?></a></li>
									</ul>
								</li>
								<li><a href="amigos.php"><?php echo $text["amigos"];?> </a></li>
								<li><a href="catalogo.php"><?php echo $text["catalogo"];?> </a></li>
							</ul>


							<div id="reg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="notificaciones" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title"><?php echo $text["notif"];?></h4>
										</div>
										<div class="modal-body">
											<form action="controladoras/procesarNotificacion.php" method="POST">
												<table class="table table-striped table-hover">
													<?php
													$notif = $_SESSION["usuario"]->getNotificaciones();
													foreach($notif as $notificacion){

														echo "<tr><td><label>".$notificacion['descripcion']."</label></td></tr>";




													}


													?>
												</table>
											</form>             
										</div>
									</div>
								</div>  
							</div>
						</div>
					</div>
				</nav>
			</div>

		</div>	
	</div>		
</div>
</div>


<?php
}
?>


<?php
function cabeceraPantallaPrincipal(){
	if(!isset($_SESSION["idioma"])){
		include "multidioma/esp.php";
		$text = $textos;
	}else{
		$text = $_SESSION["idioma"];
	}
	?>
	
	<script src="js/alertify/lib/alertify.min.js"> </script>
	<script src="js/general.js"> </script>

	<link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
	<link rel="stylesheet" href="js/alertify/themes/alertify.bootstrap.css" />
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
					<div class="container container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="pantallaPrincipal.php"><img src="img/logo_blanco_wide.png" alt="" class="main-logo"></a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


							<form role="form" action="controladoras/filtrarCatalogo.php" class="navbar-form navbar-left high-right" method="post">
								<div class="form-group">
									<input type="text" name="busqueda" class="form-control" placeholder="<?php echo $text["findFilm"];?>">
									<button type="submit" class="btn btn-success" style="margin-left:-2px;"><?php echo $text["find"];?></button>
								</div>
							</form>
							<ul class="nav navbar-nav navbar-right">
								<li>
									<span data-toggle="modal" data-target="#reg"class="glyphicon glyphicon-globe notif"></span>
									<span class="badge badge-important" style="position:relative;right:20px;top:15px;"><?php $numNotif=$_SESSION['usuario']->numNotificaciones(); echo $numNotif; ?></span>
								</li>
								<li><a href="pantallaPrincipal.php"><?php echo $text["miMuro"];?></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $text["perfil"];?> <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="perfil.php"><?php echo $text["verPerfil"];?></a></li>
										<li><a href="mis_grupos.php"><?php echo $text["misGrupos"];?></a></li>
										<li class="dropdown-danger" ><a onclick="cerrarSesion()"><?php echo $text["cerrarSesion"];?></a></li>
									</ul>
								</li>
								<li><a href="amigos.php"><?php echo $text["amigos"];?> </a></li>
								<li><a href="catalogo.php"><?php echo $text["catalogo"];?> </a></li>
							</ul>


							<div id="reg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="notificaciones" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title"><?php echo $text["notif"];?></h4>
										</div>
										<div class="modal-body">
											<form action="controladoras/procesarNotificacion.php" method="POST">
												<table class="table table-striped table-hover">
													<?php
													$notif = $_SESSION["usuario"]->getNotificaciones();
													foreach($notif as $notificacion){
														?>
														<tr><td><label><?php echo $notificacion['descripcion']; ?></label></td>
															<td><input type="button" class="btn btn-warning" onclick="eliminarNotif(<?php echo $notificacion['idNotificacion']; ?>,'<?php echo "pantallaPrincipal\.php"; ?>')" value="eliminar"></td>
														</tr>

														<?php


													}


													?>
												</table>
											</form>
										</div>
									</div>
								</div>  
							</div>
						</div>
					</nav>
				</div>

			</div>	
		</div>		
	</div>
</div>

<?php
}
?>



<?php
function cabeceraIndex(){
	if(!isset($_SESSION["idioma"])){
		include "multidioma/esp.php";
		$text = $textos;
	}else{
		$text = $_SESSION["idioma"];
	}

	?>


	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container container-fluid pers">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="clickable" onclick="alertify.success('¿A donde esperabas ir?', 1900)">
					<img class="img-responsive main-logo" src="img/logo_blanco_wide.png" alt=""  />
				</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<form action="controladoras/procesarUsuario.php?accion=Entrar" method="POST" class="navbar-form navbar-right" role="search">
					<input type="email" name="email" class="form-control" placeholder="<?php echo $text["email"];?>">
					<input type="password" name="pass" class="form-control" placeholder="<?php echo $text["pass"];?>">
					<input type="submit" class="btn btn-success" value="<?php echo $text['loguear']; ?>">
					<input type="button" class="btn btn-info" data-toggle="modal" data-target="#reg" value="<?php echo $text['registro']; ?>">
					<input type="button" class="btn btn-danger" data-toggle="modal" data-target="#forgetPass" value="<?php echo $text['forgetPass']; ?>">
				</form>
			</div>
		</div>
	</nav>
	<div id="reg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form action="controladoras/procesarUsuario.php?accion=Registrarse" method="POST">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><?php echo $text["registro"];?></h4> 
						<small><?php echo $text["smallCR"];?></small>
					</div>
					<div class="modal-body">
						<h6> <?php echo $text["nomUsu"];?> </h6>
						<input type="text" name="nombreUsuario" class="form-control form-pers" placeholder="<?php echo $text["nomUsu"];?>" />
						<h6> <?php echo $text["email"];?> </h6>
						<input type="text" name="email" class="form-control form-pers" placeholder="<?php echo $text["email"];?>" />
						<h6> <?php echo $text["pass"];?> </h6>
						<input type="password" name="pass" class="form-control form-pers" placeholder="<?php echo $text["pass"];?>" />
						<h6> <?php echo $text["confPass"];?></h6>
						<input type="password" class="form-control form-pers" placeholder="<?php echo $text["confPass"];?>" /><br/>
						<label><?php echo $text["labelReg"];?>
							<?php echo $text["labelReg1"];?><span class="text-color-red text-weight-bold"><?php echo $text["labelReg2"];?></span> <?php echo $text["labelReg3"];?></label>
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-success" value="<?php echo $text['registrarse']; ?>"><!--<?php echo $text["registrarse"];?>-->
							<button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $text["cerrar"];?></button>
						</div>
					</div>
				</div>
			</form>
		</div>  
		<div id="forgetPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<form action="controladoras/procesarUsuario.php" method="POST">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><?php echo $text["forgetPass"];?></h4>
							<small><?php echo $text["smallCR1"];?></small>
						</div>
						<div class="modal-body">
							<h6> <?php echo $text["h6CR"];?></h6>
							<input type="text" name="email" class="form-control form-pers" placeholder="<?php echo $text["email"];?>">          
						</div>
						<div class="modal-footer">
							<input type="submit" name="accion" class="btn btn-success" value="Recuperar">
							<button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $text["cerrar"];?></button>
						</div>
					</div>
				</div>
			</form>
		</div>  
	</div>	
	<?php
}
?>






<?php
function cabeceraAmigos(){
	if(!isset($_SESSION["idioma"])){
		include "multidioma/esp.php";
		$text = $textos;
	}else{
		$text = $_SESSION["idioma"];
	}
	?>
	
	<script src="js/alertify/lib/alertify.min.js"> </script>
	<script src="js/general.js"> </script>

	<link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
	<link rel="stylesheet" href="js/alertify/themes/alertify.bootstrap.css" />
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
					<div class="container container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="pantallaPrincipal.php"><img src="img/logo_blanco_wide.png" alt="" class="main-logo"></a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


							<form role="form" action="controladoras/filtroDeAmigos.php" class="navbar-form navbar-left high-right" method="post">
								<div class="form-group">
									<input type="text" name="busqueda" class="form-control" placeholder="<?php echo $text["findFriend"];?>">
									<button type="submit" class="btn btn-success" style="margin-left:-2px;"><?php echo $text["find"];?></button>
									<?php
									if(isset($_GET["filtrado"])){

										echo "<a href='amigos.php' class='btn btn-primary'>Cancelar Búsqueda</a>";
									}
									?>
								</div>
							</form>
							<ul class="nav navbar-nav navbar-right">
								<li>
									<span data-toggle="modal" data-target="#reg"class="glyphicon glyphicon-globe notif"></span>
									<span class="badge badge-important" style="position:relative;right:20px;top:15px;"><?php $numNotif=$_SESSION['usuario']->numNotificaciones(); echo $numNotif; ?></span>
								</li>
								<li><a href="pantallaPrincipal.php"><?php echo $text["miMuro"];?></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $text["perfil"];?> <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="perfil.php"><?php echo $text["verPerfil"];?></a></li>
										<li><a href="mis_grupos.php"><?php echo $text["misGrupos"];?></a></li>
										<li class="dropdown-danger" ><a onclick="cerrarSesion()"><?php echo $text["cerrarSesion"];?></a></li>
									</ul>
								</li>
								<li><a href="amigos.php"><?php echo $text["amigos"];?> </a></li>
								<li><a href="catalogo.php"><?php echo $text["catalogo"];?> </a></li>
							</ul>


							<div id="reg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="notificaciones" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title"><?php echo $text["notif"];?></h4>
										</div>
										<div class="modal-body">
											<form action="controladoras/procesarNotificacion.php" method="POST">
												<table class="table table-striped table-hover">
													<?php
													$notif = $_SESSION["usuario"]->getNotificaciones();
													foreach($notif as $notificacion){
														?>
														<tr><td><label><?php echo $notificacion['descripcion']; ?></label></td>
															<td><input type="button" class="btn btn-warning" onclick="eliminarNotif(<?php echo $notificacion['idNotificacion']; ?>,'<?php echo "pantallaPrincipal\.php"; ?>')" value="eliminar"></td>
														</tr>

														<?php


													}


													?>
												</table>
											</form>           
										</div>
									</div>
								</div>  
							</div>
						</div>
					</nav>
				</div>

			</div>	
		</div>		
	</div>
</div>

<?php
}
?>


<?php
function footer(){
	if(!isset($_SESSION["idioma"])){
		include "multidioma/esp.php";
		$text = $textos;
	}else{
		$text = $_SESSION["idioma"];
	}
	?>
	
	<div class="footer ">
		<div class="footer-content">
			<div class="dropdown dropup">
				<span class="footer-text"><?php echo $text['cinesLy1']; ?> <a href="https://github.com/ndrs92/CinesLy" ><?php echo $text['hrefGH']; ?></a>
					<button class="btn btn-primary dropdown-toggle footer-dropdown" type="button" id="dropdownidioma" data-toggle="dropdown" aria-expanded="true">
						<?php echo $text['idioma']; ?>
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu align-right-footer" role="menu" aria-labelledby="dropdownidioma">

						<li role="presentation"><a role="menuitem" tabindex="-1" href="multidioma/controladorCambiarIdioma.php?lang=ES" ><?php echo $text['esp']; ?></a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="multidioma/controladorCambiarIdioma.php?lang=EN" ><?php echo $text['ing']; ?></a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="multidioma/controladorCambiarIdioma.php?lang=JP" ><?php echo $text['jap']; ?></a></li>

					</ul>
				</span>
			</div>
		</div>
		<div class="footer-button">
			<div class="glyphicon glyphicon-chevron-right footer-icon"/>
		</div>
	</div>
	








	<?php
}
?>


<?php
function cabeceraAdministrador(){
	if(!isset($_SESSION["idioma"])){
		include "multidioma/esp.php";
		$text = $textos;
	}else{
		$text = $_SESSION["idioma"];
	}
	?>


	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container container-fluid pers">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a href="adminModificarUsuario.php">
					<img class="img-responsive main-logo" src="img/logo_blanco_wide.png" alt=""  />
				</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


				<ul class="nav navbar-nav navbar-right">



					<li><a href="adminModificarPelicula.php"><?php echo $text['gP']; ?></a></li>
					<li><a href="adminModificarSesion.php"><?php echo $text['gS']; ?></a></li>
					<li><a href="adminModificarUsuario.php"><?php echo $text['gU']; ?></a></li>
					<li class="dropdown-danger" ><a onclick="cerrarSesion()"><?php echo $text['cerrarSesion']; ?></a></li>
				</ul>



			</div>
		</div>
	</nav>



	<?php
}
?>


<?php
function cabeceraVerGrupo(){
	if(!isset($_SESSION["idioma"])){
		include "multidioma/esp.php";
		$text = $textos;
	}else{
		$text = $_SESSION["idioma"];
	}

	?>
	
	<script src="js/alertify/lib/alertify.min.js"> </script>
	<script src="js/general.js"> </script>

	<link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
	<link rel="stylesheet" href="js/alertify/themes/alertify.bootstrap.css" />
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
					<div class="container container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="pantallaPrincipal.php"><img src="img/logo_blanco_wide.png" alt="" class="main-logo"></a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


							<form role="form" action="controladoras/filtrarCatalogo.php" class="navbar-form navbar-left high-right" method="post">
								<div class="form-group">
									<input type="text" name="busqueda" class="form-control" placeholder="<?php echo $text["findFilm"];?>">
									<button type="submit" class="btn btn-success" style="margin-left:-2px;"><?php echo $text["find"];?></button>
								</div>
							</form>
							<ul class="nav navbar-nav navbar-right">
								<li>
									<span data-toggle="modal" data-target="#reg"class="glyphicon glyphicon-globe notif"></span>
									<span class="badge badge-important" style="position:relative;right:20px;top:15px;"><?php $numNotif=$_SESSION['usuario']->numNotificaciones(); echo $numNotif; ?></span>
								</li>
								<li><a href="pantallaPrincipal.php"><?php echo $text["miMuro"];?></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $text["perfil"];?> <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="perfil.php"><?php echo $text["verPerfil"];?></a></li>
										<li><a href="mis_grupos.php"><?php echo $text["misGrupos"];?></a></li>
										<li class="dropdown-danger" ><a onclick="cerrarSesion()"><?php echo $text["cerrarSesion"];?></a></li>
									</ul>
								</li>
								<li><a href="amigos.php"><?php echo $text["amigos"];?> </a></li>
								<li><a href="catalogo.php"><?php echo $text["catalogo"];?> </a></li>
							</ul>


						</div>
					</nav>
				</div>
			</div>	
		</div>		


<?php
}
?>
