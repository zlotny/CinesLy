<?php
include_once "../modelos/usuario.php";
session_start();


$_SESSION["usuario"]->actualizaBio($_REQUEST["eslogan"]);
$_SESSION["usuario"] = Usuario::getObjetoUsuario($_SESSION["usuario"]->email);

header("Location: ../perfil.php");


?>