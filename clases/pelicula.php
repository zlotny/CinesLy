<?php
class Pelicula{
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

	function __construct($titulo,$director,$distribuidora,$duracion,$sinopsis,$actores,$anho,$fechaEstreno,$genero,$pais,,$votos,$valoracion,$tipo,$contValoracion){
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
		mysql_connect("localhost","Usuario","Contraseña") or die ('No se pudo conectar'.mysql_error());
		mysql_select_db("CinesLy") or die ('No se pudo conectar a la base de datos');
	}


	function consulta($consulta){
		$resultado= mysql_query($consulta);
		if($resultado){
			echo 'MySql Error' .mysql_error();
			exit;
		}
		return $resultado;
	}

	/* getters */

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

	function getObjetoPelicula($titulo,$director){
		$this->conectarBD();
		$sql="SELECT * FROM pelicula WHERE titulo= '".$titulo."' AND director = '".$director."'";
		$resultado=$this->consulta($sql);
		$row=mysql_num_rows($resultado);

		if($row=0){
			echo "Pelicula no encontrada";
		}else{
			$row=mysql_fetch_array($resultado);
			$pelicula=new Pelicula($row["titulo"],$row["director"],$row["distribuidora"],$row["duracion"],$row["sinopsis"],$row["actores"],$row["anho"],$row["fechaEstreno"],$row["genero"],$row["pais"],$row["votos"],$row["valoracion"],$row["tipo"],$row["contValoracion"]);
			return $pelicula;
		}
	}

	
	/* setters */
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