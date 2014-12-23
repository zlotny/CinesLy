<?php
include_once "../modelos/usuario.php";
session_start();




	if( ($_REQUEST["pass1"] != $_REQUEST["pass2"]) or (strlen($_REQUEST["pass2"]) < 6) or  (strlen($_REQUEST["newName"]) < 6) ){
		$resultado = false;
	}else{
		$resultado = $_SESSION["usuario"]->editarPerfil($_REQUEST["newName"], $_REQUEST["pass2"]);
	}

	if(!$resultado){
		header("Location: ../perfil.php?update=bad");
	}else{
		$_SESSION["usuario"] = Usuario::getObjetoUsuario($_SESSION["usuario"]->email);

		header("Location: ../perfil.php?update=good");
	}



?>