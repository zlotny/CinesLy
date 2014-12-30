<?php

session_start();

include_once "../modelos/pelicula.php";
include_once "../modelos/usuario.php";
include_once "../modelos/sesion.php";
include_once "../modelos/evento.php";


$grupoAinsertar = new Evento($_REQUEST["idGrupo"], $_REQUEST["nuevaDescripcion"], $_REQUEST["idSesionNueva"], "", $_REQUEST["nuevoNombre"]);

if(Evento::modificarGrupo($grupoAinsertar)){
	header("Location:../ver_grupo.php?correcto=OKAI&id=".$_REQUEST["idGrupo"]);
}else{
	header("Location:../ver_grupo.php?correcto=NOPE&id=".$_REQUEST["idGrupo"]);
}

?>