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

	$sql="SELECT * FROM usuario";
	$resultado = mysql_query($sql); 
	$total_registros = mysql_num_rows($resultado);
	$sql="SELECT nombreUsuario, email, pass FROM usuario ORDER BY nombreUsuario LIMIT ".$comienzo.", ".$cant_reg;
	$resultado = mysql_query($sql); 

	$total_paginas = ceil($total_registros/$cant_reg);
	
	?>



	<div class="top-margin">
		<div class="col-md-3" >
			<div class="col-md-1" ></div>
			<div class="col-md-10 divPerfil" style="text-align:center; padding-top: 120px;">
				<?php
				if (isset($_SESSION['usuario']->foto)){

					echo "<img src='".$_SESSION['usuario']->foto."' width='150px' class='img-circle'>";

				}else{
					echo "<img src='img/default_user.png' width='150px' class='img-circle'>";
				}



				?>
				<!--<div><p><br><strong><?php echo $_SESSION['usuario']->nombreUsuario; ?></p></div>-->
				<div><p><br><strong><a href="" data-toggle="modal" data-target="#modificarPerfil" ><?php echo $_SESSION['usuario']->nombreUsuario; ?></a></p></div>
				<!--<div><p><br><strong><?php echo $_SESSION['usuario']->eslogan; ?></p></div>-->
				<!--<div><p><br><strong><?php echo $_SESSION['usuario']->ciudadActual; ?></p><br></div>-->
				<div><input style="border:none;background-color:transparent;" value="<?php echo $_SESSION['usuario']->email; ?>"></div>
				<div><textarea id="eslogan" class="eslogan" style="border-style:solid;background-color:transparent;color:#337ab7;max-width:281px;min-width:281px;max-height:128px;min-height:128px;" name="eslogan"><?php echo $_SESSION['usuario']->eslogan; ?></textarea></div>
				<!--<div><p><br><strong>Ourense</p><br></div>--><br><br>
				<input type="button" class="btn btn-warning" data-toggle="modal" data-target="#modificarPerfil" value="Editar perfil">
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
									<input type="submit" name="accion" class="btn btn-success" value="Guardar cambios">
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
			<div class="panel panel-default" style="text-align:center;">
				<div class="panel-heading">Publicaciones</div>
					<table class="table table-striped">
<?php						
while($row=mysql_fetch_array($resultado)) 
	{ ;

		$username=$row["nombreUsuario"]; 
		$password=$row["pass"]; 
		$correo=$row["email"]; ?>

						<tr class="table-publicaciones"><td><p><?php echo "Nombre de usuario: ".$username." pass: ".$password." email: ".$correo ?></p></td>
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
	for ($i=1; $i<=$total_paginas; $i++) 
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
	if(($num_pag+1)<=$total_paginas) 
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
		if((<?php echo $num_pag; ?>+1)<= <?php echo $total_paginas;?>) {
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

</body>

<script src= "js/jquery-2.1.1.min.js"></script>
<script src= "bootstrap/js/bootstrap.js"></script>

</html>
