<?php
include_once "modelos/usuario.php";
include_once "sesion_segura.php";
session_start();

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>CinesLy</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/alertify/lib/alertify.min.js"> </script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
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


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 publicacion">
				<?php
				if (isset($_SESSION['usuario']->foto)){
					echo "<img src='".$_SESSION['usuario']->foto."' width='120px' >";
				}else{
					echo "<img src='img/default_user.png' width='120px' >";
				}
				?>		

			</div>
			<div class="col-sm-9  inputpublicacion">
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
				<li class="media">
					<div class="well">
						<a class="media-left" href="perfil.php">
							<img src="img/default_user.png" alt="" height="50px" width="50px" class="thumbnail">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Nombre de Usuario</h4>
							<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
						</div>
					</div>
				</li>
				<li class="media">

					<div class="well">

						<a class="media-left" href="perfil.php">
							<img src="img/default_user.png" alt="" height="50px" width="50px" class="thumbnail">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Nombre de Usuario</h4>
							<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

						</div>

					</div>

				</li>
				<li class="media">

					<div class="well">

						<a class="media-left" href="perfil.php">
							<img src="img/default_user.png" alt="" height="50px" width="50px" class="thumbnail">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Nombre de Usuario</h4>
							<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

						</div>

					</div>

				</li>
			</ul>
		</div>
		<div class="col-sm-2">
			<div class="" style="text-align:center">
				<a href="ficha_pelicula.php" ><img src="img/HayLeyenda" alt=""  width="150px" class="vertical-peli-carousel"></a>
				<a href="ficha_pelicula.php" ><img src="img/HayLeyenda" alt=""  width="150px" class="vertical-peli-carousel"></a>
				<a href="ficha_pelicula.php" ><img src="img/HayLeyenda" alt=""  width="150px" class="vertical-peli-carousel"></a>
				<a href="ficha_pelicula.php" ><img src="img/HayLeyenda" alt=""  width="150px" class="vertical-peli-carousel"></a>
				<a href="ficha_pelicula.php" ><img src="img/HayLeyenda" alt=""  width="150px" class="vertical-peli-carousel"></a>

			</div>
		</div>



	</div>
</div>

<script src="js/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/docs.min.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript" src="js/jssor.slider.min.js"></script>
<footer>
	<section class="container" style="padding:10px">
		<div class="btn-group dropup pull-rigth ">
			<button type="button" class="btn btn-default">Idioma</button>
			<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
				&nbsp
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
				&nbsp
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><a href="#">Gallego</a></li>
				<li><a href="#">Inglés</a></li>
				<li class="divider"></li>
				<li><a href="#">Español</a></li>
			</ul>
		</div>
	</section>
</footer>
</body>
</html>
