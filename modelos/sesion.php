<?php

class Sesion{

	var $idPelicula;
	var $idSesion;
	var $sala;
	var $fecha;
	var $capacidad;
	



	function __construct($idPelicula,$idSesion,$fecha,$sala,$capacidad){
		
		$this->idPelicula=$idPelicula;
		$this->idSesion=$idSesion;
		$this->fecha=$fecha;
		$this->sala=$sala;
	 	$this->capacidad=$capacidad;
	 	
	}

	/*GETTERS*/
	function getIdSesion(){
		return $idSesion;
	}

	function getSala(){
		return $sala;
	}

	function getFecha(){
		return $fecha;
	}

	function getIdPelicula(){
		return $idPelicula;
	}

	function getCapacidad(){
		return $capacidad;
	}

	
	/*SETTERS*/

	function setIdSesion($idSesion){
		$this->idSesion=$idSesion;
	}

	
	function setSala($sala){
		$this->sala=$sala;
	}

	function setFecha($fecha){
		$this->fecha=$fecha;
	}

	function setHoraSesion($horaSesion){
		$this->horaSesion=$horaSesion;
	}

	function setCapacidad($capacidad){
		$this->capacidad=$capacidad;
	}

	/*FUNCIONES*/


	function conectarBD(){
		mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar'.mysql_error());
		mysql_select_db("CinesLy") or die ('No se pudo conectar a la base de datos');
	}

	function consultaBD($consulta){
		
		$resultado=mysql_query($consulta);
		if(!$resultado){
			echo 'MySql Error' .mysql_error();
			exit;
		}
		return $resultado;

	}

	function anhadirSesion($sesion){

		
		Sesion::conectarBD();
		
		$sql="INSERT INTO sesion (idPelicula,idSesion,fecha,sala,capacidad)
		 VALUES ('$sesion->idPelicula', '$sesion->idSesion' , '$sesion->fecha' ,'$sesion->sala' , '$sesion->capacidad')";

		echo $sql;
		$resultado=Sesion::consultaBD($sql);	
		
		if($resultado){
			echo "Sesion anhadida";
		}	 
	
	}

	

	function eliminarSesion($idPelicula,$idSesion,$sesion){

		Sesion::conectarBD();
		$sql="DELETE FROM sesion WHERE idSesion ='".$idSesion."' and idPelicula = '".$idPelicula."'";
		$resultado=Sesion::consultaBD($sql);
		
		if($resultado){
			echo "Sesion eliminada";
		}
		
	}

	function modificarSesion($idPelicula,$idSesion,$sesion){

		Sesion::conectarBD();


		$sql="SELECT * FROM sesion WHERE idSesion ='".$idSesion."' and idPelicula = '".$idPelicula."'";

		$resultado=Sesion::consultaBD($sql);

		$original=mysql_fetch_array($resultado);

		$sesion1=new Sesion($original["idPelicula"],$original["idSesion"],$original["fecha"],$original["sala"],$original["capacidad"]);


		if($sesion->fecha!=""){
			$sesion1->fecha=$sesion->fecha;
		}
		if($sesion->sala!=""){
			$sesion1->sala=$sesion->sala;
		}
		if($sesion->capacidad!=""){
			$sesion1->capacidad=$sesion->capacidad;
		}
		
		$sql2="UPDATE pelicula SET  fecha ='$sesion1->fecha', sala = '$sesion1->sala', capacidad ='$sesion1->capacidad', 
		WHERE idSesion ='".$idSesion."' and idPelicula = '".$idPelicula."'";
			
		Pelicula::consultaBD($sql2);
	}

	function consultarSesion($idSesion,$idPelicula){

		Sesion::conectarBD();
		$sql="SELECT * FROM sesion WHERE idSesion ='".$idSesion."' and idPelicula = '".$idPelicula."'";
		$resultado=mysql_query($sql);
		$row=mysql_num_rows($resultado);
		if($row==1){
			$row=mysql_fetch_array($resultado);
			return new Sesion($sesi["idPelicula"],$sesi["idSesion"],$sesi["sala"],$sesi["fecha"],$sesi["capacidad"]);
		}else{
			echo "La sesion no existe.";
		}
		
	}






}
?>