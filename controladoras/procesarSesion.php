<?php

	echo "test";
include "../modelos/sesion.php";

$accion = $_REQUEST['accion'];



if($accion == "Nueva"){
	
	$idPelicula = $_REQUEST['idPelicula'];
	$idSesion = $_REQUEST['idSesion'];
	$fecha = $_REQUEST['fecha'];
	$sala = $_REQUEST['sala'];
	$capacidad = $_REQUEST['capacidad'];
	
	$sesion = new Sesion($idPelicula,$idSesion,$fecha,$sala,$capacidad);
	Sesion::anhadirSesion($sesion);
	
} else { 
		if($accion=="Modificar") { 

			$idPelicula = $_REQUEST['idPelicula'];
			$idSesion = $_REQUEST['idSesion'];

			if(isset($_REQUEST['capacidad'])){
				$capacidad = $_REQUEST['capacidad']; 
			}else{
				$capacidad="";
			}
			if(isset($_REQUEST['fecha'])){
				$fecha = $_REQUEST['fecha'];
			}else{
				$fecha="";
			}
			if(isset($_REQUEST['sala'])){
				$sala = $_REQUEST['sala'];
			}else{
				$sala="";
			}
			
			echo "request hecho <br>";
			$sesion = new Sesion($idPelicula,$idSesion,$sala,$fecha,$capacidad);
			echo "peli creada";
			Pelicula::modificarSesion($sesion->idPelicula,$sesion->idSesion,$sesion);


		}
		else{
			if($accion=="Eliminar"){
				$idPelicula = $_REQUEST['idPelicula'];
				$idSesion = $_REQUEST['idSesion'];

				Sesion::eliminarSesion($idPelicula,$idSesion,$sesion);
				
			}
			else{
				if($accion=="Consultar"){

				}
			}

		}
	}
?> 