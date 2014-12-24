<?php

include "../modelos/usuario.php";
session_start();
$accion = $_REQUEST['accion'];
$emailA = $_REQUEST['emailA'];

if($accion == "Guardar cambios"){

	
	$nombreUsuario=$_REQUEST['nombreUsuario'];
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	$tipoUsuario=$_REQUEST['tipoUsuario'];
	$foto=$_REQUEST['foto'];
	$preferencia1=$_REQUEST['preferencia1'];
	$preferencia2=$_REQUEST['preferencia2'];
	$preferencia3=$_REQUEST['preferencia3'];
	$estado=$_REQUEST['estado'];
	$ciudadActual=$_REQUEST['ciudadActual'];
	$fechaNacimiento=$_REQUEST['fechaNacimiento'];
	$eslogan=$_REQUEST['eslogan'];
	echo "el nombre de usuario es".$nombreUsuario;
	echo "<br>";
	echo "el tipo de usuario es".$tipoUsuario;
	echo "<br>";
	$usuario = new Usuario($nombreUsuario,$email,$pass,$tipoUsuario,$foto,$preferencia1,$preferencia2,$preferencia3,$estado,$ciudadActual,$fechaNacimiento,$eslogan);
	
	$usuario->modificarUsuario($emailA,$usuario);
} 


?> 