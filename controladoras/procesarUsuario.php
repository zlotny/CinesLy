<?php

include "../modelos/usuario.php";

$accion = $_REQUEST['accion'];
if($accion == "Entrar"){
echo "pis";
	$email = $_REQUEST['email']; 
	$pass = $_REQUEST['pass']; 
	$usuario = new Usuario("",$email,$pass,"","","","","","","","","");
	$usuario->loguearUsuario();
} else { 
	if($accion=="Registrarse") { 

		$nombreUsuario = $_REQUEST['nombreUsuario'];
		$email = $_REQUEST['email'];
		$pass = $_REQUEST['pass']; 
		$usuario = new Usuario($nombreUsuario,$email,$pass,0,"","","","","","","","");
		$usuario->registrarUsuario();

	} else { 
		if($accion=="eliminar"){

			$email =$_REQUEST['email'];
			$pass =$_REQUEST['pass'];
					//echo "email: ".$email." contrasenha: ".$pass;
			$usuario = new Usuario("",$email,$pass,0,"","","","","","","","");
			$usuario->bajaUsuario();

		} else { 
			if($accion=="Recuperar"){
				$email =$_REQUEST['email']; 
				$usuario = Usuario::getObjetoUsuario($email);
				$usuario->recuperarUsuario(); 	
			} else {/**/ }


		}

	}
}
?> 