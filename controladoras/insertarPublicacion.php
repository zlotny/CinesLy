<?php

include_once "../modelos/usuario.php";
session_start();

$_SESSION["usuario"]->insertarPublicacion($_REQUEST["publicacion"]);

header("Location: ../pantallaPrincipal.php?publi=correcta");

?>