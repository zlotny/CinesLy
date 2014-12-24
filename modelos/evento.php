<?php
class Evento{	

	var $idEvento;
	var $descripcion;
	var $email;
	var $idSesion;
	var $nombre;

	function __construct($id, $descripcion, $sesion, $email, $nombre)
	{
		$this->idEvento = $id;
		$this->idSesion = $sesion;
		$this->email = $email;
		$this->descripcion = $descripcion;
		$this->nombre = $nombre;
	}


	 function conectarBD()//función que conecta con la base de datos, será llamada de forma estática
	 {

	 	mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar'.mysql_error());
	 	mysql_select_db("CinesLy") or die ('No se pudo conectar a la base de datos');

	 }

	 function altaEvento($integrantes)//inserta un evento en la bd
	 {
	 	Evento::conectarBD();

	 	$sql="INSERT INTO evento (idSesion, email, descripcion, nombre) VALUES ('$this->idSesion', '$this->email', '$this->descripcion', '$this->nombre')";
	 	$toRet = mysql_query($sql);


	 	foreach($integrantes as $integrante){
	 		$id = Evento::getIdByName($this->nombre);
	 		$sql = "INSERT INTO contiene VALUES('$id', '$integrante')";
	 		$toRet = mysql_query($sql);
	 	}
	 	
	 	return $toRet;
	 }

//Devuelve un array con los objetos grupo creados por el usuario que se pasa por parámetro
	 function listarGrupos($emailTarget){
	 	Evento::conectarBD();
	 	$sql = "SELECT id_evento, idSesion, email, descripcion, nombre FROM evento WHERE email = '$emailTarget'";
	 	$resultado = mysql_query($sql);
	 	$toRet = array();
	 	while($row = mysql_fetch_array($resultado)){
	 		array_push($toRet, new Evento($row["id_evento"], $row["descripcion"], $row["idSesion"], $emailTarget, $row["nombre"]));
	 	}
	 	return $toRet;
	 }

	 function getIdByName($name){
	 	Evento::conectarBD();
	 	$sql = "SELECT id_evento FROM evento WHERE nombre = '$name'";
	 	$resultado = mysql_fetch_array(mysql_query($sql));
	 	return $resultado["id_evento"];
	 }

// 	function modificarEvento($evento, $eventoNuevo)
// 	{
// 		Evento::conectarBD();

// 		$consulta=("SELECT FROM evento WHERE id_evento = $evento->idEvento ORDER BY ASC");//primero hacemos la consulta del evento a modificar

// 		$result= mysql_query($consulta);

// 		//$numeroCampos = mysql_num_rows($result);

// 		if ($result == 0){

// 			return false;
// 		}

// 		 $result = result_to_array($result); //metemos la consulta en un array

// 		 if ($consulta == ""){

// 		 	echo '<div align="center">
// 		 	<h2>No existe el evento</h2>
// 		 </div>';

// 		}else{

// 			$idEvento=$result[0];
// 			$idPelicula=$result[1];
// 			$idSesion=$result[2];
// 			$mail=$result[3];
// 			$descripcion=$result[4];
// 			$nombre = $result[5];



// 			if($idEvento == ""){

// 				$actualizado=mysql_query("UPDATE `evento` SET `id_evento`=eventoNuevo->getIdEvento() WHERE `id_evento` = idEvento");
// 			}

// 			if($idPelicula == "" or $idSesion == ""){

// 				$actualizado=mysql_query("UPDATE `evento` SET `idPelicula`=eventoNuevo->getIdPelicula(), `idSesion`=eventoNuevo->getIdSesion() WHERE `id_evento` = $idEvento");
// 			}


// 			if($mail == ""){

// 				$actualizado=mysql_query("UPDATE `evento` SET `email`=eventoNuevo->getMail() WHERE `id_evento` = idEvento");
// 			}

// 			if($descripcion == ""){

// 				$actualizado=mysql_query("UPDATE `evento` SET `descripcion`=eventoNuevo->getDescripcion() WHERE `id_evento` = idEvento");
// 			}

// 			if($mail == ""){

// 				$actualizado=mysql_query("UPDATE `evento` SET `nombre`=eventoNuevo->getNombre() WHERE `id_evento` = idEvento");
// 			}

// 		}

// 	}

// 	function eliminarEvento($evento)
// 	{

// 		$eliminar = mysql_query("DELETE FROM `evento` WHERE `id_evento` = evento->getIdEvento()");

// 		if ($consulta == ""){

// 			echo '<div align="center">
// 			<h2>El evento no existe</h2>
// 		</div>';

// 	}else{

// 		echo '<div align="center">
// 		<h2>El evento se ha eliminado con éxito</h2>
// 	</div>';

// }

// }

// function consultarEvento($evento)
// {

// 	$consultar = mysql_query("SELECT * FROM `evento` WHERE `id_evento` = evento->getIdEvento()");

// 	if ($consulta == ""){

// 		echo '<div align="center">
// 		<h2>El evento no existe</h2>
// 	</div>';

// }else{

// 	$numeroCampos = mysql_num_rows($consultar);

// 	if ($consultar == 0){

// 		return false;
// 	}

// 		 $consultar = result_to_array($consultar); //metemos la consulta en un array

// 		 foreach ($consultar as $valor) {

// 		 	echo "$valor";
// 		 }

// 		}
// 	}


	}
