<?php
include_once "modelos/usuario.php";
include_once "sesion_segura.php";


session_start();

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Muro - CinesLy</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/alertify/lib/alertify.min.js"> </script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/general.js"></script>
	<?php include "cabecera.php";?>


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

	
	if($_REQUEST["publi"] == "correcta"){
		echo "<script>
		alertify.log('Se ha insertado la publicación correctamente', 'success', 5000);
	</script>";

}
?>
<div class="container margensuperior">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 publicacion">
				<a href="perfil.php"><?php
					if (isset($_SESSION['usuario']->foto)){
						echo "<img src='".$_SESSION['usuario']->foto."' width='150px' >";
					}else{
						echo "<img src='img/default_user.png' width='150px' >";
					}

					?></a>

				</div>
				<div class="col-sm-9 inputpublicacion">
				<?php
				$primerNombre = explode(" ", $_SESSION["usuario"]->nombreUsuario)[0];
				?>

				<h1><?php echo $text["h1Welcome"];?><?php echo $primerNombre; ?></h1>
				<p><?php echo $text["pYourWall"];?></p>

			
					<form action="controladoras/insertarPublicacion.php" method="POST">
						<div class="input-group">
							<input type="text" class="form-control" name="publicacion" placeholder="<?php echo $text["writePub"];?>">
							<span class="input-group-btn">
								<input type="submit" class="btn btn-info" value="<?php echo $text["publicar"];?>"/>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-10 col-sm-10 col-xs-12 col-lg-10 ">
				<ul class="media-list">
					<?php 
					$total_registros = $_SESSION['usuario']->numPublicacionesTot();
					//echo $total_registros;
					$publicaciones=$_SESSION['usuario']->consultarPublicacion($comienzo,$cant_reg); 
					$total_paginas = ceil($total_registros/$cant_reg);
					for($i=0;$i<sizeof($publicaciones[0]);$i++){
						$usuRow = Usuario::getObjetoUsuario($publicaciones[3][$i]);
						?>

						<li class="media">
							<div class="well">
								<a class="media-left" href="perfilAmigo.php?email=<?php echo $usuRow->email ?>">

									<?php
									if(isset($usuRow->foto)){
										echo "<img src='$usuRow->foto' alt=''  width='50px' class='thumbnail'>";
									}else{
										echo "<img src='img/default_user.png' alt='' width='50px' class='thumbnail'>";
									}

									?>


								</a>
								<form action="controladoras/editarPublicacion.php?id=<?php echo $publicaciones[4][$i]; ?>" method="POST">

								<div class="publication-body" >
									<h4 class="media-heading"><?php echo $publicaciones[0][$i]; ?></h4>
									<span class="very-small near-top"><?php echo $publicaciones[1][$i]; ?></span>
									<textarea name="publi" readonly id= "<?php echo "1".$publicaciones[4][$i]; ?>" class="form-control publi publicacion-text" ><?php echo $publicaciones[2][$i]; ?></textarea>
								</div>
								<div class="clearfix">
									<?php
									if($_SESSION["usuario"]->email == $usuRow->email){
										
										echo "<input type='button' onclick='eliminarPublicacion(".$publicaciones[4][$i].")' class='btn btn-xs btn-danger pull-right little-right' value=".$text['eliminar'].">";
										echo "<input type='button' onclick='mostrar(".$publicaciones[4][$i].",1".$publicaciones[4][$i].",editar".$publicaciones[4][$i].")' id='editar".$publicaciones[4][$i]."' class='btn btn-xs btn-primary pull-right little-right' value='Editar'/>";
										echo "<input type='submit' onclick='ocultar(".$publicaciones[4][$i].")' style='visibility: hidden;'  id='".$publicaciones[4][$i]."' class='btn btn-xs btn-success pull-right' value=".$text['editar'].">";
									}
									?>
								

								</div></form>

							</div>
						</li>
						<?php  }?>
					</ul>
					<ul class="pagination">


						<?php
						if( $num_pag > 1)
							{ ?>
						<li><a accesskey="a" href="pantallaPrincipal.php?pagina=<?php echo ($num_pag-1); ?>">Prev</a></li>
						<?php	} else { ?>
						<li class="disabled" ><a href="pantallaPrincipal.php?pagina=<?php echo ($num_pag) ?>">Prev</a></li>
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
								<li><a href="pantallaPrincipal.php?pagina=<?php echo $i ?>"><?php echo $i; ?></a></li> 
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
								?><li><a href="pantallaPrincipal.php?pagina=<?php echo $i ?>"><?php echo $i ?></a></li> 
								<?php
							} 
						}

					}
					if(($num_pag+1)<=$total_paginas) 
						{ ?>
					<li><a accesskey="s" href="pantallaPrincipal.php?pagina=<?php echo ($num_pag+1) ?>" >Sig</a></li>
					<?php	} else { ?>
					<li class="disabled" ><a href="pantallaPrincipal.php?pagina=<?php echo ($num_pag) ?>">Sig</a></li>
					<?php
				}	
				?>	</ul>
				</div>
				<div class="col-sm-2">
				</div>



			</div>
		</div>

		<script type="text/javascript">
		function leftArrowPressed() {
			if(<?php echo $num_pag; ?> > 1) {
				location.replace("pantallaPrincipal.php?pagina=<?php echo ($num_pag-1); ?>");
			}
		}
		function rightArrowPressed() {		
			if((<?php echo $num_pag; ?>+1) <= <?php echo $total_paginas;?>) {
				location.replace("pantallaPrincipal.php?pagina=<?php echo ($num_pag+1); ?>");
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
	</html>
