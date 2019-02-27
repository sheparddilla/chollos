<?php
session_start();
include ('../models/MoldeUsuarios.php');
$pagina="RegistroV.php";
$msg="";
try{
	$obj = new MoldeUsuarios();
	//Insertar usuario
	$id=$obj->Insertar($_POST["nombre"],$_POST["mail"],$_POST["pass"]);
	if ($id>0){
		$pagina = "../views/LoginV.php?msg2=Te has registrado";
	}else{
		$pagina = "../views/RegistroV.php?msg=El email es existente.";
	}
	header('Location: ' . $pagina);
}catch (Exception $e){
	$msg=$e->getMessage();
	echo $msg;
}
?>