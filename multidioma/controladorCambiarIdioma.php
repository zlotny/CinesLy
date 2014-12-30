<?php

session_start();

switch ($_GET["lang"]){
	case 'ES':
	include "esp.php";
	$_SESSION["idioma"] = $textos;
	header("Location: ".$_SERVER["HTTP_REFERER"]);
	break;

	case 'EN':
	include "ing.php";
	$_SESSION["idioma"] = $textos;
	header("Location: ".$_SERVER["HTTP_REFERER"]);
	break;

	case 'JP':
	include "jap.php";
	$_SESSION["idioma"] = $textos;
	header("Location: ".$_SERVER["HTTP_REFERER"]);
	break;

	default:
	echo "test";



}

?>
