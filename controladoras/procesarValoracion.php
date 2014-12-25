<?php

include_once "../modelos/pelicula.php";
$Valor = $_REQUEST['Valor'];
$id = $_SESSION['idPelicula'];
session_start();

if($Valor == "1"){

	Pelicula::valorarPelicula($_SESSION['idPelicula'],$Valor);

}elseif($Valor == "2"){

	Pelicula::valorarPelicula($_SESSION['idPelicula'],$Valor);

}elseif($Valor == "3"){

	Pelicula::valorarPelicula($_SESSION['idPelicula'],$Valor);

}elseif($Valor == "4"){

	Pelicula::valorarPelicula($_SESSION['idPelicula'],$Valor);

}elseif($Valor == "5"){

	Pelicula::valorarPelicula($_SESSION['idPelicula'],$Valor);
}

header("Location: ../ficha_pelicula.php?id=".$_SESSION['idPelicula']);
?>
