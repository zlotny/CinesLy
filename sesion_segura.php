<?php

include_once "modelos/usuario.php";
session_start();
if(!isset($_SESSION["usuario"]->email)){
	header("Location: index.php?sesion=bad");
}

?>