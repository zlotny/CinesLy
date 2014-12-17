
<?php 
	include_once "pruebaFuncionIdioma.php";
	$idioma="es";
$aux=cambioIdioma($idioma);
include_once $aux.".php";
 ?>
 <meta charset="utf-8">
<form action="../controladoras/procesarPelicula.php" method="POST" class="" role="">

		<input type="text" name="idPelicula" class="form-control" placeholder="<?php echo $textos["login"]; ?>">
		<input type="text" name="idPelicula" class="form-control" placeholder="<?php echo $textos["registrarse"]; ?>">
		<input type="text" name="idPelicula" class="form-control" placeholder="<?php echo $textos["contrasenha"]; ?>">
		                       
	</form>
