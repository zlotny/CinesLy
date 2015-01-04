<?php

include "../modelos/usuario.php";
session_start();
$accion = $_REQUEST['accion'];

//$_SESSION["usuario"];



	$direccionRaiz="./../img/fotosPerfil/";
	$target_dir = "./../img/fotosPerfil/" . $_FILES['archivo']['name'];
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
	$directorioBD="img/fotosPerfil/".$_FILES['archivo']['name'];
	echo "<br>";
	echo $emailA;
	echo "<br>";
	echo $directorioBD;
	echo "<br>";
	

	$usuario = new Usuario($_SESSION["usuario"]->nombreUsuario,$_SESSION["usuario"]->email,$pass,$_SESSION["usuario"]->tipoUsuario,$directorioBD,$_SESSION["usuario"]->preferencia1,$_SESSION["usuario"]->preferencia2,$_SESSION["usuario"]->preferencia3,$_SESSION["usuario"]->estado,$_SESSION["usuario"]->ciudadActual,$_SESSION["usuario"]->fechaNacimiento,$_SESSION["usuario"]->eslogan);
	
	Usuario::modificarUsuario($_SESSION["usuario"]->email,$usuario);
	
	 $_SESSION["usuario"]=$usuario; 
	
	//Usuario::subirFoto($_SESSION["usuario"]->email, $directorioBD);

	header("Location:../perfil.php");





?> 