<?php

include "../modelos/usuario.php";

$accion = $_REQUEST['accion'];
$emailA = $_REQUEST['emailA'];
if($accion == "Guardar Cambios"){

	echo $emailA;
	/*$nombreUsuario=$_REQUEST['$nombreUsuario'];
	$email=$_REQUEST['$email'];
	$pass=$_REQUEST['$pass'];
	$tipoUsuario=$_REQUEST['$tipoUsuario'];
	$foto=$_REQUEST['$foto'];
	$preferencia1=$_REQUEST['$preferencia1'];
	$preferencia2=$_REQUEST['$preferencia2'];
	$preferencia3=$_REQUEST['$preferencia3'];
	$estado=$_REQUEST['$estado'];
	$ciudadActual=$_REQUEST['$ciudadActual'];
	$fechaNacimiento=$_REQUEST['$fechaNacimiento'];
	$eslogan=$_REQUEST['$eslogan'];
	
	$usuario = new Usuario($nombreUsuario,$email,$pass,$tipoUsuario,$foto,$preferencia1,$preferencia2,$preferencia3,$estado,$ciudadActual,$fechaNacimiento,$eslogan);
	$usuario->modificarUsuario($email,$usuario);*/
} 


?> 