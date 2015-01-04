<?php

include_once "../modelos/evento.php";

if(Evento::eliminarUsuarioGrupo($_REQUEST["email"], $_REQUEST["id"])){
	header("Location: ../ver_grupo.php?correcto=OKAI&id=".$_REQUEST["id"]);
}else{
	header("Location: ../ver_grupo.php?correcto=OKAI&id=".$_REQUEST["id"]);

}






?>