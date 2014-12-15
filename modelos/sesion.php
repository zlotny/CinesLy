<?php

class Sesion{

	var $titulo;
	var $director;
	var $sala;
	var $fechaSesion;
	var $capacidad;



	function __construct($titulo,$director,$sala,$fechaSesion,$capacidad){
		
		$this->titulo=$titulo;
		$this->director=$director;
		$this->sala=$sala;
		$this->fechaSesion=$fechaSesion;
	 	$this->capacidad=$capacidad;

	}

	/*GETTERS*/
	function getTitulo(){
		return $titulo;
	}

	function getDirector(){
		return $director;
	}

	function getSala(){
		return $sala;
	}

	function getFechaSesion(){
		return $fechaSesion;
	}

	function getCapacidad(){
		return $capacidad;
	}

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


	/*SETTERS*/

	function setTitulo($titulo){
		$this->titulo=$titulo;
	}

	function setDirector($director){
		$this->director=$director;
	}

	function setSala($sala){
		$this->sala=$sala;
	}

	function setFechaSesion($fechaSesion){
		$this->fechaSesion=$fechaSesion;
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






}
?>