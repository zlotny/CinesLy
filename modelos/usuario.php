<?php

class Usuario{

	var $nombreUsuario;
	var $email;
	var $pass;
	var $tipoUsuario;
	var $foto;
	var $preferencia1;
	var $preferencia2;
	var $preferencia3;
	var $estado;
	var $ciudadActual;
	var $fechaNacimiento;
	var $eslogan;

	function __construct($nombreUsuario,$email,$pass,$tipoUsuario,$foto,$preferencia1,$preferencia2,$preferencia3,$estado,$ciudadActual,$fechaNacimiento,$eslogan){
		$this->nombreUsuario=$nombreUsuario;
		$this->email=$email;
		$this->pass=$pass;
		$this->tipoUsuario=$tipoUsuario;
		$this->foto=$foto;
		$this->preferencia1=$preferencia1;
		$this->preferencia2=$preferencia2;
		$this->preferencia3=$preferencia3;
		$this->estado=$estado;
		$this->ciudadActual=$ciudadActual;
		$this->fechaNacimiento=$fechaNacimiento;
		$this->eslogan=$eslogan;
	}

	function conectarBD(){
		mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar: '.mysql_error());
		mysql_select_db("CinesLy") or die ('No se pudo seleccionar la base de datos');
	}

	function consultaBD($consulta){
		$resultado = mysql_query($consulta);
		if(!$resultado){
			echo 'MySql Error: '.mysql_error();
			exit;
		}
		return $resultado;
	}

	function getObjetoUsuario($email){
		mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar: '.mysql_error());
		mysql_select_db("CinesLy") or die ('No se pudo seleccionar la base de datos');
		$sql="SELECT * FROM usuario WHERE email = '".$email."'";
		$resultado= mysql_query($sql);
		$row=mysql_num_rows($resultado);
		if($row==1){
			$row=mysql_fetch_array($resultado);
			return new Usuario($row['nombreUsuario'],$row['email'],$row['pass'],$row['tipoUsuario'],$row['foto'],$row['preferencia1'],$row['preferencia2'],$row['preferencia3'],$row['estado'],$row['ciudadActual'],$row['fechaNacimiento'],$row['eslogan']);
		}else{
			echo "El usuario no se encuentra registrado.";
			
		}
	}

	function loguearUsuario(){
		$this->conectarBD();
		$sql="SELECT * FROM usuario WHERE email = '".$this->email."' AND pass = '".$this->pass."'";
		$resultado=$this->consultaBD($sql);
		$row=mysql_num_rows($resultado);
		if($row==1){
			$row=mysql_fetch_array($resultado);
			session_start();

			//$_SESSION['usuario'] = $this->getObjetoUsuario($row['email'],$row['pass']);
			$_SESSION['usuario'] = Usuario::getObjetoUsuario($this->email);

			if (!(isset($_SESSION['usuario']->nombreUsuario))) {
				echo "error";
			} else if($_SESSION['usuario']->tipoUsuario==0) {
				//echo $_SESSION['usuario']->email;
				header("Location:../pantallaPrincipal.php");
			} else if($_SESSION['usuario']->tipoUsuario==1) { 
				header("Location:../administrador.php");
			}
		} else {
			header("Location:../index.php?login=bad");
		}
	} 

	function registrarUsuario(){
		$this->conectarBD();
		$sql="INSERT INTO usuario(nombreUsuario, email, pass, tipoUsuario) VALUES ('".$this->nombreUsuario."','".$this->email."','".$this->pass."',0)";
		$this->consultaBD($sql);
		//header("Location:../index.php");
		$message = "El usuario ha sido registrado correctamente.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Location:../index.php");
	}


/*
function recuperarUsuario(){
	mail("i.gd1989@hotmail.es","Desgraciao","Toma tu puta contraseña hijo de perra");
	echo "correo enviado ".$this->email;	 
	//header("Location:../index.php");
}
*/

function bajaUsuario(){
	$this->conectarBD();
	$sql="DELETE FROM usuario WHERE email = '".$this->email."' AND pass = '".$this->pass."'";
	$this->consultaBD($sql);
	header("location:../index.php");
}

function actualizarUsuario($email) {
	$this->conectarBD();
	$sql="UPDATE usuario SET nombreUsuario='".$this->nombreUsuario."' , email='".$this->email."' , pass='".$this->pass."' WHERE email='".$email."'";	
	$this->consultaBD($sql);
	header("Location:index.php");
}

/*
function registrarUsuarioAdmin($nombreUsuario,$email,$pass,$tipoUsuario){
	$this->conectarBD();
	$sql="INSERT INTO usuarios(nombreUsuario, email, pass, tipoUsuario) VALUES ('".$nombreUsuario."','".$email."','".$pass."','".$tipoUsuario."')";
	$this->consult($sql);
	header("Location:administrador.php");
}

function eliminarUsuarioAdmin(){
	$this->conectarBD();
	$sql="DELETE FROM usuario WHERE email ='".$this->email."'";
	$this->consultaBD($sql);
	header("location:administrador.php");
}

function modificarUsuarioAdmin($email){
	$this->conectarBD();
	$sql="UPDATE usuario SET nombreUsuario='".$this->nombreUsuario."',email='".$this->email."', pass='".$this->pass."', tipoUsuario=".$this->tipoUsuario." WHERE email='".$email."'";
	$this->consultaBD($sql);
	header("location:administrador.php");
}
*/


