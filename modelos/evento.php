<?php
include_once "usuario.php";


class Evento{	

	var $idEvento;
	var $descripcion;
	var $email;
	var $idSesion;
	var $nombre;

	function __construct($id, $descripcion, $sesion, $email, $nombre)
	{

		$this->idEvento = $id;
		$this->idSesion = $sesion;
		$this->email = $email;
		$this->descripcion = $descripcion;
		$this->nombre = $nombre;
	}


	 function conectarBD()//función que conecta con la base de datos, será llamada de forma estática
	 {

	 	mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar'.mysql_error());
	 	mysql_select_db("CinesLy") or die ('No se pudo conectar a la base de datos');

	 }

	 function altaEvento($integrantes)//inserta un evento en la bd
	 {
	 	Evento::conectarBD();

	 	$sql="INSERT INTO evento (idSesion, email, descripcion, nombre) VALUES ('$this->idSesion', '$this->email', '$this->descripcion', '$this->nombre')";
	 	$toRet = mysql_query($sql);


	 	foreach($integrantes as $integrante){
	 		$id = Evento::getIdByName($this->nombre);
	 		$sql = "INSERT INTO contiene VALUES('$id', '$integrante')";
	 		$toRet = mysql_query($sql);
	 	}
	 	
	 	return $toRet;
	 }

//Devuelve un array con los objetos grupo creados por el usuario que se pasa por parámetro
	 function listarGrupos($emailTarget){
	 	Evento::conectarBD();
	 	$sql = "SELECT id_evento, idSesion, email, descripcion, nombre FROM evento WHERE email = '$emailTarget'";
	 	$resultado = mysql_query($sql);
	 	$toRet = array();
	 	while($row = mysql_fetch_array($resultado)){
	 		array_push($toRet, new Evento($row["id_evento"], $row["descripcion"], $row["idSesion"], $emailTarget, $row["nombre"]));
	 	}
	 	return $toRet;
	 }

	 function getIdByName($name){
	 	Evento::conectarBD();
	 	$sql = "SELECT id_evento FROM evento WHERE nombre = '$name'";
	 	$resultado = mysql_fetch_array(mysql_query($sql));
	 	return $resultado["id_evento"];
	 }

	 function getGrupoById($id){
	 	Evento::conectarBD();
	 	$sql = "SELECT * FROM evento WHERE id_evento = '$id'";
	 	$resultado = mysql_fetch_array(mysql_query($sql));
	 	return new Evento($resultado["id_evento"], $resultado["descripcion"], $resultado["idSesion"], $resultado["email"], $resultado["nombre"]);
	 }

	 //Retorna numero de integrantes en un grupo dado
	 function getNumIntegrantes($idEvento){
	 	Evento::conectarBD();
	 	return mysql_fetch_array(mysql_query("SELECT COUNT( * ) FROM contiene WHERE id_evento = $idEvento"))[0];
	 }

	 function getArrayIntegrantes($idEvento){
	 	Evento::conectarBD();
	 	$sql = "SELECT email FROM contiene WHERE id_evento = '$idEvento'";
	 	$resultado = mysql_query($sql);
	 	$toRet = array();
	 	while ($row = mysql_fetch_array($resultado)){

	 		array_push($toRet, Usuario::getObjetoUsuario($row["email"]));
	 	}
	 	return $toRet;
	 }

	 function eliminar(){
	 	Evento::conectarBD();
	 	$sql = "DELETE FROM evento WHERE id_evento='$this->idEvento'";
	 	return mysql_query($sql);
	 }

	 function modificarGrupo($grupoNuevo){
	 	Evento::conectarBD();
	 	$sql = "UPDATE evento SET idSesion='$grupoNuevo->idSesion', descripcion = '$grupoNuevo->descripcion', nombre= '$grupoNuevo->nombre' where id_evento='$grupoNuevo->idEvento'";
	 	return mysql_query($sql);
	 }

	 function eliminarUsuarioGrupo($email, $id){
	 	Evento::conectarBD();
	 	$sql = "DELETE FROM contiene WHERE id_evento='$id' AND email='$email' ";
	 	echo $sql;
	 	return mysql_query($sql);
	 }


	}
