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
	

	$peli = new pelicula($idPelicula,$titulo,$director,$distribuidora,$duracion,$sinopsis,$actores,$anho,
		$fechaEstreno,$genero,$pais,$votos,$valoracion,$tipo,$contValoracion);
	
	pelicula::registrarPelicula($peli);
	
} else { 
		if($accion=="modificar") { 

			$idPelicula = $_REQUEST['idPelicula']; 
			if(isset($_REQUEST['titulo'])){
				$titulo = $_REQUEST['titulo']; 
			}else{
				$titulo="";
			}
			if(isset($_REQUEST['director'])){
				$director = $_REQUEST['director'];
			}else{
				$director="";
			}
			if(isset($_REQUEST['distribuidora'])){
				$distribuidora = $_REQUEST['distribuidora'];
			}else{
				$distribuidora="";
			}
			if(isset($_REQUEST['duracion'])){
				$duracion = $_REQUEST['duracion'];
			}else{
				$duracion="";
			}
			if(isset($_REQUEST['sinopsis'])){
				$sinopsis = $_REQUEST['sinopsis'];
			}else{
				$sinopsis="";
			}
			if(isset($_REQUEST['actores'])){
				$actores = $_REQUEST['actores'];
			}else{
				$actores="";
			}
			if(isset($_REQUEST['anho'])){
				$anho = $_REQUEST['anho'];
			}else{
				$anho="";
			}
			if(isset($_REQUEST['fechaEstreno'])){
				$fechaEstreno = $_REQUEST['fechaEstreno'];
			}else{
				$fechaEstreno="";
			}
			if(isset($_REQUEST['genero'])){
				$genero = $_REQUEST['genero'];
			}else{
				$genero="";
			}
			if(isset($_REQUEST['pais'])){
				$pais = $_REQUEST['pais'];
			}else{
				$pais="";
			}
			if(isset($_REQUEST['votos'])){
				$votos = $_REQUEST['votos'];
			}else{
				$votos="";
			}
			if(isset($_REQUEST['valoracion'])){
				$valoracion = $_REQUEST['valoracion'];
			}else{
				$valoracion="";
			}
			if(isset($_REQUEST['tipo'])){
				$tipo=$_REQUEST['tipo'];
			}else{
				$tipo="";
			}
			if(isset($_REQUEST['contValoracion'])){
				$contValoracion = $_REQUEST['contValoracion'];
			}else{
				$contValoracion="";
			}
			
			echo "request hecho <br>";
			$peli = new Pelicula($idPelicula,$titulo,$director,$distribuidora,$duracion,$sinopsis,$actores,$anho,$fechaEstreno,$genero,$pais,$votos,$valoracion,$tipo,$contValoracion);
	echo "peli creada";
			Pelicula::modificarPelicula($peli->idPelicula,$peli);


		}
	}
?> 