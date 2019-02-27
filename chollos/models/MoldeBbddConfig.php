<?php
//Definimos los atributos de la clase
class MoldeBbddConfig {
	protected $Serv;
	protected $BDName;
	protected $BDUser;
	protected $BDPass;
	
	//Modelamos las funciones
	public function __construct() {
		date_default_timezone_set('Europe/Madrid');
		$modo = 0; //0=LocalHost y 1=ServidorReal
		
		switch($modo){
			case 0:
				$this->ConexionLocal();
				break;
			case 1:
				$this->ConexionReal();
				break;
		}
	}
	
	private function ConexionLocal(){
		$this->Serv="localhost";
		$this->BDName="chollosbdd";
		$this->BDUser="root";
		$this->BDPass="";
	}
	
	private function ConexionReal(){
		$this->Serv="";
		$this->BDName="chollosbdd";
		$this->BDUser="";
		$this->BDPass="";
	}
}
?>