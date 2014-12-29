<?php
	include_once "../modelos/usuario.php";
	
	session_start();

	
	$busqueda=$_REQUEST["busqueda"];
	$email=$_SESSION["usuario"]->email;
	echo $busqueda;
	echo "<br>";
	echo $email;
	echo "<br>";
	$amigosFiltrados=Usuario::filtrarAmigos($busqueda,$email);
/*
	foreach ($amigosFiltrados as $array) {
		echo $array["email"];
	}
*/
	$_SESSION["filtro"]=$amigosFiltrados;


	header("Location: ../amigos.php?filtrado=true");
?>
