<?php

include "../modelos/usuario.php";

$accion = $_REQUEST['accion'];

if($accion == "Guardar Cambios"){
	$email = $_REQUEST['email']; 
	$pass = $_REQUEST['pass']; 

	$usuario = new Usuario("",$email,$pass,"","","","","","","","","");
	$usuario->loguearUsuario();
} 


?> 