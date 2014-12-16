<?php

include "../modelos/pelicula.php";

$accion = $_REQUEST['accion'];

if($accion == "nueva"){
	
	$idPelicula = $_REQUEST['idPelicula']; 
	$titulo = $_REQUEST['titulo']; 
	$director = $_REQUEST['director'];
	$distribuidora = $_REQUEST['distribuidora'];
	$duracion = $_REQUEST['duracion'];
	$sinopsis = $_REQUEST['sinopsis'];
	$actores = $_REQUEST['actores'];
	$anho = $_REQUEST['anho'];
	$fechaEstreno = $_REQUEST['fechaEstreno'];
	$genero = $_REQUEST['genero'];
	$pais = $_REQUEST['pais'];
	$votos = $_REQUEST['votos'];
	$valoracion = $_REQUEST['valoracion'];
	$tipo=$_REQUEST['tipo'];
	$contValoracion = $_REQUEST['contValoracion'];
	

	$peli = new pelicula($idPelicula,$titulo,$director,$distribuidora,$duracion,$sinopsis,$actores,$anho,$fechaEstreno,$genero,$pais,$votos,$valoracion,$tipo,$contValoracion);
	
	pelicula::registrarPelicula($peli);
	echo "pelicula insertada-----------------";
} else { 
		if($accion=="modificar") { 

			$nombreUsuario = $_REQUEST['nombreUsuario'];
			$email = $_REQUEST['email'];
			$pass = $_REQUEST['pass']; 
			$usuario = new Usuario($nombreUsuario,$email,$pass,0,"","","","","","","","");
			$usuario->registrarUsuario();

		}
	}
?> 