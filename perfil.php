<html>
<head>
	<?php
	include_once "cabecera.php";
	include_once "modelos/usuario.php";
	?>

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">	
	<link rel="stylesheet" href="style/style.css">

</head>
<body>
	<?php
	session_start();
	cabeceraPantallaPrincipal();
	?>
	<div class="top-margin">
		<div class="col-md-3" >
			<div class="col-md-1" ></div>
			<div class="col-md-10 divPerfil">
				<?php
				if (isset($_SESSION['usuario']->foto)){

					echo "<img src='".$_SESSION['usuario']->foto."' width='150px' class='img-rounded'>";

				}else{
					echo "<img src='img/default_user.png' width='150px' class='img-rounded'>";
				}



				?>
				<!--<div><p><br><strong><?php echo $_SESSION['usuario']->nombreUsuario; ?></p></div>-->
				<a href="" data-toggle="modal" data-target="#modificarPerfil" ><?php echo $_SESSION['usuario']->nombreUsuario; ?></a>
				<div><p><br><strong><?php echo $_SESSION['usuario']->email; ?></p><br></div>
				<input type="button" class="btn btn-info" data-toggle="modal" data-target="#modificarPerfil" value="Editar perfil">
				<div id="modificarPerfil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<form action="controladoras/procesarUsuario.php" method="POST">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h3>Editar cuenta</h3>
								</div>
								<div class="modal-body">
									<label for="nombreUsuario" class="">Nombre de usuario</label>
									<input type="text" name="nombreUsuario" class="form-control form-pers" placeholder="Nombre de usuario">          
								
									<label for="email" class="">Correo electrónico</label>
									<input type="text" name="email" class="form-control form-pers" placeholder="Correo electrónico">     
									<hr>

									<h6>Cambiar contraseña</h6>
									<label for="pass1" class="">Introduzca contraseña</label>
									<input type="text" name="email" class="form-control form-pers" placeholder="Introduzca su nueva contraseña"> 

									<label for="email" class="">Repita contraseña</label>
									<input type="text" name="email" class="form-control form-pers" placeholder="Repita su nueva contraseña"> 
									<hr>

									<label for="email" class="">Cambiar idioma</label>
									<select class="form-control form-pers">
									  <option>Selecciona un idioma...</option>
									  <option value="de">Deutsch - Alemán</option>
									  <option value="en">English - Inglés</option>
									  <option value="es">Español</option>
									  <option value="fr">Français - Francés</option>
									</select>
               						<hr>
					                
					                <a href="" style="color:red;">Eliminar mi cuenta</a>   
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
			<div class="col-md-1" ></div>
			
		</div>

		<div class="col-md-5" >
			<div class="panel panel-default">
				<div class="panel-heading">Publicaciones</div>
				<div class="panel-body scrollable-table-perfilC">
					<table class="table table-striped">
						<tr class="table-publicaciones"><td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
							Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
							Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></td>
						</tr>
						<tr class="table-publicaciones"><td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
							Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
							Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></td>
						</tr>
						<tr class="table-publicaciones"><td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
							Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
							Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></td>
						</tr>
						<tr class="table-publicaciones"><td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
							Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
							Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></td>
						</tr>
						<tr class="table-publicaciones"><td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
							Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
							Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></td>
						</tr>
						<tr class="table-publicaciones"><td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
							Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
							Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></td>
						</tr>
					</table>
				</div>
			</div>
		</div>



		<div class="col-md-3" >


			<div class="panel panel-default">
				<div class="panel-heading">Últimas Películas Vistas</div>
				<div class="panel-body scrollable-table-perfilD">
					<table class="table table-striped ">
						<tr><td>Película Vista 1</td></tr>
						<tr><td>Película Vista 2</td></tr>
						<tr><td>Película Vista 3</td></tr>
						<tr><td>Película Vista 4</td></tr>
						<tr><td>Película Vista 5</td></tr>
						<tr><td>Película Vista 6</td></tr>
						<tr><td>Película Vista 7</td></tr>
						<tr><td>Película Vista 8</td></tr>
						<tr><td>Película Vista 9</td></tr>
						<tr><td>Película Vista 10</td></tr>
						<tr><td>Película Vista 11</td></tr>
						<tr><td>Película Vista 12</td></tr>


					</table>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">Películas Recomendadas</div>
				<div class="panel-body scrollable-table-perfilD">
					<table class="table table-striped ">
						<tr><td>Película Recomendada 1</td></tr>
						<tr><td>Película Recomendada 2</td></tr>
						<tr><td>Película Recomendada 3</td></tr>
						<tr><td>Película Recomendada 4</td></tr>
						<tr><td>Película Recomendada 5</td></tr>
						<tr><td>Película Recomendada 6</td></tr>
						<tr><td>Película Recomendada 7</td></tr>
						<tr><td>Película Recomendada 8</td></tr>
						<tr><td>Película Recomendada 9</td></tr>
						<tr><td>Película Recomendada 10</td></tr>
						<tr><td>Película Recomendada 11</td></tr>
						<tr><td>Película Recomendada 12</td></tr>


					</table>
				</div>
			</div>
		</div>

		<div class="col-md-1"></div>


	</div>
</body>

<script src= "javascript/jquery-2.1.1.min.js"></script>
<script src= "bootstrap/js/bootstrap.js"></script>

</html>