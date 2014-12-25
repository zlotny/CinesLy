<?php
include_once "../modelos/usuario.php";
session_start();



if(isset($_REQUEST["id"])){


	$flag = $_SESSION["usuario"]->eliminarPublicacion($_REQUEST["id"]);
	if($flag){
		header("Location: ../perfil.php");
	}else{
		echo "Ha habido un error al eliminar tu publicación. ";
	}



}else{
	echo "Ha habido un error al eliminar un publicación";
}







?>