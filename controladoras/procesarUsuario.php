<?php

include "usuario.php";

function conectarBD() {
	mysql_connect("localhost","admin","admin") or die ('No se pudo conectar: '.mysql_error());
	mysql_select_db("CinesLy") or die ('No se pudo seleccionar la base de datos');
}

function consultaBD($consulta)
{
	$resultado = mysql_query($consulta);
	if(!$resultado)	{
		echo 'MySql Error: '.mysql_error();
		exit;
	}
	return $resultado;
}


$accion = $_REQUEST['accion'];

if($accion=="entrar"){

	$email =$_REQUEST['email']; 
	$pass =$_REQUEST['pass']; 
	$usuario = Usuario::getObjetoUsuario($email);
	$usuario->loguearUsuario();

} else { if($accion=="registrar") { 

	$nombreUsuario = $_REQUEST['nombreUsuario'];
	$email = $_REQUEST['email'];
	$pass = $_REQUEST['pass']; 
	$usuario = new Usuario($nombreUsuario,$email,$pass,0);
	$usuario->registrarUsuario();

} else { 
	if($accion=="borrar"){

		$email =$_REQUEST['email'];
		$usuario = Usuario::getObjetoUsuario($email);
		$usuario->bajaUsuario();

	} else { /**/ }

}
}
?> 