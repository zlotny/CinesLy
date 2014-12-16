<?php

class Sesion{

	var $sala;
	var $fechaSesion;
	var $capacidad;
	var $idSesion;
	var $idPelicula;



	function __construct($idSesion,$sala,$fechaSesion,$capacidad,$idPelicula){
		
		$this->idSesion=$idSesion;
		$this->sala=$sala;
		$this->fechaSesion=$fechaSesion;
	 	$this->capacidad=$capacidad;
	 	$this->idPelicula=$idPelicula;

	}

	/*GETTERS*/
	function getIdSesion(){
		return $idSesion;
	}

	function getSala(){
		return $sala;
	}

	function getFechaSesion(){
		return $fechaSesion;
	}

	function getIdPelicula(){
		return $idPelicula;
	}

	function getCapacidad(){
		return $capacidad;
	}

	/*
	function getObjetoSesion($titulo,$director){
		$this->conectarBD();
		$sql_1="SELECT * FROM sesion WHERE titulo= '".$titulo."' AND director ='".$director."'";
		$resultado=$this->consulta($sql);

		$row=mysql_num_rows($resultado);
		if($row=0){
			echo "Sesion no encontrada";
		}
		else{
			$row=mysql_fetch_array($resultado);
			$sesion=new sesion($row["titulo"],$row["director"],$row["sala"],$row["fechaSesion"],$row["capacidad"]);
			return $sesion;
		}
	}
	*/

	/*SETTERS*/

	function setIdSesion($idSesion){
		$this->idSesion=$idSesion;
	}

	
	function setSala($sala){
		$this->sala=$sala;
	}

	function setFechaSesion($fechaSesion){
		$this->fechaSesion=$fechaSesion;
	}

	function setHoraSesion($horaSesion){
		$this->horaSesion=$horaSesion;
	}

	function setCapacidad($capacidad){
		$this->capacidad=$capacidad;
	}

	/*FUNCIONES*/


	function conectarBD(){
		mysql_connect("localhost","Usuario","Contraseña") or die ('No se pudo conectar'.mysql_error());
		mysql_select_db("CinesLy") or die ('No se pudo conectar a la base de datos');
	}

	function consulta($consulta){
		$resultado=mysql_query($consulta);
		if($resultado){
			echo 'MySql Error' .mysql_error();
			exit;
		}
		return $resultado;

	}

	function anhadirSesion($idPelicula,$Sesion){


	}

	function eliminarSesion($idPelicula,$idSesion){

		$this->conectarBD();
		$sql="DELETE FROM sesion WHERE idSesion ='".$idSesion."' and idPelicula = '".$idPelicula."'";
		$this->consultaBD($sql);
		header("location:sesion.php");
	}

	function modificarSesion($idPelicula,$idSesion){

		
	}

	function consultarSesion($idSesion,$idPelicula){

		$this->conectarBD();
		$sql="SELECT * FROM sesion WHERE idSesion ='".$idSesion."' and idPelicula = '".$idPelicula."'";
		$resultado=mysql_query($sql);
		$row=mysql_num_rows($resultado);
		if(row==1){
			$row=mysql_fetch_array($resultado);
			return new Sesion($sesi["idPelicula"],$sesi["idSesion"],$sesi["sala"],$sesi["fechaSesion"],$sesi["capacidad"]);
		}else{
			echo "La sesion no existe.";
		}
		
	}






}
?>