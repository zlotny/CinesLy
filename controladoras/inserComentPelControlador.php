<?php
include_once "../modelos/usuario.php";
include_once "../modelos/pelicula.php";
session_start();


	Pelicula::comentarPelicula($_REQUEST['idPeli'],$_SESSION["usuario"]->email,$_REQUEST['coments'],date("Y-m-d H:i:s"));
	header("Location: ../ficha_pelicula.php?insertado=true&id=".$_REQUEST['idPeli']);

?>