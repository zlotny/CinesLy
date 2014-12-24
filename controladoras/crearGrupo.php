
<?php
include_once "../modelos/usuario.php";
include_once "../modelos/pelicula.php";
include_once "../modelos/evento.php";

session_start();
$nombreGrupo = $_REQUEST["nombreGrupo"];
$idSesion = $_REQUEST["idSesion"];
$descripcion = $_REQUEST["descripcionGrupo"];
//Array, ojo
$amigosToAdd = $_POST["arrayamigos"];

if(  (strlen($nombreGrupo) > 3) &&  (strlen($descripcion) > 3) ){
//Inserta el grupo/evento en la base de datos
	$toInsert = new Evento("indiferente", $descripcion, $idSesion, $_SESSION["usuario"]->email, $nombreGrupo);

	if($toInsert->altaEvento($amigosToAdd)){
		header("Location: ../mis_grupos.php?estado=correcto");
		
	}else{
		header("Location: ../mis_grupos.php?estado=error");
	}

}else{
	header("Location: ../mis_grupos.php?estado=error");
}

?>