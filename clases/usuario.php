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

function conectarBD() {
	mysql_connect("localhost","admin","admin") or die ('No se pudo conectar: '.mysql_error());
	mysql_select_db("CinesLy") or die ('No se pudo seleccionar la base de datos');
}

function consulta($consulta)
{
	$resultado = mysql_query($consulta);
	if(!$resultado)	{
		echo 'MySql Error: '.mysql_error();
		exit;
	}
	return $resultado;
}


function getObjetoUsuario($email){
	$this->conectarBD();
	$sql="SELECT * FROM usuario WHERE email = '".$email."'";
	$resultado=$this->consulta($sql);
	$row=mysql_num_rows($resultado);

	if($row==1){
		$row=mysql_fetch_array($resultado);
		return new Usuario($row['nombreUsuario'],$row['email'],$row['pass'],$row['tipoUsuario'],$row['foto'],$row['preferencia1'],$row['preferencia2'],$row['preferencia3'],$row['estado'],$row['ciudadActual'],$row['fechaNacimiento'],$row['eslogan']));
	}else{
		echo "El usuario no se encuentra registrado.";
	}
}

function loguear($email,$pass){
	$this->conectarBD();
	$sql="SELECT email FROM usuario WHERE email = '".$email."' AND pass = '".$pass."'";
	$resultado=$this->consulta($sql);
	$row=mysql_num_rows($resultado);
	
	if($row==1){
		$row=mysql_fetch_array($resultado);
		session_start();

		$_SESSION['usuario'] = $this->getObjetoUsuario($row['email']);
		if (!(isset($_SESSION['usuario']))) {
			echo "error";
		} else if($_SESSION['usuario']->tipoUsuario==0) {
			header("Location:pantallaPrincipal.php");
		} else if($_SESSION['usuario']->tipoUsuario==1) { 
			header("Location:administrador.php");
		}
	} else {
		header("Location:index.php");
	}
} 

function register($name,$email,$pass){
		$this->ConectDB();
		$sql="INSERT INTO usuarios(nombreUs, email, contraseña, esAdmin) VALUES ('".$name."','".$email."','".$pass."',0)";
		
		$this->consult($sql);
		$sql = "INSERT INTO `categoria`(`nombreCat`, `email`) VALUES ('General','".$email."')";		
		$this->consult($sql);
		header("Location:index.php");
}

function registerAdmin($name,$email,$pass,$tipo){
		$this->ConectDB();
		$sql="INSERT INTO usuarios(nombreUs, email, contraseña, esAdmin) VALUES ('".$name."','".$email."','".$pass."','".$tipo."')";
		
		$this->consult($sql);
		$sql = "INSERT INTO `categoria`(`nombreCat`, `email`) VALUES ('General','".$email."')";		
		$this->consult($sql);
		header("Location:administrador.php");
}

function borrar(){
		$this->ConectDB();
		$sql="DELETE FROM usuarios WHERE email ='$this->email'";
		$this->consult($sql);
		header("location: administrador.php");
}


function actualizar($email) {
	$this->ConectDB();
	$sql="UPDATE usuarios set nombreUs='$this->name' , email='$this->email' , contraseña= '$this->pass' WHERE email='$email'";
	echo $sql;	
	$this->consult($sql);
	header("Location:index.php");
}

function modificar($id){

$this->ConectDB();

$sql="UPDATE usuarios set nombreUs='".$this->name."',email='".$this->email."', contraseña='".$this->pass."', esAdmin=".$this->typeUser." where email='".$id."'";
//echo $sql;

$this->consult($sql);

header("location: administrador.php");
}

}

?>