function getAmigosParaConfirmar(){
	$this->conectarBD();
	$sql = "SELECT email1 FROM agrega WHERE email2='$this->email' and estado = '1' ";
	$resultado= mysql_query($sql);
	$toRet = array();
	while($row = mysql_fetch_array($resultado)){

		array_push($toRet, $this->getObjetoUsuario($row["email1"]));
	}

	return $toRet;


}

function getAmigosSinConfirmar(){

	$this->conectarBD();
	$sql = "SELECT email2 FROM agrega WHERE email1='$this->email' and estado = '1' ";
	$resultado= mysql_query($sql);
	$toRet = array();
	while($row = mysql_fetch_array($resultado)){

		array_push($toRet, $this->getObjetoUsuario($row["email2"]));
	}

	return $toRet;


}

function getAmigos(){
	$this->conectarBD();
	$sql = "SELECT email2 FROM agrega WHERE email1='$this->email' and estado = '0' ";
	$resultado= mysql_query($sql);
	$toRet = array();
	while($row = mysql_fetch_array($resultado)){

		array_push($toRet, $this->getObjetoUsuario($row["email2"]));
	}

	$sql = "SELECT email1 FROM agrega WHERE email2='$this->email' and estado='0' ";
	$resultado= mysql_query($sql);

	while($row = mysql_fetch_array($resultado)){

		array_push($toRet, $this->getObjetoUsuario($row["email1"]));
	}
	return $toRet;

}


function eliminarAmigo($emailamigo){
	$this->conectarBD();
	$sql = "DELETE FROM agrega WHERE (email1='$emailamigo' and email2='$this->email') or (email2='$emailamigo' and email1='$this->email')";
	return mysql_query($sql);


}

function addAmigo($emailAmigo){
	$this->conectarBD();
	$sql = "SELECT email FROM usuario where email='$emailAmigo'";


	if(mysql_num_rows(mysql_query($sql)) == 0){
		return "noexiste";

	}
	//Si un usuario tiene a 1 el campo estado significa que esta pendiente de aceptacion. 0 es que esta todo correcto.
	$sql = "INSERT INTO agrega values('$this->email','$emailAmigo','1')";
	
	if(mysql_query($sql)){
		return "insertado";
	}
	return "error";
}

function confirmarAmigo($usuarioTarget){
	$this->conectarBD();
	$sql = "UPDATE agrega SET estado='0' WHERE email2 = '$this->email' AND email1 = '$usuarioTarget'";
	mysql_query($sql) or die(mysql_error());

}

function denegarAmigo($usuarioTarget){
	$this->conectarBD();
	
	return mysql_query("Delete FROM agrega WHERE email1 = '$usuarioTarget' or email2 = '$usuarioTarget'");
}

function insertarPublicacion($publi){
	$this->conectarBD();

	$sql = "INSERT INTO publicacion(email, fecha, publica) values('$this->email','".date("Y-m-d H:i:s")."','$publi')";
	return mysql_query($sql);

}

function consultarPublicacion(){
	$this->conectarBD();
	$toRet = array();
	$toRet[0] = array();
	$toRet[1] = array();
	$toRet[2] = array();
	$toRet[3] = array();
	$toRet[4] = array();	

//	$sql="SELECT u.nombreUsuario, p.fecha, p.publica FROM publicacion p, usuario u WHERE u.email = '".$this->email."' AND p.email = '".$this->email."' ORDER BY p.fecha desc";
$sql= "\n"
    . "SELECT u.nombreUsuario,u.email, p.fecha,p.publica,p.idPublicacion FROM agrega a, usuario u, publicacion p WHERE a.email2='".$this->email."' AND a.email1=u.email AND a.estado=0 AND u.email=p.email \n"
    . "UNION\n"
    . "SELECT u.nombreUsuario,u.email, p.fecha,p.publica,p.idPublicacion FROM agrega a, usuario u, publicacion p WHERE a.email1='".$this->email."' AND a.email2=u.email AND a.estado=0 AND u.email=p.email \n"
    . "UNION\n"
    . "SELECT u.nombreUsuario,u.email, p.fecha,p.publica,p.idPublicacion FROM usuario u,publicacion p WHERE u.email='".$this->email."' AND u.email=p.email ORDER BY 3 desc";

	$resultado=mysql_query($sql);
	while($row = mysql_fetch_array($resultado)){
	 	array_push($toRet[0], $row["nombreUsuario"]);
	 	array_push($toRet[1], $row["fecha"]);
	 	array_push($toRet[2], $row["publica"]);	
	 	array_push($toRet[3], $row["email"]);			
	 	array_push($toRet[4], $row["idPublicacion"]);

	}
	return $toRet;

}

function editarPerfil($newName, $newPass){

	$this->conectarBD();

	$sql = "UPDATE usuario SET nombreUsuario = '$newName' , pass = '$newPass' WHERE email = '$this->email' ";
	return mysql_query($sql);
}

function actualizaBio($newBio){
	$this->conectarBD();

	$sql = "UPDATE usuario SET eslogan = '$newBio' WHERE email = '$this->email' ";
	return mysql_query($sql);
}


function eliminarCuenta(){
	$this->conectarBD();

	$sql = "DELETE FROM usuario WHERE email = '$this->email' ";
	return mysql_query($sql);


}


function eliminarPublicacion($idP){
	$this->conectarBD();
	$sql = "DELETE FROM publicacion WHERE idPublicacion=$idP";
	return mysql_query($sql);


}

function editarPublicacion($id,$publi){

	$this->conectarBD();
	$sql = "UPDATE publicacion SET publica='".$publi."' WHERE idPublicacion=".$id;
	return mysql_query($sql);
}

}

?>