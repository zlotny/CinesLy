<?php
include_once "../modelos/usuario.php";
session_start();

if(isset($_REQUEST["action"])){

	if($_REQUEST["action"] == "accept"){
		$_SESSION["usuario"]->confirmarAmigo($_REQUEST["email"]);
		$_SESSION["usuario"]->amigoConfirmado($_REQUEST["email"]);

		header("Location: ../amigos.php");



	}else{
		if($_REQUEST["action"] == "deny"){
			$_SESSION["usuario"]->denegarAmigo($_REQUEST["email"]);
			header("Location: ../amigos.php");


		}else{
			echo "Ha ocurrido un error";
		}
	}


}

?>