<?php

include_once "../modelos/sesion.php";


echo $_GET["idSesion"];
echo $_REQUEST["sala"];
echo $_REQUEST["fecha"];
echo $_REQUEST["capacidad"];
echo $_REQUEST["idPelicula"];


if(!substr ( $_REQUEST["sala"] , 0) or !substr ( $_REQUEST["fecha"] , 0) or !substr ( $_REQUEST["capacidad"] , 0) or !substr ( $_REQUEST["idPelicula"] , 0)){
	header("Location: ../adminModificarSesion.php?faltanDatos=yes");
}
else{
	$idSesion=$_GET["idSesion"];

 	$sesion= new Sesion($_REQUEST["idPelicula"],$idSesion,$_REQUEST["fecha"],$_REQUEST["sala"],$_REQUEST["capacidad"]);

 	$resultado=Sesion::modificarSesion( $_REQUEST["idPelicula"],$idSesion,$sesion);

 	if(!$resultado){
 		header("Location: ../adminModificarSesion.php?update=bad");
 	}
 	else{
 		header("Location: ../adminModificarSesion.php?update=good");
 	}
 /*
 	*/
}

?> 