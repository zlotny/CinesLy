<?php
include_once "../modelos/usuario.php";
session_start();

$url = $_REQUEST["url"];

if( isset($_REQUEST["id"]) ) {

	$flag = $_SESSION["usuario"]->eliminarNotif($_REQUEST["id"]);
echo $url;
	header("Location: ../".$url);


} else {

	echo "Ha habido un error al eliminar una notificacion";

}

?>