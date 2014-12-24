<?php
include_once "../modelos/pelicula.php";
session_start();

 	$idPelicula=$_GET["idPelicula"];
 
 	$pelicula= new Pelicula($idPelicula,$_REQUEST["nuevoTitulo"],$_REQUEST["director"],$_REQUEST["distribuidora"],$_REQUEST["duracion"],$_REQUEST["sinopsis"],$_REQUEST["actores"],$_REQUEST["anho"],"",$_REQUEST["genero"],$_REQUEST["pais"],"","",$_REQUEST["tipoPeli"],"",  "");//este ultimo parametro e a foto

 	Pelicula::modificarPelicula($idPelicula,$pelicula);
 	
 	/*$aux=Pelicula::mostrarPelicula($idPelicula);
 	print_r($aux);
 	*/
 	header("Location: ../adminModificarPelicula.php?update=good");
?> 