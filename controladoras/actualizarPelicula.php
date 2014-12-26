<?php
include_once "../modelos/pelicula.php";
session_start();

if(!substr ( $_REQUEST["nuevoTitulo"] , 0)){
	header("Location: ../adminModificarPelicula.php?inserccion=noTitle");
}
else{
 	$idPelicula=$_GET["idPelicula"];
 
 	$pelicula= new Pelicula($idPelicula,$_REQUEST["nuevoTitulo"],$_REQUEST["director"],$_REQUEST["distribuidora"],$_REQUEST["duracion"],$_REQUEST["sinopsis"],$_REQUEST["actores"],$_REQUEST["anho"],"",$_REQUEST["genero"],$_REQUEST["pais"],"","",$_REQUEST["tipoPeli"],"",  "");//este ultimo parametro e a foto

 	$resultado=Pelicula::modificarPelicula($idPelicula,$pelicula);
 	
 	if(!$resultado){
 		header("Location: ../adminModificarPelicula.php?update=bad");
 	}
 	else{
 		header("Location: ../adminModificarPelicula.php?update=good");
 	}
}
?> 

