<?php
include_once('MoldeBbdd.php');

class MoldeWebAnuncio extends MoldeBbdd{
	private $ID; //id de la web
	private $nombreWeb; //nombre de la web
	private $url; //url de dicha web
	
	//declaramos los getters de los atributos...
	public function getID() { 
		return $this->ID;
	}
	public function getNombreWeb() { 
		return $this->nombreWeb;
	}
	public function getUrl() { 
		return $this->url;
	}
	//fin de los getters...
	
	//moldeamos las funciones..
	public function __construct() {
		parent::__construct();
		$this->ID=0;
		$this->nombreWeb="";
		$this->url="";
	}
	
	//Insercción de las webs del anunciante
	public function Insertar($ID, $nombreWeb, $url) {
		$ID = 0;
		try {
			$sql="insert into webanuncios (idWeb, nombreWeb, url) values ('$ID', '$nombreWeb', '$url')";
			$ID = $this->CE($sql,true);
		}catch (Exception $e) {
			throw $e;
		}
		return $ID;
	}
	
	//editar el nombre de las webs del anunciante
	public function Actualizar($ID, $nombreWeb, $url) {
		$total = 0;
		try {
			$sql="update webanuncios set nombreWeb='$nombreWeb', url='$url' where idWeb='$ID'";
			$total = $this->CE($sql);
		}catch (Exception $e) {
			throw $e;
		}
		return $total;
	}
	
	//Elimina todo el registro de la web del anunciante
	public function Eliminar($id) {
		$total = 0;
		try {
			$sql="delete from webanuncios where idWeb='$id'";
			$total = $this->CE($sql);
		}catch (Exception $e) {
			throw $e;
		}
		return $total;
	}
	
	//Lista las páginas totales en los que estan las webs del anuncio.
	public function ListarPaginado($inicio, $num_items) {
		return $this->Listar("limit $inicio,$num_items");
	}

	//Devuelve toda la lista de webs
	public function Listar($condicion="") {
		$info=array();
		try {
			$sql="Select * from webanuncios";
			if ($this->CS($sql)) {
				$i=0;
				while ($fila=$this->Datos->fetch_assoc()){
					$info[$i][0]=$fila["idWeb"];
					$info[$i][1]=$fila["nombreWeb"];
					$info[$i][2]=$fila["url"];
					$i++;
				}
				$this->Datos->close();
			}
		} catch (Exception $e) {
			//Me viene bien mientras desarrollo:
			throw new Exception($sql);
		}
		return $info;
	}
	
	//carga las webs de los anunciantes apartir de su ID.
	public function Cargar($id) {
		try {
			$sql="Select * from webanuncios where idWeb=$id";
			if ($this->CS($sql)) {
				if ($fila=$this->$Datos->fetch_assoc()){
					$this->ID=$fila["idWeb"]; //idWeb
					$this->foto=$fila["nombreWeb"]; //nombre de la web
					$this->titulo=$fila["url"]; //url de la web
				}
				$this->Datos->close();
			}
		} catch (Exception $e) {
			throw new Exception($sql);
		}
	}
	
	//funcion por si se cierra inesperadamente el programa
	public function __destruct() { 
		try {

		} catch (Exception $e) {
			throw $e;
		}
	}
	
	//Listar todas las webs de los anunciantes
	public function ListarWS() {
		$lista=array();
		try {
			$sql="Select * from webanuncios";
			if ($this->CS($sql)) {
				$i=0;
				while ($fila=$this->Datos->fetch_assoc()){
					array_push($lista,$fila);
				}
				$this->Datos->close();
			}
		} catch (Exception $e) {
			throw new Exception($sql);
		}
		return $lista;
	}
}
?>