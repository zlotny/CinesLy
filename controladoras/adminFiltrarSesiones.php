<?php
	include_once "../modelos/sesion.php";
	
	session_start();

	
	
	$sesionesFiltradas=Sesion::sesionesFiltradas($_REQUEST["busqueda"]);
//echo $sesionesFiltradas[0][0];
	$_SESSION["filtro"]=$sesionesFiltradas;

	header("Location: ../adminModificarSesion.php?filtrado=true");
?>
