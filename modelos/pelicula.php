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
			echo "falla" ;

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
/*
		mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar'.mysql_error());
		mysql_select_db("CinesLy") or die ('No se pudo conectar a la base de datos');
		*/
		Pelicula::conectarBD();


		$sql="INSERT INTO pelicula (idPelicula, titulo, director, distribuidora, duracion, sinopsis, actores, anho, fecha_estreno, genero, pais, votos, valoracion, tipo, cont_valoracion)
		VALUES ('$pelicula->idPelicula', '$pelicula->titulo' , '$pelicula->director' , '$pelicula->distribuidora' , '$pelicula->duracion' ,
			'$pelicula->sinopsis' ,	'$pelicula->actores' , '$pelicula->anho' , '$pelicula->fechaEstreno' , '$pelicula->genero' ,
			'$pelicula->pais' , '$pelicula->votos' , '$pelicula->valoracion' , '$pelicula->tipo' , '$pelicula->contValoracion')";


		$resultado=Pelicula::consultaBD($sql);	
		if($resultado){
			echo "pelicula registrada";
		}	 
	}

function eliminarPelicula($idPelicula){
	Pelicula::conectarBD();
	$sql="DELETE FROM pelicula WHERE idPelicula ='".$idPelicula."'";
	Pelicula::consultaBD($sql);


}

function modificarPelicula($idPelicula,$pelicula){

	mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar'.mysql_error());
	mysql_select_db("CinesLy") or die ('No se pudo conectar a la base de datos');


	$sql="SELECT * FROM pelicula WHERE idPelicula='".$idPelicula."'";

	$resultado=Pelicula::consultaBD($sql);

	$original=mysql_fetch_array($resultado);

	$peli1=new Pelicula($original[idPelicula],$original[titulo],$original[director],$original[distribuidora],
		$original[duracion],$original[sinopsis],$original[actores],$original[anho],$original[fechaEstreno],
		$original[genero],$original[pais],$original[votos],$original[valoracion],$original[tipo],$original[contValoracion]);


	if($pelicula->titulo!=""){

		$peli1->titulo=$pelicula->titulo;
	}
	if($pelicula->director!=""){
		$peli1->director=$pelicula->director;
	}
	if($pelicula->distribuidora!=""){
		$peli1->distribuidora=$pelicula->distribuidora;
	}
	if($pelicula->duracion!=""){
		$peli1->duracion=$pelicula->duracion;
	}
	if($pelicula->sinopsis!=""){
		$peli1->sinopsis=$pelicula->sinopsis;
	}
	if($pelicula->actores!=""){
		$peli1->actores=$pelicula->actores;
	}
	if($pelicula->anho!=""){
		$peli1->anho=$pelicula->anho;
	}
	if($pelicula->fechaEstreno!=""){
		$peli1->fechaEstreno=$pelicula->fechaEstreno;
	}
	if($pelicula->genero!=""){
		$peli1->genero=$pelicula->genero;
	}
	if($pelicula->pais!=""){
		$peli1->pais=$pelicula->pais;
	}
	if($pelicula->votos!=""){
		$peli1->votos=$pelicula->votos;
	}
	if($pelicula->valoracion!=""){
		$peli1->valoracion=$pelicula->valoracion;
	}
	if($pelicula->tipo!=""){
		$peli1->tipo=$pelicula->tipo;
	}
	if($pelicula->contValoracion!=""){
		$peli1->contValoracion=$pelicula->contValoracion;
	}
		/*for($i=1;$i<15; $i++){
			if($pelicula[$i]==""){
				echo "no se cambia el campo".$i;
			}else{
				$peli1[$i]=$pelicula[$i];
			}
		}*/


		$sql2="UPDATE pelicula SET  titulo ='$peli1->titulo', director = '$peli1->director', distribuidora ='$peli1->distribuidora', 
		duracion = '$peli1->duracion', sinopsis ='$peli1->sinopsis' , actores = '$peli1->actores', anho = $peli1->anho,
		fecha_estreno =$peli1->fechaEstreno , genero ='$peli1->genero' , pais ='$peli1->pais' , votos =$peli1->votos ,
		valoracion = $peli1->valoracion, tipo = '$peli1->tipo' , cont_valoracion = $peli1->contValoracion
		WHERE idPelicula = '$peli1->idPelicula'";
		
		Pelicula::consultaBD($sql2);
	}

	function mostrarPeliculas(){
		Pelicula::conectarBD();
		
		 $sql = "SELECT * FROM pelicula";
        $result = Pelicula::consultaBD($sql);

        while ($tuplas = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $toRet[$tuplas["idPelicula"]] = $tuplas;
        }

        return $toRet;


	}

	function mostrarPelicula($idPelicula){
		Pelicula::conectarBD();
		$sql="SELECT * FROM pelicula WHERE idPelicula= '".$idPelicula."'";
		$resultado=Pelicula::consultaBD($sql);
		$toRet=mysql_fetch_array($resultado, MYSQL_ASSOC);
		return $toRet;
	}

	function consultaBD($consulta){
		$resultado= mysql_query($consulta) or die ('MySql Error en consultaBD'.mysql_error());
		
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
	function getfechaEstreno(){
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
	function getcontValoracion(){
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