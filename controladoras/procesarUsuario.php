<?php

include "../modelos/usuario.php";

$accion = $_REQUEST['accion'];

if($accion == "entrar"){
	$email = $_REQUEST['email']; 
	$pass = $_REQUEST['pass']; 
	$usuario = new Usuario("",$email,$pass,"","","","","","","","","");
	$usuario->loguearUsuario();
} else { 
		if($accion=="registrar") { 

			$nombreUsuario = $_REQUEST['nombreUsuario'];
			$email = $_REQUEST['email'];
			$pass = $_REQUEST['pass']; 
			$usuario = new Usuario($nombreUsuario,$email,$pass,0,"","","","","","","","");
			$usuario->registrarUsuario();

		} else { 
				if($accion=="borrar"){

					$email =$_REQUEST['email'];
					$usuario = Usuario::getObjetoUsuario($email);
					$usuario->bajaUsuario();

				} else { 
						if($accion=="recuperar"){
							$email =$_REQUEST['email']; 
							$usuario = Usuario::getObjetoUsuario($email);
							$usuario->recuperarUsuario(); 	
						} else {/**/ }


					}

			}
	}
?> 