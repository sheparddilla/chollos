<?php
include_once('MoldeBbdd.php');

class MoldeUsuarios extends MoldeBbdd {
	//definimos los atributos de la clase 
	private $ID;
	private $nombre;
	private $email;
	private $password;
	
	//establecemos los getters
	public function getID(){
		return $this->ID;
	}
	public function getNombre(){
		return $this->nombre;
	}	
	public function getEmail(){
		return $this->email;
	}
	public function getPassword(){
		return $this->password;
	}
	
	//funciones de la clase
	public function __construct() {
		parent::__construct();
		$this->ID=0;
		$this->nombre="";
		$this->email="";
		$this->password="";
	}
	public function randomPassword($longitudPass=10) {
		$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		//Obtenemos la longitud de la cadena de caracteres
		$longitudCadena=strlen($cadena);
		$pass="";
		//Creamos la contrasena
		for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
			$pos=rand(0,$longitudCadena-1);

        //Vamos formando la contrasena en cada iteraccion del bucle, anadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
			$pass .= substr($cadena,$pos,1);
		}
		return $pass;
		
	}
	
	//insertar usuario
	public function Insertar($nombre, $email, $pass) {
		$id = 0;
		try {
			$sql="Select count(*) as TOTAL from usuarios where email='$email'";
			$total = $this->CT($sql);
			if ($total>0) {
				//el id seguira en 0 y esto significa que ya existe dicho email.
			}else{
			$sql="insert into usuarios (nombre_apellidos, email, password)
			values ('$nombre','$email','$pass')";
			$id = $this->CE($sql,true);
			}
		}catch (Exception $e) {
			throw $e;
		}
		return $id;
	}

	//actualizar usuario
	public function Actualizar($id,$nombre,$password) {
		$res = 0;
		try {
			$sql="Update usuarios set nombre_apellidos='$nombre', password='$password' where idUsuario='$ID'";
			$res = $this->CE($sql,false);
		} catch (Exception $e) {
			throw $e;
		}
		return res;
	}
	
	//comprueba si se esta logueado
	public function Logueado() {
		$conectado = 0;//0=desconectado y 1=conectado
		if(isset($_SESSION)){
			$conectado = 1;
		}
		return $conectado;
	}
	
	//desconecta el usuario logueado
	public function Desconectarse() {
		session_destroy();
	}
	
	//comprueba si el usuario es correcto
	public function Validar($email,$pass) {
		$this->ID = 0;
		try {
			$sql="Select * from usuarios where email='$email' and password='$pass'";
			if ($this->CS($sql)) {
				if ($fila=$this->Datos->fetch_assoc()) { 	
					//Login correcto, obtenemos el código y nombre:
					$this->ID=$fila["idUsuario"];
					$this->nombre=$fila["nombre_apellidos"];
				}
				$this->Datos->close();
			}
		} catch (Exception $e) {
			throw $e;
		}
		return $this->ID;
	}
	
	//Cargamos los datos del usuario
	public function Cargar($id) {
		try {
			$sql="Select * from usuarios where idUsuario=$id";
			if ($this->CS($sql)) {
				if ($fila=$this->Datos->fetch_assoc()){
					$this->ID=$fila["idUsuario"];
					$this->nombre=$fila["nombre_apellidos"];
					$this->email=$fila["email"];
					$this->password=$fila["password"];
				}
				$this->Datos->close();
			}
		} catch (Exception $e) {
			throw new Exception($sql);
		}
	}
	
	//método que se ejectura cuando el programa se cierra inesperadamente
	public function __destruct() { 
		try {

		} catch (Exception $e) {
			throw $e;
		}
	}
	
}
?>