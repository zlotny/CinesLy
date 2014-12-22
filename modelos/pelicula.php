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
	var $foto;

	function __construct($idPelicula,$titulo,$director,$distribuidora,$duracion,$sinopsis,$actores,$anho,$fechaEstreno,$genero,$pais,$votos,$valoracion,$tipo,$contValoracion,$foto){

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
		$this->foto=$foto;
	}
	function conectarBD(){
		mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar'.mysql_error());
		mysql_select_db("CinesLy") or die ('No se pudo conectar a la base de datos');
	}


	function recomendarPelicula($idPelicula,$listaAmigos)
	{
		Pelicula::conectarBD();
		
		
		

	}

	

	//No retorna nada. Insera un comentario en la base de datos
	function comentarPelicula($idPelicula,$email,$comentario){
		Pelicula::conectarBD();
		$sql="INSERT INTO comenta VALUES ('$idPelicula','$email','$comentario')";
		echo $sql;
		mysql_query($sql);
		
	}
	
	//Retorna un array de comentarios de una película de la base de datos
	function getComentariosPelicula($idPelicula){
		Pelicula::conectarBD();
		$sql="SELECT email,comentario FROM comenta WHERE idPelicula='".$idPelicula."'";
		$resultado = mysql_query($sql);
		$toRet = array();
		$toRet['usuario'] = array();
		$toRet['comentario'] = array();
		
		while($row = mysql_fetch_array($resultado)){
			array_push($toRet['usuario'], $row['email']);
			array_push($toRet['comentario'], $row['comentario']);
		}
		return $toRet;

	}

	function valorarPelicula($idPelicula,$valoracion){
		Pelicula::conectarBD();
		$sql="SELECT * FROM pelicula WHERE idPelicula='".$idPelicula."'";
		$resultado=Pelicula::consultaBD($sql);
		
		$original=mysql_fetch_array($resultado);
		echo "string";
		$peli1=new Pelicula($original['idPelicula'],$original['titulo'],$original['director'],$original['distribuidora'],
			$original['duracion'],$original['sinopsis'],$original['actores'],$original['anho'],$original['fecha_estreno'],
			$original['genero'],$original['pais'],$original['votos'],$original['valoracion'],$original['tipo'],$original['cont_valoracion'],$original['foto']);
		echo "<br>";
		$val=$valoracion+$peli1->valoracion;
		echo $peli1->contValoracion;
		echo "<br>";
		$cont_val=$peli1->contValoracion+1;
		echo $cont_val;
		$peli1->valoracion=$val;
		$peli1->contValoracion=$cont_val;
		Pelicula::modificarPelicula($idPelicula,$peli1);
	}

	function registrarPelicula($pelicula)
	{
/*
		mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar'.mysql_error());
		mysql_select_db("CinesLy") or die ('No se pudo conectar a la base de datos');
		*/
		Pelicula::conectarBD();


		$sql="INSERT INTO pelicula (idPelicula, titulo, director, distribuidora, duracion, sinopsis, actores, anho, fecha_estreno, genero, pais, votos, valoracion, tipo, cont_valoracion, foto)
		VALUES ('$pelicula->idPelicula', '$pelicula->titulo' , '$pelicula->director' , '$pelicula->distribuidora' , '$pelicula->duracion' ,
			'$pelicula->sinopsis' ,	'$pelicula->actores' , '$pelicula->anho' , '$pelicula->fechaEstreno' , '$pelicula->genero' ,
			'$pelicula->pais' , '$pelicula->votos' , '$pelicula->valoracion' , '$pelicula->tipo' , '$pelicula->contValoracion', '$pelicula->foto')";


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

function modificarPelicula($idPelicula,$pelicula)
{

	mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar'.mysql_error());
	mysql_select_db("CinesLy") or die ('No se pudo conectar a la base de datos');


	$sql="SELECT * FROM pelicula WHERE idPelicula='".$idPelicula."'";

	$resultado=Pelicula::consultaBD($sql);

	$original=mysql_fetch_array($resultado);

	$peli1=new Pelicula($original['idPelicula'],$original['titulo'],$original['director'],$original['distribuidora'],
		$original['duracion'],$original['sinopsis'],$original['actores'],$original['anho'],$original['fecha_estreno'],
		$original['genero'],$original['pais'],$original['votos'],$original['valoracion'],$original['tipo'],$original['cont_valoracion'],$original['foto']);


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
	if($pelicula->foto!=""){
		$peli1->foto=$pelicula->foto;
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
		valoracion = $peli1->valoracion, tipo = '$peli1->tipo' , cont_valoracion = $peli1->contValoracion, foto = $peli1->foto
		WHERE idPelicula = '$peli1->idPelicula'";
		echo $sql2;
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
	function getFoto(){
		return $foto;
	}

	function getObjetoPelicula($idPelicula){
		Pelicula::conectarBD();
		$sql="SELECT * FROM pelicula WHERE idPelicula= '".$idPelicula."'";
		$resultado=Pelicula::consultaBD($sql);
		$row=mysql_num_rows($resultado);
		

		if($row=0){
			echo "Pelicula no encontrada";
		}else{
			$row=mysql_fetch_array($resultado);
			$pelicula=new Pelicula($row["idPelicula"],$row["titulo"],$row["director"],$row["distribuidora"],$row["duracion"],$row["sinopsis"],$row["actores"],$row["anho"],$row["fechaEstreno"],$row["genero"],$row["pais"],$row["votos"],$row["valoracion"],$row["tipo"],$row["contValoracion"],$row["foto"]);
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
		$this->director = $director;
	}
	function setDistribuidora($distribuidora){
		$this->distribuidora = $distribuidora;
	}
	function setDuracion($duracion){
		$this->duracion = $duracion;
	}
	function setSinopsis($sinopsis){
		$this->sinopsis = $sinopsis;
	}
	function setActores($actores){
		$this->actores = $actores;
	}
	function setAnho($anho){
		$this->anho = $anho;
	}
	function setFechaEstreno($fechaEstreno){
		$this->fechaEstreno = $fechaEstreno;
	}
	function setGenero($genero){
		$this->genero = $genero;
	}
	function setPais($pais){
		$this->pais = $pais;
	}
	function setVotos($votos){
		$this->votos = $votos;
	}
	function setValoracion($valoracion){
		$this->valoracion = $valoracion;
	}
	function setTipo($tipo){
		$this->tipo = $tipo;
	}
	function setContValoracion($contValoracion){
		$this->contValoracion = $contValoracion;
	}
	function setFoto($foto){
		$this->foto = $foto;
	}


	function peliculasFiltradas($titulo, $tipo, $arrayGeneros){
		Pelicula::conectarBD();
		if($tipo == ""){
			$tipo = "cartelera' or tipo = 'especial' or tipo = 'proximamente";
		}

		$sql="select * from pelicula where titulo like '%".$titulo."%' and (tipo = '".$tipo."') and genero like '";
		foreach ($arrayGeneros as $singleGenero){
			if($sql=="select * from pelicula where titulo like '%".$titulo."%' and (tipo = '".$tipo."') and genero like '"){
				$sql=$sql."%".$singleGenero."%' ";
				
			}

			else{
				$sql=$sql." and genero like '%".$singleGenero."%' ";
			}
			
		}
		if($sql=="select * from pelicula where titulo like '%".$titulo."%' and (tipo = '".$tipo."') and genero like '"){
			$sql="select * from pelicula where titulo like '%".$titulo."%' and (tipo = '".$tipo."')";
		}
		$resultado=mysql_query($sql);
		echo $sql;
		while($fila=mysql_fetch_array($resultado)){
			$toRet[$fila["idPelicula"]]=$fila;
		}
		
		return $toRet;

	}

	function getPeliculasCartelera(){
		Pelicula::conectarBD();
		$sql="select titulo from pelicula where tipo='cartelera'";
		$resultado = mysql_query($sql);
		$toRet = array();
		while($row = mysql_fetch_array($resultado)){
			array_push($toRet, $row['titulo']);
		}
		return $toRet;
	}
	

}
?>