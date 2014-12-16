<?php

/**
* 
*/
class Evento
{
	private var $idEvento;
	private var $descripcion;
	private var $fechaEvento;
	private var $fechaCreacion;


	public function __construct($id, $descripcion, $fechaEvento, $fechaCreacion)
	{
		$this->idEvento = $idEvento;
		$this->descripcion = $descripcion;
		$this->fechaEvento = $fechaEvento;
		$this->fechaCreacion = $fechaCreacion;
	}

	function conectarBD()
	{
		mysql_connect("localhost","usrCinesLy","AVVeY4MYU6bVXYhJ") or die ('No se pudo conectar'.mysql_error());
		mysql_select_db("CinesLy") or die ('No se pudo conectar a la base de datos');
	}

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


}