<?php
class Pelicula{

	var $idPelicula;
	var $titulo;
	var $director;
	var $distribuidora;
	var $duracion;
	var $sinopsis;
	var $actores;
	var $anho;
	var $fechaEstreno;
	var $genero;
	var $pais;
	var $votos;
	var $valoracion;
	var $tipo;
	var $contValoracion;

	function __construct($idPelicula,$titulo,$director,$distribuidora,$duracion,$sinopsis,$actores,$anho,$fechaEstreno,$genero,$pais,$votos,$valoracion,$tipo,$contValoracion){

		$this->idPelicula=$idPelicula;
		$this->titulo=$titulo;
		$this->director=$director;
		$this->distribuidora=$distribuidora;
		$this->duracion=$duracion;
		$this->sinopsis=$sinopsis;
		$this->actores=$actores;
		$this->anho=$anho;
		$this->fechaEstreno=$fechaEstreno;
		$this->genero=$genero;
		$this->pais=$pais;
		$this->votos=$votos;
		$this->valoracion=$valoracion;
		$this->tipo=$tipo;
		$this->contValoracion=$contValoracion;

	}
	function conectarBD(){
		mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar'.mysql_error());
		mysql_select_db("CinesLy") or die ('No se pudo conectar a la base de datos');
	}


	function recomendarPelicula($idPelicula,$listaAmigos)
	{
		Pelicula::conectarBD();
		$this->conectarBD();
		
		

	}

	function consultarPelicula($idPelicula){

		$this->conectarBD();
		$consulta="SELECT * FROM pelicula WHERE ".$idPelicula."= idPelicula";
		$resultado=$consultaBD($consulta);
		if($resultado==0){
			echo falla ;

		}else{
			$row=mysql_num_rows($resultado);
			if($row==1){
				$pelicula=mysql_fetch_array($resultado);
				return $pelicula;
			}else{
				return 0;
			}
		}
		return -1;
		
	}

	function comentarPelicula($idPelicula,$comentario){

	}

	function valorarPelicula($idPelicula,$valoracion){

	}

	function registrarPelicula($pelicula)
	{
		$this->conectarBD();
		$sql="INSERT INTO pelicula (idPelicula, titulo, director, distribuidora, duracion, sinopsis, actores, año, fecha_estreno, genero, pais, votos, valoracion, tipo, cont_valoracion)
		 VALUES ('".$pelicula.idPelicula."','".$pelicula.titulo."','".$pelicula.director."','".$pelicula.distribuidora."','".$pelicula.duracion."',
		 	'".$pelicula.sinopsis."','".$pelicula.actores."',".$pelicula.anho.",".$pelicula.fechaEstreno.",'".$pelicula.genero."','".$pelicula.pais."',
		 	".$pelicula.votos.",".$pelicula.valoracion.",'".$pelicula.tipo."',".$pelicula.contValoracion.")";
		$resultado=$this->consultaBD($sql);	
		if($resultado){
			echo "pelicula registrada";
		}	 
	}

	function eliminarPelicula($idPelicula){
		$this->conectarBD();
		$sql="DELETE FROM pelicula WHERE idPelicula ='".$idPelicula."'";
		$this->consultaBD($sql);


	}

	function modificarPelicula($idPelicula,$pelicula){
		$this->conectarBD();
		$sql="SELECT * FROM pelicula WHERE idPelicula='".$idPelicula"'";
		$resultado=$this->consultaBD($sql);
		$original=mysql_fetch_array($resultado);
		$peli1=new Pelicula($original["idPelicula"],$original["titulo"],$original["director"],$original["distribuidora"],
			$original["duracion"],$original["sinopsis"],$original["actores"],$original["anho"],$original["fechaEstreno"],
			$original["genero"],$original["pais"],$original["votos"],$original["valoracion"],$original["tipo"],$original["contValoracion"]);

		for($i=1;$i<15; $i++){
			if($pelicula[$i]=""){

			}else{
				$peli1[$i]=$pelicula[$i];
			}
		}
		echo "pelicula creada";
		$sql2="INSERT INTO pelicula ( titulo, director, distribuidora, duracion, sinopsis, actores, año, fecha_estreno, genero, pais, votos, valoracion, tipo, cont_valoracion)
		 VALUES ('".$peli1.titulo."','".$peli1.director."','".$peli1.distribuidora."','".$peli1.duracion."',
		 	'".$peli1.sinopsis."','".$peli1.actores."',".$peli1.anho.",".$peli1.fechaEstreno.",'".$peli1.genero."','".$peli1.pais."',
		 	".$peli1.votos.",".$peli1.valoracion.",'".$peli1.tipo."',".$peli1.contValoracion.")";
	}

