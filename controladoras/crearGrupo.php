
<?php
include_once "../modelos/usuario.php";
include_once "../modelos/pelicula.php";
include_once "../modelos/evento.php";

session_start();

$nombreGrupo = $_REQUEST["nombreGrupo"];
$idSesion = $_REQUEST["idSesion"];
//Array, ojo
$amigosToAdd[] = $_REQUEST["arrayAmigos"];

if(  (strlen($nombreGrupo) > 3) &&  (strlen($amigosToAdd[0]) > 1)){

//Inserta el grupo/evento en la base de datos
	$toInsert = new Evento("descripcion_vacia_por_ahora", $idSesion, $_SESSION["usuario"]->email, $nombreGrupo);

	if($toInsert->altaEvento()){
		header("Location: ../mis_grupos.php?estado=correcto");
		
	}else{
		header("Location: ../mis_grupos.php?estado=error");
	}

}else{
	header("Location: ../mis_grupos.php?estado=error");
}

?>