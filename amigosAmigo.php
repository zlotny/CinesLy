	<html>
<head>
	<?php
	include_once "cabecera.php";
	include_once "modelos/usuario.php";
	include_once "modelos/pelicula.php";
	include_once "sesion_segura.php";

	session_start();
	if(!$_REQUEST["email"]){
		header("Location: pantallaPrincipal.php");
	}else{
		if($_REQUEST["email"] == $_SESSION["usuario"]->email){
			header("Location: perfil.php");
		}
	}
	$amigo = Usuario::getObjetoUsuario($_REQUEST["email"]);

	?>
	<title>Perfil de <?php echo $amigo->nombreUsuario; ?> - CinesLy</title>
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

	cabeceraPantallaPrincipal();

	$cant_reg = 15; 
	$num_pag = $_GET['pagina']; 
	if ($num_pag<1) { 
		$comienzo = 0; 
		$num_pag = 1; 
	} else { 
		$comienzo = ($num_pag-1)  * $cant_reg; 
	}
	?>

	
	<h1 class="tackle-right">Perfil de <?php echo $amigo->nombreUsuario; ?></h1>
	<p class="tackle-right">Estas viendo el perfil de <?php echo $amigo->nombreUsuario; ?>. ¿Aún no es tu amigo? Añádelo a <a href="amigos.php">tu lista de amigos</a>!</p>
	


	
	<div class="col-md-3" >

		<div class="panel panel-default " style="position:fixed;" >
			<div class="panel-heading ">Perfil</div>
			<div class="panel-body">
				<?php
				if (isset($amigo->foto)){
					echo "<img src='".$amigo->foto."' width='150px' class='center-block'>";
				}else{
					echo "<img src='img/default_user.png' width='150px' class='center-block'>";
				}
				?>
				<h5>Nombre de Usuario:</h5>
				<small><?php echo $amigo->nombreUsuario; ?></small>
				<h5>Correo Electrónico:</h5>
				<small><?php echo $amigo->email; ?></small>
				<h5>Biografía:</h5>
				<textarea disabled class="form-control eslogan"><?php echo $amigo->eslogan; ?></textarea>
			</div> 
			<div class="panel-footer">
				<!-- Sin implementar -->
				<input type="button" class="btn btn-info pull-right border-radius-publi" value="Agregar como amigo">       
				<input type="button" class="btn btn-primary pull-left border-radius-publi" onclick="location.href = 'amigosAmigo.php?email=<?php echo $amigo->email; ?>' "  value="Amigos de <?php echo $amigo->nombreUsuario; ?>">       

				<div class="clearfix"></div>
			</div>	
		</div>			

	</div>

	<div class="col-md-9" >
		<div class="panel panel-default" style="text-align:center;" >
			<ul class="media-list">
					<?php 
						$total_registros = $amigo->numAmigos();

						$amigos=$amigo->paginadorAmigos($comienzo,$cant_reg); 

						$total_paginas = ceil($total_registros/$cant_reg);

					while($row = mysql_fetch_array($amigos)){
						?>
						<li class="media" style="margin-top:0px;">
							<div class="well" style="margin-bottom:0px;">

								<div class="publication-body" >
									<span class="small near-top"><?php echo $row['nombreUsuario']."  ".$row['email']; ?></span>
									<textarea name="publi" readonly id= "<?php echo $row['email']; ?>" class="form-control publi publicacion-text border-radius-publi"  ><?php echo $row['eslogan']; ?></textarea>
								</div>

								
								<hr style="background-color:#E1E1E1;height:1px;">
							</div>
						</li><?php  } ?>
						<hr style="background-color:#1E1E1E;height:1px;">
					</ul>




					<ul class="pagination">


						<?php
						if( $num_pag > 1)
							{ ?>
						<li><a accesskey="a" href="amigosAmigo.php?email=<?php echo $amigo->email ?>&pagina=<?php echo ($num_pag-1); ?>">Prev</a></li>
						<?php	} else { ?>
						<li class="disabled" ><a href="amigosAmigo.php?email=<?php echo $amigo->email ?>&pagina=<?php echo ($num_pag) ?>">Prev</a></li>
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
								 if ($i<=$total_paginas){?>
								<li><a href="amigosAmigo.php?email=<?php echo $amigo->email ?>&pagina=<?php echo $i ?>"><?php echo $i; ?></a></li> 
								<?php	}else{  ?>
										<li class="disabled"><a><?php echo "&nbsp"; ?></a></li> 
										
								<?php }
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
								?><li><a href="amigosAmigo.php?email=<?php echo $amigo->email ?>&pagina=<?php echo $i ?>"><?php echo $i ?></a></li> 
								<?php
							} 
						}

					}
					if(($num_pag+1)<=$total_paginas) 
						{ ?>
					<li><a accesskey="s" href="amigosAmigo.php?email=<?php echo $amigo->email ?>&pagina=<?php echo ($num_pag+1) ?>" >Sig</a></li>
					<?php	} else { ?>
					<li class="disabled" ><a href="amigosAmigo.php?email=<?php echo $amigo->email ?>&pagina=<?php echo ($num_pag) ?>">Sig</a></li>
					<?php
				}	
				?>	</ul>

			</div>
		</div>




		




		<script type="text/javascript">
			function leftArrowPressed() {
				if(<?php echo $num_pag; ?> > 1) {
					location.replace("amigosAmigo.php?email=<?php echo $amigo->email ?>&pagina=<?php echo ($num_pag-1); ?>");
				}
			}
			function rightArrowPressed() {		
				if((<?php echo $num_pag; ?>+1) <= <?php echo $total_paginas;?>) {
					location.replace("amigosAmigo.php?email=<?php echo $amigo->email ?>&pagina=<?php echo ($num_pag+1); ?>");
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