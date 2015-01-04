<?php
include_once "../modelos/sesion.php";


if(!substr ( $_REQUEST["sala"] , 0) or !substr ( $_REQUEST["fecha"] , 0) or !substr ( $_REQUEST["capacidad"] , 0) or !substr ( $_REQUEST["idPelicula"] , 0)){
	header("Location: ../adminModificarSesion.php?faltanDatos=yes");
}
else{
	Sesion::conectarBD();
	$comprobar='SELECT count(*) as hola from sesion where sala="'.$_REQUEST["sala"].'" and fecha="'.$_REQUEST["fecha"].'"';
	$tupla=mysql_query($comprobar);
	$resultado=mysql_fetch_array($tupla);
	if($resultado[0]>0){
		header("Location: ../adminModificarSesion.php?duplicado=yes");
	}
	else{
		$sql='INSERT INTO sesion (sala, fecha, capacidad, idPelicula) VALUES("'.$_REQUEST["sala"].'", "'.$_REQUEST["fecha"].'","'. $_REQUEST["capacidad"].'","'. $_REQUEST["idPelicula"].'")';
		echo $sql;
		$resultado=mysql_query($sql);
		if(!$resultado){
			die('Consulta no válida: ' . mysql_error());
			header("Location: ../adminModificarSesion.php?inserccion=bad");
		}
		else{
			header("Location: ../adminModificarSesion.php?inserccion=good");
		}	
	}
}

?> 