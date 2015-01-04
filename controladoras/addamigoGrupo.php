<?php

include_once "../modelos/evento.php";

if(Evento::addAmigoGrupo($_REQUEST["emailAmigoAdd"], $_REQUEST["id"])){
	header("Location: ../ver_grupo.php?correcto=OKAI&id=".$_REQUEST["id"]);
}else{
	header("Location: ../ver_grupo.php?correcto=OKAI&id=".$_REQUEST["id"]);

}






?>