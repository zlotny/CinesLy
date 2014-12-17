<?php
include_once "modelos/usuario.php";

echo $_SESSION["usuario"]->email;
$_SESSION["usuario"]->getAmigos();



?>