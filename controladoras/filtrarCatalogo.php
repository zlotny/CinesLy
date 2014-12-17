<?php
	include_once "../modelos/pelicula.php";
	$arrayPeliculas=Pelicula::mostrarPeliculas();
	print_r($arrayPeliculas);
?>