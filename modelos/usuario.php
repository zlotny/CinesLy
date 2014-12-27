<?php
class Usuario{
	var $nombreUsuario;
	var $email;
	var $pass;
	var $tipoUsuario;
	var $foto;
	var $preferencia1;
	var $preferencia2;
	var $preferencia3;
	var $estado;
	var $ciudadActual;
	var $fechaNacimiento;
	var $eslogan;
	function __construct($nombreUsuario,$email,$pass,$tipoUsuario,$foto,$preferencia1,$preferencia2,$preferencia3,$estado,$ciudadActual,$fechaNacimiento,$eslogan){
		$this->nombreUsuario=$nombreUsuario;
		$this->email=$email;
		$this->pass=$pass;
		$this->tipoUsuario=$tipoUsuario;
		$this->foto=$foto;
		$this->preferencia1=$preferencia1;
		$this->preferencia2=$preferencia2;
		$this->preferencia3=$preferencia3;
		$this->estado=$estado;
		$this->ciudadActual=$ciudadActual;
		$this->fechaNacimiento=$fechaNacimiento;
		$this->eslogan=$eslogan;
	}
	function conectarBD(){
		mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar: '.mysql_error());
		mysql_select_db("CinesLy") or die ('No se pudo seleccionar la base de datos');
	}
	function consultaBD($consulta){
		$resultado = mysql_query($consulta);
		if(!$resultado){
			echo 'MySql Error: '.mysql_error();
			exit;
		}
		return $resultado;
	}
	function getObjetoUsuario($email){
		mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar: '.mysql_error());
		mysql_select_db("CinesLy") or die ('No se pudo seleccionar la base de datos');
		$sql="SELECT * FROM usuario WHERE email = '".$email."'";
		$resultado= mysql_query($sql);
		$row=mysql_num_rows($resultado);
		if($row==1){
			$row=mysql_fetch_array($resultado);
			return new Usuario($row['nombreUsuario'],$row['email'],$row['pass'],$row['tipoUsuario'],$row['foto'],$row['preferencia1'],$row['preferencia2'],$row['preferencia3'],$row['estado'],$row['ciudadActual'],$row['fechaNacimiento'],$row['eslogan']);
		}else{
			echo "El usuario no se encuentra registrado.";
		}
	}
	function loguearUsuario(){
		$this->conectarBD();
		$sql="SELECT * FROM usuario WHERE email = '".$this->email."' AND pass = '".$this->pass."'";
		$resultado=$this->consultaBD($sql);
		$row=mysql_num_rows($resultado);
		if($row==1){
			$row=mysql_fetch_array($resultado);
			session_start();
//$_SESSION['usuario'] = $this->getObjetoUsuario($row['email'],$row['pass']);
			$_SESSION['usuario'] = Usuario::getObjetoUsuario($this->email);
			if (!(isset($_SESSION['usuario']->nombreUsuario))) {
				echo "error";
			} else if($_SESSION['usuario']->tipoUsuario==0) {
//echo $_SESSION['usuario']->email;
				header("Location:../pantallaPrincipal.php");
			} else if($_SESSION['usuario']->tipoUsuario==1) {
				header("Location:../adminModificarUsuario.php");
			}
		} else {
			header("Location:../index.php?login=bad");
		}
	}
	function registrarUsuario(){
		$this->conectarBD();
		$sql="INSERT INTO usuario(nombreUsuario, email, pass, tipoUsuario) VALUES ('".$this->nombreUsuario."','".$this->email."','".$this->pass."',0)";
		$this->consultaBD($sql);
//header("Location:../index.php");
		$message = "El usuario ha sido registrado correctamente.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Location:../index.php");
	}
	
	function insertarUsuario($usuario){
		Usuario::conectarBD();
		$sql="INSERT INTO usuario (nombreUsuario, email, pass, foto, preferencia1, preferencia2, preferencia3, estado, ciudadActual, fechaNacimiento, tipoUsuario, eslogan)
		VALUES ('$usuario->nombreUsuario', '$usuario->email' , '$usuario->pass' , '$usuario->foto' , '$usuario->preferencia1' ,
			'$usuario->preferencia2' , '$usuario->preferencia3' , '$usuario->estado' , '$usuario->ciudadActual' , '$usuario->fechaNacimiento' ,
			'$usuario->tipoUsuario' , '$usuario->eslogan')";
Usuario::consultaBD($sql);
//header("Location:../index.php");
}
/*
function recuperarUsuario(){
mail("i.gd1989@hotmail.es","Desgraciao","Toma tu puta contraseña hijo de perra");
echo "correo enviado ".$this->email;
//header("Location:../index.php");
}
*/
function eliminarUsuario($email){
	Usuario::conectarBD();
	$sql="DELETE FROM usuario WHERE email = '".$email."'";
	Usuario::consultaBD($sql);
	
}
function bajaUsuario(){
	$this->conectarBD();
	$sql="DELETE FROM usuario WHERE email = '".$this->email."' AND pass = '".$this->pass."'";
	$this->consultaBD($sql);
	header("location:../index.php");
}
function actualizarUsuario($email) {
	$this->conectarBD();
	$sql="UPDATE usuario SET nombreUsuario='".$this->nombreUsuario."' , email='".$this->email."' , pass='".$this->pass."' WHERE email='".$email."'";
	$this->consultaBD($sql);
	header("Location:index.php");
}
function modificarUsuario($email,$usuario) {
	mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar: '.mysql_error());
	mysql_select_db("CinesLy") or die ('No se pudo seleccionar la base de datos');
	$sql1="SELECT * FROM usuario WHERE email='".$email."'";
	$resultado=mysql_query($sql1);
	$original=mysql_fetch_array($resultado);
// ($nombreUsuario,$email,$pass,$tipoUsuario,$foto,$preferencia1,$preferencia2,$preferencia3,$estado,$ciudadActual,$fechaNacimiento,$eslogan)
	$usuarioAntiguo = new Usuario($original['nombreUsuario'],$original['email'],$original['pass'],$original['tipoUsuario'],$original['foto'],
		$original['preferencia1'],$original['preferencia2'],$original['preferencia3'],$original['estado'],$original['ciudadActual'],
		$original['fechaNacimiento'],$original['eslogan']);
	if($usuario->nombreUsuario!=""){
		$usuarioAntiguo->nombreUsuario=$usuario->nombreUsuario;
	}elseif($usuario->nombreUsuario=="" && $usuarioAntiguo->nombreUsuario==""){
		//$usuarioAntiguo->nombreUsuario="campo Vacio";
	}
	if($usuario->email!=""){
		$usuarioAntiguo->email=$usuario->email;
	}
	if($usuario->pass!=""){
		$usuarioAntiguo->pass=$usuario->pass;
	}
	if($usuario->tipoUsuario!=""){
		$usuarioAntiguo->tipoUsuario=$usuario->tipoUsuario;
	}
	if($usuario->foto!=""){
		$usuarioAntiguo->foto=$usuario->foto;
	}elseif($usuario->foto=="" && $usuarioAntiguo->foto==""){
		$usuarioAntiguo->foto="img/default_user.png";
	}
	if($usuario->preferencia1!=""){
		$usuarioAntiguo->preferencia1=$usuario->preferencia1;
	}elseif($usuario->preferencia1=="" && $usuarioAntiguo->preferencia1==""){
		//$usuarioAntiguo->preferencia1="campo Vacio";
	}
	if($usuario->preferencia2!=""){
		$usuarioAntiguo->preferencia2=$usuario->preferencia2;
	}elseif($usuario->preferencia2=="" && $usuarioAntiguo->preferencia2==""){
		//$usuarioAntiguo->preferencia2="campo Vacio";
	}
	if($usuario->preferencia3!=""){
		$usuarioAntiguo->preferencia3=$usuario->preferencia3;
	}elseif($usuario->preferencia3=="" && $usuarioAntiguo->preferencia3==""){
		//$usuarioAntiguo->preferencia3="campo Vacio";
	}
	if($usuario->estado!=""){
		$usuarioAntiguo->estado=$usuario->estado;
	}elseif($usuario->estado=="" && $usuarioAntiguo->estado==""){
		//$usuarioAntiguo->estado="campo Vacio";
	}
	if($usuario->ciudadActual!=""){
		$usuarioAntiguo->ciudadActual=$usuario->ciudadActual;
	}elseif($usuario->ciudadActual=="" && $usuarioAntiguo->ciudadActual==""){
		//$usuarioAntiguo->ciudadActual="campo Vacio";
	}
	if($usuario->fechaNacimiento!=""){
		$usuarioAntiguo->fechaNacimiento=$usuario->fechaNacimiento;
	}elseif($usuario->fechaNacimiento=="" && $usuarioAntiguo->fechaNacimiento==""){
		//$usuarioAntiguo->fechaNacimiento="campo Vacio";
	}
	if($usuario->eslogan!=""){
		$usuarioAntiguo->eslogan=$usuario->eslogan;
	}elseif($usuario->eslogan=="" && $usuarioAntiguo->eslogan==""){
		//$usuarioAntiguo->eslogan="campo Vacio";
	}
	$sql2="UPDATE usuario SET nombreUsuario='".$usuarioAntiguo->nombreUsuario."' , email='".$usuarioAntiguo->email."' , pass='".$usuarioAntiguo->pass."', foto='".$usuarioAntiguo->foto."',
	preferencia1='".$usuarioAntiguo->preferencia1."',preferencia2='".$usuarioAntiguo->preferencia2."',preferencia3='".$usuarioAntiguo->preferencia3."',
	estado='".$usuarioAntiguo->estado."', ciudadActual='".$usuarioAntiguo->ciudadActual."',fechaNacimiento='".$usuarioAntiguo->fechaNacimiento."',
	tipoUsuario='".$usuarioAntiguo->tipoUsuario."',eslogan='".$usuarioAntiguo->eslogan."' WHERE email='".$email."'";
	Usuario::consultaBD($sql2);
//header("Location:index.php");
}
/*
function registrarUsuarioAdmin($nombreUsuario,$email,$pass,$tipoUsuario){
$this->conectarBD();
$sql="INSERT INTO usuarios(nombreUsuario, email, pass, tipoUsuario) VALUES ('".$nombreUsuario."','".$email."','".$pass."','".$tipoUsuario."')";
$this->consult($sql);
header("Location:administrador.php");
}
function eliminarUsuarioAdmin(){
$this->conectarBD();
$sql="DELETE FROM usuario WHERE email ='".$this->email."'";
$this->consultaBD($sql);
header("location:administrador.php");
}
function modificarUsuarioAdmin($email){
$this->conectarBD();
$sql="UPDATE usuario SET nombreUsuario='".$this->nombreUsuario."',email='".$this->email."', pass='".$this->pass."', tipoUsuario=".$this->tipoUsuario." WHERE email='".$email."'";
$this->consultaBD($sql);
header("location:administrador.php");
}
*/
function getAmigosParaConfirmar(){
	$this->conectarBD();
	$sql = "SELECT email1 FROM agrega WHERE email2='$this->email' and estado = '1' ";
	$resultado= mysql_query($sql);
	$toRet = array();
	while($row = mysql_fetch_array($resultado)){
		array_push($toRet, $this->getObjetoUsuario($row["email1"]));
	}
	return $toRet;
}
function getAmigosSinConfirmar(){
	$this->conectarBD();
	$sql = "SELECT email2 FROM agrega WHERE email1='$this->email' and estado = '1' ";
	$resultado= mysql_query($sql);
	$toRet = array();
	while($row = mysql_fetch_array($resultado)){
		array_push($toRet, $this->getObjetoUsuario($row["email2"]));
	}
	return $toRet;
}

