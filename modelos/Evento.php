<?php

/**
* 
*/
class Evento
{
	private string $idEvento;
	private string $descripcion;
	private date $fechaEvento;
	private date $fechaCreacion;

	function conectarBD()
	{

		mysql_connect("localhost","usrCinesLy",)
	}

	public function __construct($id, $descripcion, $fechaEvento, $fechaCreacion)
	{
		$this->idEvento = $idEvento;
		$this->descripcion = $descripcion;
		$this->fechaEvento = $fechaEvento;
		$this->fechaCreacion = $fechaCreacion;
	}

	public function getIdEvento()
	{
		return $this->idEvento;

	}		


}