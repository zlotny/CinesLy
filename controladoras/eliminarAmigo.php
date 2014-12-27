<?php
include_once "../modelos/usuario.php";
session_start();

$url = $_REQUEST["url"];
$ruta = explode("/", $url);
$aux = explode("?", $ruta[2]);

if( isset($_REQUEST["email"]) ) {

	$flag = $_SESSION["usuario"]->eliminarAmigo($_REQUEST["email"]);
	if($flag){
		switch($aux[0])
		{
		    case 'amigosAmigo.php':
				header("Location: ../".$ruta[2]);
		        break;
		    case 'amigos.php':
		        header("Location: ../".$ruta[2]);
		        break;
		    case 'perfilAmigo.php':
		        header("Location: ../".$ruta[2]);
		        break;
		}
	} else {
		echo "Ha habido un error al eliminar tu amigo. ";
	}

} else {

	echo "Ha habido un error al eliminar un amigo";

}

?>