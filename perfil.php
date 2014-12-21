<html>
<head>
	<?php
	include_once "cabecera.php";
	include_once "modelos/usuario.php";
	include_once "sesion_segura.php";

	?>

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">	
	<script src="js/alertify/lib/alertify.min.js"> </script>
	<script src="js/general.js"> </script>

	<link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
	<link rel="stylesheet" href="style/style.css">


</head>
<body>
	<?php
	session_start();
	cabeceraPantallaPrincipal();

	if($_REQUEST["update"] == "bad"){
		echo "<script>alertify.error('Ha ocurrido un error en el cambio de perfil. Comprueba que los campos son correctos');</script>";
	}
	if($_REQUEST["update"] == "good"){
		echo "<script>alertify.success('Su perfil se ha actualizado correctamente');</script>";
	}

	$cant_reg = 3; 
	$num_pag = $_GET['pagina']; 
	if (!$num_pag) { 
		$comienzo = 0; 
		$num_pag = 1; 
	} else { 
		$comienzo = ($num_pag-1)  * $cant_reg; 
	}

	mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar: '.mysql_error());
	mysql_select_db("CinesLy") or die ('No se pudo seleccionar la base de datos');
	$sql="SELECT * FROM publicacion";
	$resultado = mysql_query($sql); 
	$total_registros = mysql_num_rows($resultado);
	$sql="SELECT publica FROM publicacion WHERE email='".$_SESSION['usuario']->email."' ORDER BY fecha LIMIT ".$comienzo.", ".$cant_reg;
	$resultado = mysql_query($sql); 
	$total_paginas = ceil($total_registros/$cant_reg);

	?>



	<div class="margensuperior">
		<div class="col-md-1"></div>
		<div class="col-md-2" >

			<div class="panel panel-default " >
				<div class="panel-heading text-weight-bold ">Perfil</div>
				<div class="panel-body">

					<?php
					if (isset($_SESSION['usuario']->foto)){
						echo "<img src='".$_SESSION['usuario']->foto."' width='150px' class='center-block'>";
					}else{
						echo "<img src='img/default_user.png' width='150px' class='center-block'>";
					}
					?>
					<h5>Nombre de Usuario:</h5>
					<small><?php echo $_SESSION['usuario']->nombreUsuario; ?></small>
					<h5>Correo Electrónico:</h5>
					<small><?php echo $_SESSION['usuario']->email; ?></small>
					<h5>Biografía:</h5>
					<form id="bio-form" action="controladoras/actualizaBio.php" method="post">
						<textarea class="form-control eslogan" name="eslogan" onblur="document.getElementById('bio-form').submit()"><?php echo $_SESSION['usuario']->eslogan; ?></textarea>
					</form>
				</div>	
				<div class="panel-footer">
					<input type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modificarPerfil" value="Editar perfil">       
					<div id="modificarPerfil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<form id="form-edit-perfil" action="controladoras/actualizarPerfil.php" method="POST">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4>Editar cuenta</h4>
									</div>
									<div class="modal-body">
										<label for="nombreUsuario" class="">Cambiar el nombre de usuario</label>
										<input type="text" name="newName" class="form-control form-pers" value="<?php echo $_SESSION['usuario']->nombreUsuario;?>"><br/>      
										<label for="pass1" class="">Cambiar contraseña</label>
										<input type="text" name="pass1" class="form-control form-pers" placeholder="Introduzca su nueva contraseña"> <br/>
										<input type="text" name="pass2" class="form-control form-pers" placeholder="Repita su nueva contraseña"> <br/>

										<input type="button" id="eliminar-boton" class="btn btn-danger btn-xs pull-right" value="Eliminar mi cuenta" onclick="eliminarPerfil('<?php echo $_SESSION['usuario']->email; ?>');" ></input>  
										<div class="clearfix"></div>

									</div>
									<div class="modal-footer">
										<input type="submit" name="accion" class="btn btn-success" value="Guardar cambios">
										<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
									</div>
								</div>
							</div>
						</form>
					</div>  
					<div class="clearfix"></div>
				</div>	
			</div>			

		</div>

		<div class="col-md-5" >
			<div class="panel panel-default" >
				<div class="panel-heading">Publicaciones</div>
				<table class="table table-striped">
					<?php						
					while($row=mysql_fetch_array($resultado)) 
						{ ;
							$publicacion=$row["publica"]; ?>

							<tr class="table-publicaciones177"><td><p class="lead"><?php echo $publicacion; ?></p></td>
							</tr>

							<?php } ?>


						</table>





						<ul class="pagination">


							<?php
							if( $num_pag > 1)
								{ ?>
							<li><a accesskey="a" href="perfil.php?pagina=<?php echo ($num_pag-1) ?>">Prev</a></li>
							<?php	} else { ?>
							<li class="disabled" ><a href="perfil.php?pagina=<?php echo ($num_pag) ?>">Prev</a></li>
							<?php
						}
						if($num_pag<=5){
							for ($i=1; $i<=5; $i++) 
							{ 
								if ($num_pag == $i) 
								{ 
									?><li class="active"><a class="style1"><?php echo $num_pag ?><span class="sr-only">(página actual)</span></a></li> 
									<?php 
								} 
								else 
								{ 
									?><li><a href="perfil.php?pagina=<?php echo $i ?>"><?php if ($i<=$total_paginas){echo $i;}else{echo "&nbsp";} ?></a></li> 
									<?php
								} 
							}
						} else {
							for ($i=$num_pag-4; $i<=$num_pag; $i++) 
							{ 
								if ($num_pag == $i) 
								{ 
									?><li class="active"><a class="style1"><?php echo $num_pag ?><span class="sr-only">(página actual)</span></a></li> 
									<?php 
								} 
								else 
								{ 
									?><li><a href="perfil.php?pagina=<?php echo $i ?>"><?php echo $i ?></a></li> 
									<?php
								} 
							}

						}
						if(($num_pag+1)<$total_paginas) 
							{ ?>
						<li><a accesskey="s" href="perfil.php?pagina=<?php echo ($num_pag+1) ?>" >Sig</a></li>
						<?php	} else { ?>
						<li class="disabled" ><a href="perfil.php?pagina=<?php echo ($num_pag) ?>">Sig</a></li>
						<?php
					}	
					?>	</ul>

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




		<script type="text/javascript">
			function leftArrowPressed() {
				if(<?php echo $num_pag; ?> > 1) {
					location.replace("perfil.php?pagina=<?php echo ($num_pag-1); ?>");
				}
			}
			function rightArrowPressed() {		

				if((<?php echo $num_pag; ?>+1) < <?php echo $total_paginas;?>) {

					location.replace("perfil.php?pagina=<?php echo ($num_pag+1); ?>");
				} 	
			}
			document.onkeydown = function(evt) {
				evt = evt || window.event;
				switch (evt.keyCode) {
					case 37:
					leftArrowPressed();
					break;
					case 39:
					rightArrowPressed();
					break;
				}
			};
		</script>





		<?php footer(); ?>




	</body>

	<script src= "js/jquery-2.1.1.min.js"></script>
	<script src= "bootstrap/js/bootstrap.js"></script>

	</html>