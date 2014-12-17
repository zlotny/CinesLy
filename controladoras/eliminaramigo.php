<?php
include_once "../modelos/usuario.php";
session_start();


if(isset($_REQUEST["email"])){


	$flag = $_SESSION["usuario"]->eliminarAmigo($_REQUEST["email"]);
	if($flag){
		header("Location: ../amigos.php");
	}else{
		echo "Ha habido un error al eliminar tu amigo. ";
	}



}else{
	echo "Ha habido un error al eliminar un amigo";
}








?>