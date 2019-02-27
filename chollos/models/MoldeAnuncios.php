<?php
include_once('MoldeBbdd.php');

class MoldeAnuncios extends MoldeBbdd{
	private $ID; //id del anuncio
	private $foto; //url interno de la foto
	private $titulo; //titulo descriptivo del anuncio
	private $url; //url de la web del anuncio
	private $precio; //precio del anuncio
	private $estado; // el estado de compra del producto(chollo,estandar,caro)
	private $idUsuario;//id del usuario
	private $idCategoria;// id de la categoria del anuncio
	private $idWeb; //id de la web de terceros de donde cogemos el anuncio (Ej:.MilAnuncios,...)
	
	//declaramos los getters de los atributos...
	public function getID() { 
		return $this->ID;
	}
	public function getFoto() { 
		return $this->foto;
	}
	public function getUrl() { 
		return $this->url;
	}
	public function getTitulo() {
		return $this->titulo;
	}
	public function getPrecio() {
		return $this->precio;
	}
	public function getEstado() {
		return $this->estado;
	}
	public function getIdUsuario() {
		return $this->idUsuario;
	}
	public function getIdCategoria() {
		return $this->idCategoria;
	}
	public function getIdWeb() {
		return $this->idWeb;
	}
	//fin de los getters...
	
	//moldeamos las funciones..
	public function __construct() {
		parent::__construct();
		$this->ID=0;
		$this->foto="";
		$this->url="";
		$this->titulo="";
		$this->precio="";
		$this->estado="";
		$this->idUsuario="";
		$this->idCategoria="";
		$this->idWeb="";
	}
	
	//Insercción del anuncio
	public function Insertar($foto, $titulo, $url, $precio, $estado, $idUsuario, $idCategoria, $idWeb) {
		$ID = 0;
		try {
			$sql="insert into anuncios (foto, titulo, urlAnuncio, precio, icono, idUsuario, idCategoria, idWeb)
				values ('$foto', '$titulo', '$url', '$precio', '$estado', '$idUsuario', '$idCategoria', '$idWeb')";
			$ID = $this->CE($sql,true);
		}catch (Exception $e) {
			throw $e;
		}
		return $ID;
	}
	public function Actualizar($ID, $foto, $titulo, $url, $precio, $estado, $idUsuario, $idCategoria, $idWeb) {
		$total = 0;
		try {
			$sql="update anuncios set foto='$foto', titulo='$titulo', urlAnuncio='$url', precio='$precio', icono='$estado', idUsuario='$idUsuario', idCategoria='$idCategoria', idWeb='$idWeb' where idAnuncio='$ID'";
			$total = $this->CE($sql);
		}catch (Exception $e) {
			throw $e;
		}
		return $total;
	}
	
	//Elimina todo el registro del anuncio
	public function Eliminar($id) {
		$total = 0;
		try {
			$sql="delete from anuncios where idAnuncio='$id'";
			$total = $this->CE($sql);
		}catch (Exception $e) {
			throw $e;
		}
		return $total;
	}
	
	//Contador de todos los anuncios que tenemos en la base de datos.
	public function TotalAnuncios(){
		$total = 0;
		try {
			$sql="Select count(*) as TOTAL from anuncios";
			$total = $this->CT($sql);
		} catch (Exception $e) {
			throw $e;
		}
		return $total;
	}
	
	//Lista las páginas totales en los que esta el anuncio
	public function ListarPaginado($inicio, $num_items) {
		return $this->Listar("limit $inicio,$num_items");
	}

	//Devuelve la lista de anuncios según la condición
	public function Listar() {
		$info=array();
		try {
			$sql="Select * from anuncios where idAnuncio>0 ";
			if ($this->CS($sql)) {
				$i=0;
				while ($fila=$this->Datos->fetch_assoc()){
					$info[$i][0]=$fila["idAnuncio"];
					$info[$i][1]=$fila["foto"];
					$info[$i][2]=$fila["titulo"];
					$info[$i][3]=$fila["urlAnuncio"];
					$info[$i][4]=$fila["precio"];
					$info[$i][5]=$fila["icono"];
					$info[$i][6]=$fila["idUsuario"];
					$info[$i][7]=$fila["idCategoria"];
					$info[$i][8]=$fila["idWeb"];
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
	
	//carga las propiedades de los anuncios apartir de su ID
	public function Cargar($id) {
		try {
			$sql="Select * from anuncios where idAnuncio=$ID";
			if ($this->CS($sql)) {
				if ($fila=$this->$Datos->fetch_assoc()){
					$this->ID=$fila["idAnuncio"]; //idAnuncio
					$this->foto=$fila["foto"]; //foto
					$this->titulo=$fila["titulo"]; //titulo
					$this->url=$fila["urlAnuncio"]; //urlAnuncio
					$this->precio=$fila["precio"]; //precio
					$this->estado=$fila["icono"]; //icono
					$this->idUsuario=$fila["idUsuario"]; //idUsuario
					$this->idCategoria=$fila["idCategoria"]; //idCategoria
					$this->idWeb=$fila["idWeb"]; //idWeb
				}
				$this->mDatos->close();
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
	
	//Listar todos los anuncios
	public function ListarWS() {
		$lista=array();
		try {
			$sql="Select * from anuncios";
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
		//echo $lista[0]["idAnuncio"]; exit;
		return $lista;
	}

	public function listarAnunciosFilter($categoria){
		$Array = array();
		
		try{
			$this->ConectarBD();
			
			$consulta= "SELECT foto, titulo, precio, icono, urlAnuncio from anuncios where idCategoria = $categoria";

			$datos = mysqli_query($this->Conexion,$consulta);
			
			$i=0;
			while($row2=mysqli_fetch_assoc($datos)) {
				$Array[$i] = $row2;
				$i++;	
			}
		$this->DesconectarBD();
	}catch (Exception $e){
		//nada
	}
	return $Array;
	}
}
?>