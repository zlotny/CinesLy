<?php

include_once "../modelos/sesion.php";

		$idSesion=$_GET["idSesion"];
		$idPelicula=$_GET["idPelicula"];
		echo "eliminada";
		$resultado = Sesion::eliminarSesion($idPelicula,$idSesion);
	

		header("Location: ../adminModificarSesion.php");

?>