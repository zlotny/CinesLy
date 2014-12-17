<?php
/**
*
*/
class Evento
{	

	private var $idEvento;
	private var $descripcion;
	private var $mail;
	private var $idSesion;
	private var $idPelicula;
	private var $nombre;

	public function __construct($id, $descripcion, $pelicula, $correo, $sesion, $nombre)
	{
		$this->idEvento = $idEvento;
		$this->idPelicula = $pelicula;
		$this->idSesion = $sesion;
		$this->mail = $mail;
		$this->descripcion = $descripcion;
		$this->nombre = $nombre;
	}

	//Métodos visualizadores
	public function getIdEvento()
	{

		Evento::conectarBD();

		return $this->idEvento;

	}

	public function getDescripcion()
	{

		Evento::conectarBD();

		return $this->descripcion;

	}

	public function getNombre()
	{

		Evento::conectarBD();

		return $this->nobre;

	}

	public function getMail()
	{

		Evento::conectarBD();

		return $this->mail;

	}

	public function getIdPelicula()
	{

		Evento::conectarBD();

		return $this->idPelicula;

	}

	public function getIdSesion()
	{

		Evento::conectarBD();

		return $this->idSesion;

	}

	//Metodos modificadores
	public function setMail($mail)
	{

		Evento::conectarBD();

		return $this->mail = $mail;

	}

	public function setIdSesion($idSesion)
	{

		Evento::conectarBD();

		return $this->idSesion = $idSesion;

	}

	public function setIdPelicula($idPelicula)
	{

		Evento::conectarBD();

		return $this->idPelicula = $idPelicula;

	}

	public function setNombre($nombre)
	{

		Evento::conectarBD();

		return $this->nombre = $nombre;

	}

	public function setDescripcion($descripcion)
	{

		Evento::conectarBD();

		return $this->descripcion = $descripcion;

	}

	public function setMail($idEveneto)
	{

		Evento::conectarBD();

		return $this->idEveneto = $idEveneto;

	}

	private function result_to_array($result)
	{
	   // Defining an array
		$result_array = array();
	   // Creating the Array of all users
		for ($i = 0; $row = mysql_fetch_array($result); $i++)
		{
			$result_array[$i] = $row;
		}

	   // returns the array of all users by Multi Dimensional Array
		return $result_array;
	}

	public function conectarBD()//función que conecta con la base de datos, será llamada de forma estática
	{

		mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar'.mysql_error());
		mysql_select_db("CinesLy") or die ('No se pudo conectar a la base de datos');

	}

	public	function consultaBD($consulta)
	{

		$resultado= mysql_query($consulta) or die ('MySql Error en consultaBD'.mysql_error());
		return $resultado;

	}
	
	public function altaEvento($evento)//inserta un evento en la bd
	{

		Evento::conectarBD();

		$insertar="INSERT INTO evento(`id_evento` ,`idPelicula` ,`idSesion` ,`email` ,`descripcion` ,`nombre`)VALUES
		(evento->getIdEvento(), evento->getPelicula, evento->getSesion, evento->getCorreo, evento->getDescripcion, evento->getNombre)";

		if ($conn->query($insertar) === TRUE)
		{
			echo "Evento creado con éxito";
		}
		else
		{
			echo "Error" . $conn->error;
		}

		$resultado=Evento::consultaBD($insertar);

		/*if($resultado){

		echo "Evento creado";

	}*/
}

public function modificarEvento($evento, $eventoNuevo)
{
	Evento::conectarBD();

		$consulta=("SELECT FROM evento WHERE id_evento = evento->getIdEvento() ORDER BY ASC");//primero hacemos la consulta del evento a modificar

		$result= mysql_query($consulta);

		//$numeroCampos = mysql_num_rows($result);

		if ($result == 0){

			return false;
		}

		 $result = result_to_array($result); //metemos la consulta en un array

		 if ($consulta == ""){

		 	echo '<div align="center">
		 	<h2>No existe el evento</h2>
		 	</div>';

		 }else{

		 	$idEvento=$result[0];
		 	$idPelicula=$result[1];
		 	$idSesion=$result[2];
		 	$mail=$result[3];
		 	$descripcion=$result[4];
		 	$nombre = $result[5];

		 	
		 	
		 	if($idEvento == ""){

		 		$actualizado=mysql_query("UPDATE `evento` SET `id_evento`=eventoNuevo->getIdEvento() WHERE `id_evento` = idEvento");
		 	}

		 	if($idPelicula == "" or $idSesion == ""){

		 		$actualizado=mysql_query("UPDATE `evento` SET `idPelicula`=eventoNuevo->getIdPelicula(), `idSesion`=eventoNuevo->getIdSesion() WHERE `id_evento` = $idEvento");
		 	}

		 	
		 	if($mail == ""){

		 		$actualizado=mysql_query("UPDATE `evento` SET `email`=eventoNuevo->getMail() WHERE `id_evento` = idEvento");
		 	}

		 	if($descripcion == ""){

		 		$actualizado=mysql_query("UPDATE `evento` SET `descripcion`=eventoNuevo->getDescripcion() WHERE `id_evento` = idEvento");
		 	}

		 	if($mail == ""){

		 		$actualizado=mysql_query("UPDATE `evento` SET `nombre`=eventoNuevo->getNombre() WHERE `id_evento` = idEvento");
		 	}

		 }

		}

		public function eliminarEvento($evento)
		{

			$eliminar = mysql_query("DELETE FROM `evento` WHERE `id_evento` = evento->getIdEvento()");

			if ($consulta == ""){

				echo '<div align="center">
				<h2>El evento no existe</h2>
				</div>';

			}else{

				echo '<div align="center">
				<h2>El evento se ha eliminado con éxito</h2>
				</div>';

			}

		}

		public function consultarEvento($evento)
		{

			$consultar = mysql_query("SELECT * FROM `evento` WHERE `id_evento` = evento->getIdEvento()");

			if ($consulta == ""){

				echo '<div align="center">
				<h2>El evento no existe</h2>
				</div>';

			}else{

				$numeroCampos = mysql_num_rows($consultar);

				if ($consultar == 0){

					return false;
				}

		 $consultar = result_to_array($consultar); //metemos la consulta en un array

		 foreach ($consultar as $valor) {
		 	
		 	echo "$valor";
		 }

		}
	}
}
?>