function numAmigos(){
	$this->conectarBD();
	$sql = "SELECT email1 FROM agrega WHERE email2='$this->email' and estado = '0' \n"
    . "UNION\n"
    . "SELECT email2 FROM agrega WHERE email1='$this->email' and estado = '0' ";
	$resultado = mysql_query($sql);
	return mysql_num_rows($resultado);
}
function paginadorAmigos($usr,$comienzo,$cant_reg){
	$this->conectarBD();
	$sql = "\n"
    . "SELECT u.nombreUsuario,u.email,u.foto,u.eslogan FROM agrega a,usuario u WHERE a.email2='$this->email' and u.email=a.email1 and a.email1 != '$usr' and a.estado = '0' \n"
    . "UNION\n"
    . "\n"
    . "SELECT u.nombreUsuario,u.email,u.foto,u.eslogan FROM agrega a,usuario u WHERE a.email1='$this->email' and u.email=a.email2 and a.email2 != '$usr' and a.estado = '0' ORDER BY 1 LIMIT ".$comienzo.", ".$cant_reg;
	//echo $sql;
	return mysql_query($sql);
}

function estadoAmistad($amigo){
	$this->conectarBD();
	$sql = "SELECT estado FROM agrega WHERE email1='$this->email' AND email2='$amigo' OR email1='$amigo' AND email2='$this->email'";
	$resultado = mysql_query($sql);
	$row = mysql_num_rows($resultado);
	if( $row == 0 ){
		return -1;
	} else {
		$row = mysql_fetch_array($resultado);
		return $row['estado'];
	}
}

