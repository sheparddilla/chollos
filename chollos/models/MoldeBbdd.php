<?php
require_once('MoldeBbddConfig.php');
class MoldeBbdd extends MoldeBbddConfig {
	//establecer los atributos
	protected $Conexion;
	protected $Datos;
	
	//moldeamos las funciones
	public function __construct() {
		parent::__construct();
	}
	
	protected function ConectarBD(){
		//vamos a conectar con la base de datos
		try{
			if(!($this->Conexion=new mysqli($this->Serv,$this->BDUser,$this->BDPass,$this->BDName)))
				throw new Exception("Sin conexión con el servidor..");
		}catch (Exception $e){
			//No hemos podido conectar con el servidor de bbdd
			throw $e;
		}
		$this->Conexion->set_charset('utf8');			
	}
	
	//Método para las consultas de selección:
	public function CS($sql) {
		$res=false;
		try {
			$this->ConectarBD();
			if (!($this->Datos = $this->Conexion->query($sql))) 
				throw new Exception("Error al ejecutar la consulta: $sql");
			else
				$res=true;
			$this->DesconectarBD();
		} catch (Exception $e) {
			throw $e;
		}
		return $res;
	}
	
	//Método para las consultas de modificación:
	public function CE($sql,$lastid=false) {
		$ret=0;
		try {
			$this->ConectarBD();
			if (!$this->Conexion->query($sql))
				throw new Exception("Error al ejecutar la consulta: $sql");
			//Comprobamos si obtenemos el último codigo o no:
			if ($lastid) 
				$ret = $this->Conexion->insert_id;
			else	//Numero de filas afectadas:
				$ret = $this->Conexion->affected_rows;
			$this->DesconectarBD();
		} catch (Exception $e) {
			throw $e;
		}
		return $ret;
	}

	//Método para las consultas de totales:
	public function CT($sql) {
		$res=0;
		try {
			$this->ConectarBD();
			if (!($this->Datos = $this->Conexion->query($sql))) 
				throw new Exception("Error al ejecutar la consulta: $sql");

			if ($fila=$this->Datos->fetch_assoc()) {
				$res = $fila["TOTAL"];
			}
			$this->Datos->close();
			$this->DesconectarBD();
		} catch (Exception $e) {
			throw $e;
		}
		return $res;
	}
	
	protected function DesconectarBD() {
		//Desconectamos con la BBDD:
		try {
			$this->Conexion->close();
		} catch (Exception $e) {
			throw $e;
		}
	}
}
?>