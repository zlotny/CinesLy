<?php
include_once "../modelos/pelicula.php";
session_start();
/*
	if( ($_REQUEST["pass1"] != $_REQUEST["pass2"]) or (strlen($_REQUEST["pass2"]) < 6) or  (strlen($_REQUEST["newName"]) < 6) ){
		$resultado = false;
	}else{
		$resultado = $_SESSION["usuario"]->editarPerfil($_REQUEST["newName"], $_REQUEST["pass2"]);
	}

	if(!$resultado){
		header("Location: ../adminModificarPelicula.php?update=bad");
	}else{
		$_SESSION["usuario"] = Usuario::getObjetoUsuario($_SESSION["usuario"]->email);

		//header("Location: ../adminModificarPelicula.php?update=good");
	}

	echo $_REQUEST["nuevoTitulo"];
	echo $_REQUEST["director"];
	echo $_REQUEST["actores"];
	echo $_REQUEST["distribuidora"];
	echo $_REQUEST["duracion"];
	echo $_REQUEST["anho"];
	echo $_REQUEST["genero"];
	echo $_REQUEST["pais"];
	echo $_REQUEST["tipoPeli"];
	echo $_REQUEST["sinopsis"];
 	echo $_REQUEST["userfile"];*/
 	$idPelicula=$_GET["idPelicula"];
 
 	$pelicula= new Pelicula($idPelicula,$_REQUEST["nuevoTitulo"],$_REQUEST["director"],$_REQUEST["distribuidora"],$_REQUEST["duracion"],$_REQUEST["sinopsis"],$_REQUEST["actores"],$_REQUEST["anho"],"",$_REQUEST["genero"],$_REQUEST["pais"],"","",$_REQUEST["tipoPeli"],"",  "");//este ultimo parametro e a foto

 	Pelicula::modificarPelicula($idPelicula,$pelicula);
 	
 	/*$aux=Pelicula::mostrarPelicula($idPelicula);
 	print_r($aux);
 	*/
 	header("Location: ../adminModificarPelicula.php?update=good");
?> 