function getAmigos(){
	$this->conectarBD();
	$sql = "SELECT email2 FROM agrega WHERE email1='$this->email' and estado = '0' ";
	$resultado= mysql_query($sql);
	$toRet = array();
	while($row = mysql_fetch_array($resultado)){
		array_push($toRet, $this->getObjetoUsuario($row["email2"]));
	}
	$sql = "SELECT email1 FROM agrega WHERE email2='$this->email' and estado='0' ";
	$resultado= mysql_query($sql);
	while($row = mysql_fetch_array($resultado)){
		array_push($toRet, $this->getObjetoUsuario($row["email1"]));
	}
	return $toRet;
}


//Esta funcion retorna los amigos de tus amigos, que no sean tus amigos ni tu <<- mola eh
function getPosiblesAmigos(){
	$this->conectarBD();
	$misAmigos = $this->getAmigos();
	foreach($this->getAmigosSinConfirmar() as $masAmigos){
		array_push($misAmigos, $masAmigos);
	}
	foreach($this->getAmigosParaConfirmar() as $masAmigos){
		array_push($misAmigos, $masAmigos);
	}
	$toRet = array();
	//Recorre a mis amigos para ver sus amigos, hay que verificar que no los tenga añadidos ya, ni sea yo
	foreach($misAmigos as $amigo){
		$susAmigos = $amigo->getAmigos();
		//recorro sus amigos y los añado al array de retorno si no son yo, o un amigo agregado mio
		foreach($susAmigos as $suAmigo){
			if( (!in_array($suAmigo, $misAmigos)) && ($suAmigo != $this) ){
				array_push($toRet, $suAmigo);
			}
		}
		return $toRet;
	}
}


