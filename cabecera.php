<?php
error_reporting(E_ERROR | E_PARSE);

function cabeceraCartelera(){
	?>
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
								</li>
								<li><a href="pantallaPrincipal.php">Mi muro </a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Perfil <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="perfil.php">Ver Perfil</a></li>
										<li><a href="mis_grupos.php">Mis Grupos</a></li>
										<li class="dropdown-danger"><a href="controladoras/cerrarSesion.php">Cerrar Sesion</a></li>
										<!--li class="divider"></li>
										<li><a href="#">Panel Admnistrador</a></li-->
										</ul>
									</li>
									<li><a href="amigos.php">Amigos </a></li>
									<li><a href="catalogo.php">Catálogo </a></li>
								</ul>
								

								<div id="reg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="notificaciones" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title">Notificaciones</h4>
											</div>
											<div class="modal-body">
												<h5>Notificacion 1</h5>               
												<h5>Notificacion 2</h5>               
												<h5>Notificacion 3</h5>               
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
	?>
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
									<input type="text" name="busqueda" class="form-control" placeholder="Buscar Película">
									<button type="submit" class="btn btn-success" style="margin-left:-2px;">Buscar</button>
								</div>
							</form>
							<ul class="nav navbar-nav navbar-right">
								<li>
									<span data-toggle="modal" data-target="#reg"class="glyphicon glyphicon-globe notif"></span>
								</li>
								<li><a href="pantallaPrincipal.php">Mi muro </a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Perfil <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="perfil.php">Ver Perfil</a></li>
										<li><a href="mis_grupos.php">Mis Grupos</a></li>
										<li class="dropdown-danger" ><a href="controladoras/cerrarSesion.php">Cerrar Sesion</a></li>
										<!--li class="divider"></li>
										<li><a href="#">Panel Admnistrador</a></li-->
										</ul>
									</li>
									<li><a href="amigos.php">Amigos </a></li>
									<li><a href="catalogo.php">Catálogo </a></li>
								</ul>
								

								<div id="reg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="notificaciones" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title">Notificaciones</h4>
											</div>
											<div class="modal-body">
												<h5>Notificacion 1</h5>               
												<h5>Notificacion 2</h5>               
												<h5>Notificacion 3</h5>               
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
				<form action="controladoras/procesarUsuario.php" method="POST" class="navbar-form navbar-right" role="search">
					<input type="email" name="email" class="form-control" placeholder="Correo electrónico">
					<input type="password" name="pass" class="form-control" placeholder="Contraseña">
					<input type="submit" name="accion" class="btn btn-success" value="Entrar">
					<input type="button" class="btn btn-info" data-toggle="modal" data-target="#reg" value="Registro"/>
					<input type="button" class="btn btn-danger" data-toggle="modal" data-target="#forgetPass" value="Recuperar Contraseña"/>
				</form>
			</div>
		</div>
	</nav>
	<div id="reg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form action="controladoras/procesarUsuario.php" method="POST">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Registro</h4> 
						<small>Introduce los siguientes datos para continuar con el registro.</small>
					</div>
					<div class="modal-body">
						<h6> Nombre de usuario: </h6>
						<input type="text" name="nombreUsuario" class="form-control form-pers" placeholder="Nombre de usuario" />
						<h6> Correo electrónico: </h6>
						<input type="text" name="email" class="form-control form-pers" placeholder="Correo electrónico" />
						<h6> Contraseña: </h6>
						<input type="password" name="pass" class="form-control form-pers" placeholder="Contraseña" />
						<h6> Confirma tu contraseña: </h6>
						<input type="password" class="form-control form-pers" placeholder="Repita la contraseña" /><br/>
						<label>Podrás detallar más tu perfil una vez inicies sesión con tu nuevo usuario.
							Ten en cuenta que <span class="text-color-red text-weight-bold">no es posible cambiar la dirección de correo electrónico</span> una vez que ésta esté ligada a tu cuenta.</label>
						</div>
						<div class="modal-footer">
							<input type="submit" name="accion" class="btn btn-success" value="Registrarse">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
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
							<h4 class="modal-title">Recuperar contraseña</h4>
							<small>Introduce tu correo electrónico para recuperar la contraseña.</small>
						</div>
						<div class="modal-body">
							<h6> Introduce tu correo electrónico: </h6>
							<input type="text" name="email" class="form-control form-pers" placeholder="Correo electrónico">          
						</div>
						<div class="modal-footer">
							<input type="submit" name="accion" class="btn btn-success" value="Recuperar">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
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
function footer(){
	?>

	<nav id="page-footer" class="navbar navbar-inverse footer" role="navigation">
		<div class="navbar-header">
			<div class="container container-fluid">
				<a class="navbar-brand">
					<label>CinesLy - Proyecto de Interfaces de Usuario. <span style="cursor:pointer; color: red;" onclick="location.replace('https://github.com/ndrs92/CinesLy');">Página en GitHub</span></label>
				</a>
				<div class="dropdown dropup">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownidioma" data-toggle="dropdown" aria-expanded="true">
						Idioma
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu align-right-footer" role="menu" aria-labelledby="dropdownidioma">
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Galego</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Español</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">English</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Français</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<script>
		if (document.body.offsetHeight <= innerHeight){
			document.getElementById("page-footer").classList.add("footer-fixed");
		}
	</script>
	<?php
}
?>