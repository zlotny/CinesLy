<?php
	include_once "../modelos/usuario.php";
	//$arrayPeliculas=Pelicula::mostrarPeliculas();
	//$filtrada
	session_start();

	
	
	$usuariosFiltrados=Usuario::usuariosFiltrados($_REQUEST["busqueda"], $_REQUEST["tipo"]);//Pelicula::peliculasFiltradas($_REQUEST["busqueda"], $_REQUEST["tipo"], $genero);
	$_SESSION["filtro"]=$usuariosFiltrados;
	header("Location: ../adminModificarUsuario.php?filtrado=true");
?>
