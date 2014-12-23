<?php
include_once "../modelos/usuario.php";
session_start();

if(isset($_REQUEST["id"])){
	

	$pu=$_REQUEST["publi"];
	$id=$_REQUEST["id"];

	$flag = $_SESSION["usuario"]->editarPublicacion($id,$pu);
	if($flag){
		header("Location: ../pantallaPrincipal.php");
	}else{
		echo "Ha habido un error al editar tu publicación. ";
	}



}else{
	echo "Ha habido un error al editar un publicación";
}






?>