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
				<h1>Bienvenido a CinesLy, <?php echo $primerNombre; ?></h1>
				<p>Éste es tu muro. Aquí verás tanto tus publicaciones como las de tus amigos. ¡Dí algo!</p>
					<form action="controladoras/insertarPublicacion.php" method="POST">
						<div class="input-group">
							<input type="text" class="form-control" name="publicacion" placeholder="Escribe una publicación....">
							<span class="input-group-btn">
								<input type="submit" class="btn btn-info" value="Publicar"/>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-10 col-sm-10 col-xs-12 col-lg-10 ">
				<ul class="media-list">
					<?php $publicaciones=$_SESSION['usuario']->consultarPublicacion(); 
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
								<div class="publication-body" >
									<h4 class="media-heading"><?php echo $publicaciones[0][$i]; ?></h4>
									<span class="very-small near-top"><?php echo $publicaciones[1][$i]; ?></span><textarea readonly id= "<?php echo "1".$publicaciones[4][$i]; ?>" class="form-control publi publicacion-text" ><?php echo $publicaciones[2][$i]; ?></textarea>
								</div>
								<div class="clearfix">
									<?php
									if($_SESSION["usuario"]->email == $usuRow->email){

										echo "<input type='submit' onclick='eliminarPublicacion(".$publicaciones[4][$i].")' class='btn btn-xs btn-danger pull-right little-right' value='Eliminar'/>";
										echo "<input type='submit' onclick='mostrar(".$publicaciones[4][$i]."),ro(1".$publicaciones[4][$i].")' class='btn btn-xs btn-primary pull-right little-right' value='Editar'/>";
										echo "<input type='submit' onclick='ocultar(".$publicaciones[4][$i].")' style='visibility: hidden;'  id='".$publicaciones[4][$i]."' class='btn btn-xs btn-success pull-right' value='Guardar'/>";
									}
									?>

								</div>
							</div>
						</li>
						<?php  }?>
					</ul>
				</div>
				<div class="col-sm-2">
				</div>



			</div>
		</div>

		<?php footer(); ?>


	</body>
	</html>
