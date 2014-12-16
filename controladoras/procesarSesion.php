<?php

include "../modelos/sesion.php";

$accion = $_REQUEST['accion'];



if($accion == "nueva"){
	
	$idSesion = $_REQUEST['idSesion'];
	$fechaSesion = $_REQUEST['fechaSesion'];
	$capacidad = $_REQUEST['capacidad'];
	$idSesion = $_REQUEST['idSesion'];
	$idPelicula = $_REQUEST['idPelicula'];
	
	

	$sesion = new Sesion($idSesion,$fechaSesion,$capacidad,$idSesion,$idPelicula);
	
	Sesion::anhadirSesion($sesion);
	
} else { 
		if($accion=="modificar") { 

			$idPelicula = $_REQUEST['idPelicula'];
			$idSesion = $_REQUEST['idSesion'];

			if(isset($_REQUEST['capacidad'])){
				$capacidad = $_REQUEST['capacidad']; 
			}else{
				$capacidad="";
			}
			if(isset($_REQUEST['fechaSesion'])){
				$fechaSesion = $_REQUEST['fechaSesion'];
			}else{
				$fechaSesion="";
			}
			if(isset($_REQUEST['sala'])){
				$sala = $_REQUEST['sala'];
			}else{
				$sala="";
			}
			
			echo "request hecho <br>";
			$sesion = new Sesion($idPelicula,$idSesion,$sala,$fechaSesion,$capacidad);
			echo "peli creada";
			Pelicula::modificarSesion($sesion->idPelicula,$sesion->idSesion,$sesionn,$sesion);


		}
	}
?> 