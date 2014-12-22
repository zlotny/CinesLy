<?php
include_once "../modelos/usuario.php";
session_start();




	
		$resultado = $_SESSION["usuario"]->eliminarCuenta();
	

		header("Location: cerrarSesion.php");




?>