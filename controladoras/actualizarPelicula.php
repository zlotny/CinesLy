<?php
include_once "../modelos/pelicula.php";
session_start();

if(!substr ( $_REQUEST["nuevoTitulo"] , 0)){
	header("Location: ../adminModificarPelicula.php?inserccion=noTitle");
}
else{

 	$idPelicula=$_GET["idPelicula"];

 	//subir foto
 	$direccionRaiz="./../img/peliculas/";
	$target_dir = "./../img/peliculas/". $_FILES['archivo']['name'];
	$uploadOk = 1;

	if (file_exists($direccionRaiz . $_FILES["archivo"]["name"])) {
    	echo "El fichero ya existe.";
    	$uploadOk = 0;
	}


	if ( $_FILES["archivo"]["size"] > 5242880) {
		echo "El fichero es demasiado grande.";
		$uploadOk = 0;
	}
	if ($uploadOk == 0) {
		echo "Ha habido un error y su fichero NO ha sido subido..";
	} else {
		if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_dir)) {
			echo "El fichero " . basename($_FILES["archivo"]["name"]) . " ha sido subido.";
		} else {
			echo "Ha habido un PROBLEMA al subir su fichero. Inténtelo de nuevo.";
		}
	}
	$directorioBD="img/peliculas/".$_FILES['archivo']['name'];
	echo $directorioBD;
	echo "<br>";

 	//fin subir foto
 	$pelicula= new Pelicula($idPelicula,$_REQUEST["nuevoTitulo"],$_REQUEST["director"],$_REQUEST["distribuidora"],$_REQUEST["duracion"],$_REQUEST["sinopsis"],$_REQUEST["actores"],$_REQUEST["anho"],"",$_REQUEST["genero"],$_REQUEST["pais"],"","",$_REQUEST["tipoPeli"],"",  $directorioBD);//este ultimo parametro e a foto

 	$resultado=Pelicula::modificarPelicula($idPelicula,$pelicula);
 	
 	if(!$resultado){
 		header("Location: ../adminModificarPelicula.php?update=bad");
 	}
 	else{
 		header("Location: ../adminModificarPelicula.php?update=good");
 	}
}
?> 

