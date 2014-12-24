<?php
include_once "../modelos/evento.php";
session_start();

$grupos = $_REQUEST["paraEliminar"];
$flag = false;
if(isset($grupos[0])){
	foreach($grupos as $grupo){
		$actual = Evento::getGrupoById($grupo);
		$flag = $actual->eliminar();

	}
}

if($flag){
	header("Location: ../mis_grupos.php?operation=success");
}else{
	header("Location: ../mis_grupos.php?operation=error");
}





?>