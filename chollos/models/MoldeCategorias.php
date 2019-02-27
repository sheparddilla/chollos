<?php
include_once('MoldeBbdd.php');

class MoldeCategorias extends MoldeBbdd{
	private $ID; //id de la categoria
	private $nombreCategoria; //nombre de la categoria
	
	//declaramos los getters de los atributos...
	public function getID(){
		return $this->ID;
	}
	public function getNombre(){
		return $this->nombreCategoria;
	}
	// fin de los getters....
	
	//moldeamos las funciones..
	public function __construct() {
		parent::__construct();
		$this->ID=0;
		$this->nombreCategoria="";
	}
	
	//Insertar categoria...
	public function Insertar($id, $nombreCategoria) {
		$id = 0;
		try {
			$sql="insert into categorias (idCategoria, nombreCategoria) values ('$id', '$nombreCategoria')";
			$id = $this->CE($sql,true);
		}catch (Exception $e) {
			throw $e;
		}
		return $id;
	}
	
	//Actualizar el nombre de la categoria..
	public function ActualizarNombre($id, $nombreCategoria) {
		$total = 0;
		try {
			$sql="update categorias set nombreCategoria='$nombreCategoria' where idCategoria='$id'";
			$total = $this->CE($sql);
		}catch (Exception $e) {
			throw $e;
		}
		return $total;
	}
	
	//Lista las páginas totales de todas las categorias
	public function ListarPaginado($inicio, $num_items) {
		return $this->Listar("limit $inicio,$num_items");
	}

	//Devuelve TODA la lista de categorias
	public function Listar($condicion="") {
		$info=array();
		try {
			$sql="Select * from categorias";
			if ($this->CS($sql)) {
				$i=0;
				while ($fila=$this->Datos->fetch_assoc()){
					$info[$i][0]=$fila["idCategoria"];
					$info[$i][1]=$fila["nombreCategoria"];
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
	
	//funcion por si se cierra inesperadamente el programa
	public function __destruct() { 
		try {

		} catch (Exception $e) {
			throw $e;
		}
	}
}