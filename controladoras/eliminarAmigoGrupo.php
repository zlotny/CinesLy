<?php

include_once "../modelos/evento.php";

if(Evento::eliminarUsuarioGrupo($_GET["email"], $_GET["id"])){
	header("Location: ../ver_grupo.php?correcto=OKAI&id=".$_GET["id"]);
}else{
	header("Location: ../ver_grupo.php?correcto=OKAI&id=".$_GET["id"]);

}






?>