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
			
			$peli = new Pelicula($idPelicula,$titulo,$director,$distribuidora,$duracion,$sinopsis,$actores,$anho,$fechaEstreno,$genero,$pais,$votos,$valoracion,$tipo,$contValoracion);
	
			Pelicula::modificarPelicula($peli->idPelicula,$peli);


		}else{
			if($accion=="eliminar"){
				$idPelicula = $_REQUEST['idPelicula'];
				Pelicula::eliminarPelicula($idPelicula);
			}else{
				if($accion=="mostrarPeliculas"){
					$array=Pelicula::mostrarPeliculas();

					 foreach ($array as $peliMostrar){
					 	/*echo $peliMostrar['idPelicula']."____".$peliMostrar['titulo']."____".$peliMostrar['director']."____".
					 	$peliMostrar['distribuidora']."____".$peliMostrar['duracion']."____".$peliMostrar['sinopsis']."____".
					 	$peliMostrar['actores']."____".$peliMostrar['anho']."____".$peliMostrar['fechaEstreno']."____".
					 	$peliMostrar['genero']."____".$peliMostrar['pais']."____".$peliMostrar['votos']."____".$peliMostrar['valoracion']."____"
					 	.$peliMostrar['tipo']."____".$peliMostrar['contValoracion']."<br>";*/
					 	?> 
					 		<meta charset="utf-8">
							<title>CinesLy</title>
							<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
							<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css">
							<link rel="stylesheet" type="text/css" href="../style/style.css">

				            <div class="well">
				            	
				            		<div class="col-md-1">
				            			<?php echo $peliMostrar['titulo']; ?>
				            		</div>
				            		<div class="col-md-1">
				            			<?php echo $peliMostrar['director']; ?>
				            		</div>
				            		<div class="col-md-1">
				            			<p><?php echo $peliMostrar['distribuidora']; ?></p>
				            			
				            		</div>
				            		<div class="col-md-1"><?php echo $peliMostrar['duracion']; ?></div>
				            		<div class="col-md-1"><?php echo $peliMostrar['sinopsis']; ?></div>
				            		<div class="col-md-1"><?php echo $peliMostrar['actores']; ?></div>
				            		<div class="col-md-1"><?php echo $peliMostrar['anho']; ?></div>
				            		<div class="col-md-1"><?php echo $peliMostrar['fechaEstreno']; ?></div>
				            		<div class="col-md-1"><?php echo $peliMostrar['genero']; ?></div>
				            		<div class="col-md-1"><?php echo $peliMostrar['pais']; ?></div>
				            		<div class="col-md-1"><?php echo $peliMostrar['votos']; ?></div>
				            		<div class="col-md-1"><?php echo $peliMostrar['contValoracion']; ?></div>
				            	
				            </div>

					 		<?php
					 }

					
				}else{
					if($accion=="mostrarPelicula"){
						$idPelicula = $_REQUEST['idPelicula']; 
						$array=Pelicula::mostrarPelicula($idPelicula);
							?> 
					 		<meta charset="utf-8">
							<title>CinesLy</title>
							<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
							<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css">
							<link rel="stylesheet" type="text/css" href="../style/style.css">

				            <div class="well">
				            	
				            		<div class="col-md-1">
				            			<?php echo $array['titulo']; ?>
				            		</div>
				            		<div class="col-md-1">
				            			<?php echo $array['director']; ?>
				            		</div>
				            		<div class="col-md-1">
				            			<p><?php echo $array['distribuidora']; ?></p>
				            			
				            		</div>
				            		<div class="col-md-1"><?php echo $array['duracion']; ?></div>
				            		<div class="col-md-1"><?php echo $array['sinopsis']; ?></div>
				            		<div class="col-md-1"><?php echo $array['actores']; ?></div>
				            		<div class="col-md-1"><?php echo $array['anho']; ?></div>
				            		<div class="col-md-1"><?php echo $array['fechaEstreno']; ?></div>
				            		<div class="col-md-1"><?php echo $array['genero']; ?></div>
				            		<div class="col-md-1"><?php echo $array['pais']; ?></div>
				            		<div class="col-md-1"><?php echo $array['votos']; ?></div>
				            		<div class="col-md-1"><?php echo $array['contValoracion']; ?></div>
				            	
				            </div>

					 		<?php
					}else{
						if($accion=="valorarPelicula"){
							$idPelicula = $_REQUEST['idPelicula']; 
							$valoracion = $_REQUEST['valoracion']; 
							 
							Pelicula::valorarPelicula( $idPelicula, $valoracion );
						}
					}
				}
			}
		}
	}
?> 