	function mostrarPeliculas(){
		$this->conectarBD();
		$sql="SELECT * FROM pelicula";
		$resultado=$consultaBD($sql);
		$i=0;
		while (  $row=mysql_fetch_row($resultado) {
			$peliculas[$i]=$row;
		}
		return $peliculas;
	}

	function mostrarPelicula($idPelicula){
		$this->conectarBD();
		$sql="SELECT * FROM pelicula WHERE idPelicula='".$idPelicula"'";
		$resultado=$consultaBD($sql);
		$peli=mysql_fetch_array($resultado);
		$peli1=new Pelicula($peli["idPelicula"],$peli["titulo"],$peli["director"],$peli["distribuidora"],
			$peli["duracion"],$peli["sinopsis"],$peli["actores"],$peli["anho"],$peli["fechaEstreno"],
			$peli["genero"],$peli["pais"],$peli["votos"],$peli["valoracion"],$peli["tipo"],$peli["contValoracion"]);
		return $peli1;
	}

	function consultaBD($consulta){

		$resultado= mysql_query($consulta);
		if(!$resultado){
			echo 'MySql Error en consultaBD' .mysql_error();
			return 0;
		}
		return $resultado;
	}

	/* getters */
	function getIdPelicula(){
		return $idPelicula;
	}
	function getTitulo(){
		return $titulo;
	}
	function getDirector(){
		return $director;
	}
	function getDistribuidora(){
		return $distribuidora;
	}
	function getDuracion(){
		return $duracion;
	}
	function getSinopsis(){
		return $sinopsis;
	}
	function getActores(){
		return $actores;
	}
	function getAnho(){
		return $anho;
	}
	function getFechaEstreno(){
		return $fechaEstreno;
	}
	function getGenero(){
		return $genero;
	}
	function getPais(){
		return $pais;
	}
	function getVotos(){
		return $votos;
	}
	function getValoracion(){
		return $valoracion;
	}
	function getTipo(){
		return $tipo;
	}
	function getContValoracion(){
		return $contValoracion;
	}

	function getObjetoPelicula($idPelicula){
		$this->conectarBD();
		$sql="SELECT * FROM pelicula WHERE idPelicula= '".$idPelicula."'";
		$resultado=$this->consultaBD($sql);
		$row=mysql_num_rows($resultado);

		if($row=0){
			echo "Pelicula no encontrada";
		}else{
			$row=mysql_fetch_array($resultado);
			$pelicula=new Pelicula($row["idPelicula"],$row["titulo"],$row["director"],$row["distribuidora"],$row["duracion"],$row["sinopsis"],$row["actores"],$row["anho"],$row["fechaEstreno"],$row["genero"],$row["pais"],$row["votos"],$row["valoracion"],$row["tipo"],$row["contValoracion"]);
			return $pelicula;
		}
	}

	
	/* setters */
	function setIdPelicula( $idPelicula ){
		$this->idPelicula=$idPelicula;
	}
	function setTitulo( $titulo ){
		$this->titulo=$titulo;
	}
	function setDirector($director){
		$this->director;
	}
	function setDistribuidora($distribuidora){
		$this->distribuidora;
	}
	function setDuracion($duracion){
		$this->duracion;
	}
	function setSinopsis($sinopsis){
		$this->sinopsis;
	}
	function setActores($actores){
		$this->actores;
	}
	function setAnho($anho){
		$this->anho;
	}
	function setFechaEstreno($fechaEstreno){
		$this->fechaEstreno;
	}
	function setGenero($genero){
		$this->genero;
	}
	function setPais($pais){
		$this->pais;
	}
	function setVotos($votos){
		$this->votos;
	}
	function setValoracion($valoracion){
		$this->valoracion;
	}
	function setTipo($tipo){
		$this->tipo;
	}
	function setContValoracion($contValoracion){
		$this->contValoracion;
	}



	

}
?>