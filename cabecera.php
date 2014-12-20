

<?php
error_reporting(E_ERROR | E_PARSE);



function cabeceraCartelera(){
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<div class="container container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="pantallaPrincipal.php"><img src="img/logo_blanco.png" alt="" style="height:50px;"></a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							
							
							
							<ul class="nav navbar-nav navbar-right">
								<li>
									<span data-toggle="modal" data-target="#reg"class="glyphicon glyphicon-globe notif"></span>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Perfil <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="perfil.php">Ver Perfil</a></li>
										<li><a href="mis_grupos.php">Mis Grupos</a></li>
										<li><a href="index.php">Cerrar Sesion</a></li>
										<!--li class="divider"></li>
										<li><a href="#">Panel Admnistrador</a></li-->
										</ul>
									</li>
									<li><a href="amigos.php">Amigos </a></li>
									<li><a href="catalogo.php">Catálogo </a></li>
								</ul>
								

								<div id="reg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h3>Notificaciones</h3>
											</div>
											<div class="modal-body" style="text-align:center">
												<div class="row"></div>
												<div class="well">
													<h2>Notificacion 1</h2>               
												</div>
												<div class="well">
													<h2>Notificacion 2</h2>               
												</div>
												<div class="well">
													<h2>Notificacion 3</h2>               
												</div>
												
											</div>
										</div>
									</div>  
									
								</div><!-- /.navbar-collapse -->
							</div><!-- /.container-fluid -->
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
				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<div class="container container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="pantallaPrincipal.php"><img src="img/logo_blanco.png" alt="" style="height:50px;"></a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


							<form class="navbar-form navbar-left" role="search">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Buscar Película">
								</div>
								<button type="submit" class="btn btn-default">Buscar</button>
							</form>
							<ul class="nav navbar-nav navbar-right">
								<li>
									<span data-toggle="modal" data-target="#reg"class="glyphicon glyphicon-globe notif"></span>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Perfil <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="perfil.php">Ver Perfil</a></li>
										<li><a href="mis_grupos.php">Mis Grupos</a></li>
										<li><a href="index.php">Cerrar Sesion</a></li>
										<!--li class="divider"></li>
										<li><a href="#">Panel Admnistrador</a></li-->
										</ul>
									</li>
									<li><a href="amigos.php">Amigos </a></li>
									<li><a href="catalogo.php">Catálogo </a></li>
								</ul>
								

								<div id="reg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h3>Notificaciones</h3>
											</div>
											<div class="modal-body" style="text-align:center">
												<div class="row"></div>
												<div class="well">
													<h2>Notificacion 1</h2>               
												</div>
												<div class="well">
													<h2>Notificacion 2</h2>               
												</div>
												<div class="well">
													<h2>Notificacion 3</h2>               
												</div>
												
											</div>
										</div>
									</div>  
									
								</div><!-- /.navbar-collapse -->
							</div><!-- /.container-fluid -->
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


	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container container-fluid pers">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php">
					<img class="img-circle img-responsive" src="img/logo_blanco.png" alt="" width="50px">
				</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<form action="controladoras/procesarUsuario.php" method="POST" class="navbar-form navbar-right" role="search">
					<input type="text" name="email" class="form-control" placeholder="correo electrónico">
					<input type="password" name="pass" class="form-control" placeholder="contraseña">
					<input type="submit" name="accion" class="btn btn-success" value="entrar">
					<div style="display:inline"><input type="button" class="btn btn-info" data-toggle="modal" data-target="#reg" value="registro"></input></div>
					<a href="" data-toggle="modal" data-target="#forgetPass" >¿Olvidaste tu contraseña?</a>                        
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
						<h3>Registro</h3>
					</div>
					<div class="modal-body">
						<input type="text" name="nombreUsuario" class="form-control form-pers" placeholder="nombre de usuario">
						<input type="text" name="email" class="form-control form-pers" placeholder="correo electrónico">
						<input type="password" name="pass" class="form-control form-pers" placeholder="contraseña">   
						<input type="password" class="form-control form-pers" placeholder="repita la contraseña">              
					</div>
					<div class="modal-footer">
						<input type="submit" name="accion" class="btn btn-success" value="registrar">
						<button type="button" class="btn btn-prmary" data-dismiss="modal">Cerrar</button>
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
						<h3>Recuperar contraseña</h3>
					</div>
					<div class="modal-body">
						<input type="text" name="email" class="form-control form-pers" placeholder="correo electrónico">          
					</div>
					<div class="modal-footer">
						<input type="submit" name="accion" class="btn btn-success" value="recuperar">
						<button type="button" class="btn btn-prmary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</form>
	</div>  
</div>	
<?php
}
?>