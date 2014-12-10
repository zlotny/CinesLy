<?php
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
							<a class="navbar-brand" href="#">INICIO</a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active"><a href="#">Cartelera <span class="sr-only">(current)</span></a></li>
								<li><a href="#">Amigos</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ver <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">Ver Pelicula</a></li>
										<li><a href="#">Comentar Pelicula</a></li>
										<li><a href="#">Valorar</a></li>
										<li class="divider"></li>
										<li><a href="#">DONAR</a></li>
										<li class="divider"></li>
										<li><a href="#">HAY LEYENDA</a></li>
									</ul>
								</li>
							</ul>
							<form class="navbar-form navbar-left" role="search">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="buscar Pelicula">
								</div>
								<button type="submit" class="btn btn-default">Buscar</button>
							</form>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="#">Mi perfil </a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Preferencias de cuenta <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">Borrar cuenta</a></li>
										<li><a href="#">Modificar datos cuenta</a></li>
										<li><a href="#">Cambiar pass</a></li>
										<li class="divider"></li>
										<li><a href="#">Cerrar sesion</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
		<div>

		</div>
		<div>

		</div>
	
	<?php
	}
	
	function cabeceraGrupos(){
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
								<a class="navbar-brand" href="#">INICIO</a>
							</div>
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								
								
								<form class="navbar-form navbar-left" role="search">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="buscar Pelicula">
									</div>
									<button type="submit" class="btn btn-default">Buscar</button>
								</form>
								<ul class="nav navbar-nav navbar-right">
									<li>
										<button type="button" class="btn-negro btn-lg">
											<span class="glyphicon glyphicon-globe btn-negro"></span>
										</button>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Perfil <span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu">
											<li><a href="#">Ver Perfil</a></li>
											<li><a href="#">Mis Grupos</a></li>
											<li><a href="#">Cerrar Sesion</a></li>
										<!--li class="divider"></li>
										<li><a href="#">Panel Admnistrador</a></li-->
										</ul>
									</li>
									<li><a href="#">Amigos </a></li>
									<li><a href="#">Catálogo </a></li>
								</ul>
								
								<ul class="nav navbar-nav navbar-right">
									<li><a href="#">Mi perfil </a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Preferencias de cuenta <span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu">
											<li><a href="#">Borrar cuenta</a></li>
											<li><a href="#">Modificar datos cuenta</a></li>
											<li><a href="#">Cambiar pass</a></li>
											<li class="divider"></li>
											<li><a href="#">Cerrar sesion</a></li>
										</ul>
									</li>
								</ul>
							</div><!-- /.navbar-collapse -->
						</div><!-- /.container-fluid -->
					</nav>
				</div>
			</div>
			<div>

			</div>
			<div>

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
								<a class="navbar-brand" href="#">INICIO</a>
							</div>
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								
								
								<form class="navbar-form navbar-left" role="search">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="buscar Pelicula">
									</div>
									<button type="submit" class="btn btn-default">Buscar</button>
								</form>
								<ul class="nav navbar-nav navbar-right">
									<li>
										<button type="button" data-toggle="modal" data-target="#reg" class="btn-negro btn-lg">
											<span class="glyphicon glyphicon-globe btn-negro"></span>
										</button>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Perfil <span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu">
											<li><a href="perfil.php">Ver Perfil</a></li>
											<li><a href="mis_grupos.php">Mis Grupos</a></li>
											<li><a href="#">Cerrar Sesion</a></li>
										<!--li class="divider"></li>
										<li><a href="#">Panel Admnistrador</a></li-->
										</ul>
									</li>
									<li><a href="#">Amigos </a></li>
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
			
			<?php
		}
		?>