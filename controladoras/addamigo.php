<?php
include_once "../modelos/usuario.php";
session_start();


if(isset($_REQUEST["email"])){


	$flag = $_SESSION["usuario"]->addAmigo($_REQUEST["email"]);
	echo $flag;
	if($flag == "noexiste"){
		header("Location: ../amigos.php?not_found=true");
		exit(0);
	}

	if($flag == "insertado"){
		header("Location: ../amigos.php");
		exit(0);
	}


//si llego aquí ya existe el usuario asi que error tambien, por ahora no lo pongo
	echo "Ha ocurrido un error en addamigo.php";



}

?>