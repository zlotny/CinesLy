<?php
include_once "../modelos/pelicula.php";

if(!substr ( $_REQUEST["nuevoTitulo"] , 0)){
	header("Location: ../adminModificarPelicula.php?inserccion=noTitle");
}
else{
	$sql='INSERT INTO pelicula (titulo,director,distribuidora,duracion,sinopsis,actores,anho,fecha_estreno,genero,pais,tipo) VALUES ("'.$_REQUEST["nuevoTitulo"].'", "'.$_REQUEST["director"].'", "'.$_REQUEST["distribuidora"].'", "'.$_REQUEST["duracion"].'", "'.$_REQUEST["sinopsis"].'",  "'.$_REQUEST["actores"].'", "'.$_REQUEST["anho"].'", "'.$_REQUEST["fechaEstreno"].'", "'.$_REQUEST["genero"].'", "'.$_REQUEST["pais"].'", "'.$_REQUEST["tipoPeli"].'");';

	Pelicula::conectarBD();
	$resultado=mysql_query($sql);

	if (!$resultado) {
		die('Consulta no válida: ' . mysql_error());
		header("Location: ../adminModificarPelicula.php?inserccion=bad");
	}
	else{
		header("Location: ../adminModificarPelicula.php?inserccion=good");
	}
}

?> 