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
	//$foto=$_REQUEST['foto'];
	$preferencia1=$_REQUEST['preferencia1'];
	$preferencia2=$_REQUEST['preferencia2'];
	$preferencia3=$_REQUEST['preferencia3'];
	$estado=$_REQUEST['estado'];
	$ciudadActual=$_REQUEST['ciudadActual'];
	$fechaNacimiento=$_REQUEST['fechaNacimiento'];
	$eslogan=$_REQUEST['eslogan'];
	
	

	// Subir Foto
	$direccionRaiz="./../img/fotosPerfil/";
	$target_dir = "./../img/fotosPerfil/" . $_FILES['archivo']['name'];
	$uploadOk = 1;

	if (file_exists($direccionRaiz . $_FILES["archivo"]["name"])) {
    echo "El fichero ya existe.";
    $uploadOk = 0;
}


	if ( $_FILES["archivo"]["size"] > 5242880) {
		echo "El fichero es demasiado grande.";
		$uploadOk = 0;
	}
	if ($uploadOk == 0) {
		echo "Ha habido un error y su fichero NO ha sido subido..";
	} else {
		if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_dir)) {
			echo "El fichero " . basename($_FILES["archivo"]["name"]) . " ha sido subido.";
		} else {
			echo "Ha habido un PROBLEMA al subir su fichero. Inténtelo de nuevo.";
		}
	}
	$directorioBD="img/fotosPerfil/".$_FILES['archivo']['name'];
	echo "<br>";
	echo $emailA;
	echo "<br>";
	echo $directorioBD;
	echo "<br>";
	


	$usuario = new Usuario($nombreUsuario,$email,$pass,$tipoUsuario,$directorioBD,$preferencia1,$preferencia2,$preferencia3,$estado,$ciudadActual,$fechaNacimiento,$eslogan);
	
	Usuario::modificarUsuario($emailA,$usuario);

	header("Location:../adminModificarUsuario.php");

	
} else{
	if($accion == "Insertar Usuario"){

		

		$nombreUsuario = $_REQUEST['nombreUsuario'];
		$email = $_REQUEST['email'];
		$pass = $_REQUEST['pass'];
		$tipoUsuario = $_REQUEST['tipoUsuario']; 

		$usuario = new Usuario($nombreUsuario,$email,$pass,$tipoUsuario,"","","","","","","","");
		Usuario::insertarUsuario($usuario);
			
		header("Location:../adminModificarUsuario.php");
	} else{
		if($accion == "Eliminar"){

			
			
			Usuario::eliminarUsuario($emailA);

			header("Location:../adminModificarUsuario.php");

		}else{

			//SUBIR FOTO DE PERFIL

			if($accion == "Subir"){
				$direccionRaiz="./../img/fotosPerfil/";
				$target_dir = "./../img/fotosPerfil/" . $_FILES['archivo']['name'];
				$uploadOk = 1;
				echo $_FILES["archivo"]["name"];
				echo "<br>";
				echo $_FILES["archivo"]["size"];
				echo "<br>";
				echo $target_dir;
				echo "<br>";
//Si el fichero existe tira un mensaje de error
				if (file_exists($direccionRaiz . $_FILES["archivo"]["name"])) {
					echo "El fichero ya existe.";
					$uploadOk = 0;
				}

				if ( $_FILES["archivo"]["size"] > 5242880) {
					echo "El fichero es demasiado grande.";
					$uploadOk = 0;
				}
/*
/*
				$ar=fopen("datos.txt","a") or
				die("Problemas en la creacion");
				fputs($ar,$_FILES["archivo"]["name"]);
				fputs($ar,"\n");
				fputs($ar,$_FILES["archivo"]["name"]);
				fputs($ar,"\n");
				fputs($ar,"--------------------------------------------------------");
				fputs($ar,"\n");
				fclose($ar);
				echo "Los datos se cargaron correctamente.";*/

//Si algo ha ido mal muestra un mensaje de error
				if ($uploadOk == 0) {
					echo "Ha habido un error y su fichero NO ha sido subido..";
				} else {
//En caso contrario, mueve el fichero temporal de memoria al directorio y nombre arriba indicados.
    //Para terminar emite un mensaje de confirmación.

					if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_dir)) {
						echo "El fichero " . basename($_FILES["archivo"]["name"]) . " ha sido subido.";
					} else {
						echo "Ha habido un PROBLEMA al subir su fichero. Inténtelo de nuevo.";
					}
				}echo "<br>";
				echo "<br>";
				echo "<br>";
				echo $emailA;
				echo "<br>";
				echo $target_dir;
				echo "<br>";
				//Usuario::subirFoto($email,$foto);
				Usuario::subirFoto($emailA,$target_dir);

				//header("Location:../adminModificarUsuario.php");
			}
		}
	}
}



?> 