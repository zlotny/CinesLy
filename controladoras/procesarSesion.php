<?php


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
			
			
			$sesion = new Sesion($idPelicula,$idSesion,$fecha,$sala,$capacidad);
			
			Sesion::modificarSesion($sesion->idPelicula,$sesion->idSesion,$sesion);
			echo "string";


		}
		else{
			if($accion=="Eliminar"){
				$idPelicula = $_REQUEST['idPelicula'];
				$idSesion = $_REQUEST['idSesion'];

				Sesion::eliminarSesion($idPelicula,$idSesion);
				
			}
			else{
				if($accion=="Consultar"){
						$idPelicula = $_REQUEST['idPelicula'];
						$idSesion = $_REQUEST['idSesion'];

						$array=Sesion::consultarSesion($idSesion,$idPelicula);
							?> 
							<meta charset="utf-8">
							<title>CinesLy</title>
							<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
							<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css">
							<link rel="stylesheet" type="text/css" href="../style/style.css">

						    <div class="well">
						    <div class="col-md-1"><?php echo $array['fecha']; ?></div>
						    <div class="col-md-1"><?php echo $array['capacidad']; ?></div>
						    <div class="col-md-1"><?php echo $array['sala']; ?></div>
						    </div>

							 <?php
						
				}
			}

		}
	}
?> 