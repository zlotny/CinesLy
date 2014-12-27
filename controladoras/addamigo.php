<?php
include_once "../modelos/usuario.php";
session_start();

$url = $_REQUEST["url"];
$ruta = explode("/", $url);
$aux = explode("?", $ruta[2]);

if( isset($_REQUEST["email"]) ) {

	$flag = $_SESSION["usuario"]->addAmigo($_REQUEST["email"]);
	if($flag == "noexiste"){
		header("Location: ../amigos.php?not_found=true");
		exit(0);
	}

	if($flag == "insertado"){
		switch($aux[0])
		{
		    case 'amigosAmigo.php':
				header("Location: ../".$ruta[2]);
		        break;
		    case '':
		        header("Location: ../amigos.php");
		        break;
		    case 'perfilAmigo.php':
		        header("Location: ../".$ruta[2]);
		        break;
		}
		exit(0);
	}

//si llego aquí ya existe el usuario en tus amigos o ha ocurrido
	header("Location: ../amigos.php?error_existent=true");

}

?>