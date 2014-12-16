<?php

class Sesion{

	var $sala;
	var $fechaSesion;
	var $capacidad;
	var $idSesion;
	var $idPelicula;



	function __construct($idPelicula,$idSesion,$sala,$fechaSesion,$capacidad){
		
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

		mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar'.mysql_error());
		mysql_select_db("CinesLy") or die ('No se pudo conectar a la base de datos');

		$sql="INSERT INTO sesion (idPelicula,idSesion,sala,fechaSesion,capacidad)
		 VALUES ('$pelicula->idPelicula', '$pelicula->idSesion' , '$pelicula->sala' , '$pelicula->fechaSesion' , '$pelicula->capacidad')";

		echo $sql;
		$resultado=Pelicula::consultaBD($sql);	

		if($resultado){
			echo "Sesion añadida";
		}	 
	
	}

	

	function eliminarSesion($idPelicula,$idSesion){

		$this->conectarBD();
		$sql="DELETE FROM sesion WHERE idSesion ='".$idSesion."' and idPelicula = '".$idPelicula."'";
		$this->consultaBD($sql);
		header("location:sesion.php");
	}

	function modificarSesion($idPelicula,$idSesion){

		mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar'.mysql_error());
		mysql_select_db("CinesLy") or die ('No se pudo conectar a la base de datos');
		
		echo " <br>conectado BD <br>";
				$sql="SELECT * FROM sesion WHERE idSesion ='".$idSesion."' and idPelicula = '".$idPelicula."'";
		echo $sql;
				$resultado=Sesion::consultaBD($sql);
		echo " <br>select hecho <br>";
				$original=mysql_fetch_array($resultado);

				$sesion1=new Sesion($original[idPelicula],$original[idSesion],$original[sala],$original[fechaSesion],
					$original[capacidad]);
		echo "<br>";
		echo "Sesion de la base de datos";
		echo "<br>";
		/*echo $peli1->fechaEstreno;*/
		echo "<br>";
		/*echo $peli1->titulo;*/
		echo "<br>";

		echo "<br>";

		echo "creado objeto sesion <br>";


		if($sesion->sala!=""){
			echo "sala modificada";
			$sesion1->sala=$sesion->sala;
		}
		if($sesion->fechaSesion!=""){
			$sesion1->fechaSesion=$sesion->fechaSesion;
		}
		if($sesion->capacidad!=""){
			$sesion1->capacidad=$sesion->capacidad;
		}
		
		
		echo "pelicula creada";
				$sql2="UPDATE sesion SET  sala ='$sesion1->sala', fechaSesion = '$sesion1->fechaSesion', capacidad ='$sesion1->capacidad'";
				echo "<br>";
				echo $sql2;
				echo "<br>";
				Sesion::consultaBD($sql2);
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