function eliminarAmigo($emailamigo){
	$this->conectarBD();
	$sql = "DELETE FROM agrega WHERE (email1='$emailamigo' and email2='$this->email') or (email2='$emailamigo' and email1='$this->email')";
	return mysql_query($sql);
}
/*function addAmigo($emailAmigo){
	$this->conectarBD();
	$sql = "SELECT email FROM usuario where email='$emailAmigo'";
	if(mysql_num_rows(mysql_query($sql)) == 0){
		return "noexiste";
	}else{
		$sql = "SELECT estado FROM agrega WHERE email1='$this->email' AND email2='$emailamigo' OR email2='$this->email' AND email1='$emailamigo' ";
		$resultado=mysql_query($sql);
		$row = mysql_fetch_array($resultado);
		echo $row["estado"];
			/*if($row["estado"]==1){
				return "error";
			}else{
				$sql = "INSERT INTO agrega values('$this->email','$emailAmigo','1')";
				if(mysql_query($sql)){
				return "insertado";
			}
			return "error";
			}
		
	}
//Si un usuario tiene a 1 el campo estado significa que esta pendiente de aceptacion. 0 es que esta todo correcto.
	
	$sql = "INSERT INTO agrega values('$this->email','$emailAmigo','1')";
	if(mysql_query($sql)){
		return "insertado";
	}
	return "error";
}*/
function addAmigo($emailAmigo){
        $this->conectarBD();
        $sql = "SELECT email FROM usuario where email='$emailAmigo'";
        if(mysql_num_rows(mysql_query($sql)) == 0){
                return "noexiste";
        }else{
                $sql = "SELECT estado FROM agrega WHERE email1='$this->email' AND email2='$emailamigo' OR email2='$this->email' AND email1='$emailamigo' ";
                $resultado=mysql_query($sql);
                $row = mysql_fetch_array($resultado);
                echo $row["estado"];
                        if($row["estado"]==1){
                                return "error";
                        }else{
                                $sql = "INSERT INTO agrega values('$this->email','$emailAmigo','1')";
                                if(mysql_query($sql)){
                                return "insertado";
                        		}
                        		return "error";
                        }

        }
//Si un usuario tiene a 1 el campo estado significa que esta pendiente de aceptacion. 0 es que esta todo correcto.

}

