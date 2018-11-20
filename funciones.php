<?php
class partidoModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=mundiapp', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM partido");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$vo = new partido();

				$vo->__SET('id_partido', $r->id_partido);
				$vo->__SET('id_equipo1', $r->id_equipo1);
				$vo->__SET('goles', $r->goles);
				$vo->__SET('id_equipo2', $r->id_equipo2);
				$vo->__SET('fecha', $r->fecha);
				$vo->__SET('id_estadio', $r->id_estadio);

				$result[] = $vo;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener1($id)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM equipo1 where id_equipo1=".$id);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$vo = new partido();

				$vo->__SET('id_equipo1', $r->id_equipo1);
				$vo->__SET('nombre_equipo1', $r->nombre_equipo1);

				$result[] = $vo;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Obtener1_1($id)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM partido where id_partido=".$id);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$vo = new partido();

				$vo->__SET('id_partido', $r->id_partido);
				$vo->__SET('id_equipo1', $r->id_equipo1);
				$vo->__SET('goles', $r->goles);
				$vo->__SET('id_equipo2', $r->id_equipo2);
				$vo->__SET('fecha', $r->fecha);
				$vo->__SET('id_estadio', $r->id_estadio);

				$result[] = $vo;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Obtener2($id_partido)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM partido WHERE id_partido= ?");
			          

			$stm->execute(array($id_partido));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$vo = new partido();

			$vo->__SET('id_partido', $r->id_partido);
				$vo->__SET('id_equipo1', $r->id_equipo1);
				$vo->__SET('goles', $r->goles);
				$vo->__SET('id_equipo2', $r->id_equipo2);
				$vo->__SET('fecha', $r->fecha);
				$vo->__SET('id_estadio', $r->id_estadio);

			return $vo;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_partido)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM partido WHERE id_partido = ?");			          

			$stm->execute(array($id_partido));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(partido $data)
	{
		try 
		{
			$sql = "UPDATE partido SET 
						grupo_nombre        = ?,
						grupo_pais1            = ?, 
						grupo_pais2 = ?,
						grupo_estadio = ?,
						grupo_fecha = ?,
						grupo_hora = ?
				    WHERE grupo_id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('grupo_nombre'), 
					$data->__GET('grupo_pais1'), 
					$data->__GET('grupo_pais2'),
					$data->__GET('grupo_estadio'),
					$data->__GET('grupo_fecha'),
					$data->__GET('grupo_hora'),
					$data->__GET('grupo_id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Grupo $data)
	{
		try 
		{
		$sql = "INSERT INTO grupo (grupo_nombre,grupo_pais1,grupo_pais2,grupo_estadio,
									grupo_fecha,grupo_hora) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('grupo_nombre'), 
				$data->__GET('grupo_pais1'), 
				$data->__GET('grupo_pais2'),
				$data->__GET('grupo_estadio'),
				$data->__GET('grupo_fecha'),
				$data->__GET('grupo_hora')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}