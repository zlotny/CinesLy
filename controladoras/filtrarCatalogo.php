<?php
	include_once "../modelos/pelicula.php";
	//$arrayPeliculas=Pelicula::mostrarPeliculas();
	//$filtrada
	session_start();

	if(isset($_REQUEST["accion"])){
		$genero["accion"]=$_REQUEST["accion"];
	}
	if(isset($_REQUEST["aventura"])){
		$genero["aventura"]=$_REQUEST["aventura"];
	}
	if(isset($_REQUEST["comedia"])){
		$genero["comedia"]=$_REQUEST["comedia"];
	}
	if(isset($_REQUEST["drama"])){
		$genero["drama"]=$_REQUEST["drama"];
	}
	if(isset($_REQUEST["fantasia"])){
		$genero["fantasia"]=$_REQUEST["fantasia"];
	}
	if(isset($_REQUEST["ficcion"])){
		$genero["ficcion"]=$_REQUEST["ficcion"];
	}
	if(isset($_REQUEST["pornografia"])){
		$genero["pornografia"]=$_REQUEST["pornografia"];
	}
	if(isset($_REQUEST["romantica"])){
		$genero["romantica"]=$_REQUEST["romantica"];
	}
	if(isset($_REQUEST["suspense"])){
		$genero["suspense"]=$_REQUEST["suspense"];
	}
	if(isset($_REQUEST["terror"])){
		$genero["terror"]=$_REQUEST["terror"];
	}
	
	$pelisFiltradas=Pelicula::peliculasFiltradas($_REQUEST["busqueda"], $_REQUEST["tipo"], $genero);
	$_SESSION["filtro"]=$pelisFiltradas;
	header("Location: ../catalogo.php?filtrado=true");
?>

	