function confirmarAmigo($usuarioTarget){
	$this->conectarBD();
	$sql = "UPDATE agrega SET estado='0' WHERE email2 = '$this->email' AND email1 = '$usuarioTarget'";
	mysql_query($sql) or die(mysql_error());
}
function denegarAmigo($usuarioTarget){
	$this->conectarBD();
	$sql = "Delete FROM agrega WHERE email1='$this->email' AND email2='$usuarioTarget' OR email1='$usuarioTarget' AND email2='$this->email' ";
	return mysql_query($sql);
}
function insertarPublicacion($publi){
	$this->conectarBD();
	$sql = "INSERT INTO publicacion(email, fecha, publica) values('$this->email','".date("Y-m-d H:i:s")."','$publi')";
	return mysql_query($sql);
}
function consultarPublicacion(){
	$this->conectarBD();
	$toRet = array();
	$toRet[0] = array();
	$toRet[1] = array();
	$toRet[2] = array();
	$toRet[3] = array();
	$toRet[4] = array();
// $sql="SELECT u.nombreUsuario, p.fecha, p.publica FROM publicacion p, usuario u WHERE u.email = '".$this->email."' AND p.email = '".$this->email."' ORDER BY p.fecha desc";
	$sql= "\n"
	. "SELECT u.nombreUsuario,u.email, p.fecha,p.publica,p.idPublicacion FROM agrega a, usuario u, publicacion p WHERE a.email2='".$this->email."' AND a.email1=u.email AND a.estado=0 AND u.email=p.email \n"
	. "UNION\n"
	. "SELECT u.nombreUsuario,u.email, p.fecha,p.publica,p.idPublicacion FROM agrega a, usuario u, publicacion p WHERE a.email1='".$this->email."' AND a.email2=u.email AND a.estado=0 AND u.email=p.email \n"
	. "UNION\n"
	. "SELECT u.nombreUsuario,u.email, p.fecha,p.publica,p.idPublicacion FROM usuario u,publicacion p WHERE u.email='".$this->email."' AND u.email=p.email ORDER BY 3 desc";
	$resultado=mysql_query($sql);
	while($row = mysql_fetch_array($resultado)){
		array_push($toRet[0], $row["nombreUsuario"]);
		array_push($toRet[1], $row["fecha"]);
		array_push($toRet[2], $row["publica"]);
		array_push($toRet[3], $row["email"]);
		array_push($toRet[4], $row["idPublicacion"]);
	}
	return $toRet;
}
function paginadorPublicacionesPerfil($comienzo,$cant_reg){
	$this->conectarBD();
	$sql="SELECT fecha,email,idPublicacion,publica FROM publicacion WHERE email='".$this->email."' ORDER BY fecha desc LIMIT ".$comienzo.", ".$cant_reg;
//echo $sql;
	return mysql_query($sql);
}
function numPublicaciones(){
	$this->conectarBD();
	$sql="SELECT * FROM publicacion WHERE email='".$this->email."'";
	$resultado = mysql_query($sql);
	return mysql_num_rows($resultado);
}
function editarPerfil($newName, $newPass){
	$this->conectarBD();
	$sql = "UPDATE usuario SET nombreUsuario = '$newName' , pass = '$newPass' WHERE email = '$this->email' ";
	return mysql_query($sql);
}
function actualizaBio($newBio){
	$this->conectarBD();
	$sql = "UPDATE usuario SET eslogan = '$newBio' WHERE email = '$this->email' ";
	return mysql_query($sql);
}
function eliminarCuenta(){
	$this->conectarBD();
	$sql = "DELETE FROM usuario WHERE email = '$this->email' ";
	return mysql_query($sql);
}
function eliminarPublicacion($idP){
	$this->conectarBD();
	$sql = "DELETE FROM publicacion WHERE idPublicacion=$idP";
	return mysql_query($sql);
}
//devuelve array asociativo con todos los usuarios
function mostrarUsuarios(){
	Usuario::conectarBD();
	$sql = "SELECT * FROM usuario";
	$result = Usuario::consultaBD($sql);
	while ($tuplas = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$toRet[$tuplas["email"]] = $tuplas;
	}
	return $toRet;
}
function editarPublicacion($id,$publi){
	$this->conectarBD();
	$sql = "UPDATE publicacion SET publica='".$publi."' WHERE idPublicacion=".$id;
	return mysql_query($sql);
}
function consultarRecomendadas(){
	$this->conectarBD();
	$toRet = array();
	$toRet[0] = array();
	$toRet[1] = array();
	$toRet[2] = array();
// $sql="SELECT u.nombreUsuario, p.fecha, p.publica FROM publicacion p, usuario u WHERE u.email = '".$this->email."' AND p.email = '".$this->email."' ORDER BY p.fecha desc";
	$sql= "\n"
	. "SELECT u.nombreUsuario,p.foto,p.titulo FROM agrega a, usuario u, recomendada r, pelicula p WHERE a.email2='".$this->email."' AND a.email1=u.email AND a.estado=0 AND u.email=r.email AND r.idPelicula=p.idPelicula \n"
	. "UNION\n"
	. "SELECT u.nombreUsuario,p.foto,p.titulo FROM agrega a, usuario u, recomendada r, pelicula p WHERE a.email1='".$this->email."' AND a.email2=u.email AND a.estado=0 AND u.email=r.email AND r.idPelicula=p.idPelicula \n";
	$resultado=mysql_query($sql);
	while($row = mysql_fetch_array($resultado)){
		array_push($toRet[0], $row["nombreUsuario"]);
		array_push($toRet[1], $row["foto"]);
		array_push($toRet[2], $row["titulo"]);
	}
	return $toRet;
}


function usuariosFiltrados($email, $tipo){
		Usuario::conectarBD();
		if($tipo == ""){
			$tipo = "0' or tipoUsuario = '1";
		}
		if($tipo == "administrador"){
			$tipo = "1";
		}
		if($tipo == "usuario"){
			$tipo = "0";
		}
		$sql="select * from usuario where email like '%".$email."%' and (tipoUsuario = '".$tipo."')";
		
		
		$resultado=mysql_query($sql);
		echo $sql;
		while($fila=mysql_fetch_array($resultado)){
			$toRet[$fila["email"]]=$fila;
		}
		
		return $toRet;

	}
}

function editarFotoPerfil($email,$foto){

	$this->conectarBD();
	$sql = "UPDATE usuario SET foto='".$foto."' WHERE email=".$email;
	return mysql_query($sql);
}

?>