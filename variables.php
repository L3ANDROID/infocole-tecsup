<?php
class partido
{
	private $id_partido;
	private $id_equipo1;
	private $goles;
	private $id_equipo2;
	private $fecha;
	private $id_estadio;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}