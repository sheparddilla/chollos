<?php
session_start();
include ('../models/MoldeUsuarios.php');
$pagina="LoginV.php";
$msg="";
try {
	$obj = new MoldeUsuarios();
	$id=$obj->Validar($_POST["mail"],$_POST["pass"]); //---- MUY IMPORTANTE ---//
	//Si el $id>0, login es válido, creamos una sesión:
	if ($id>0) {
		//Cargo los datos del usuario (la función validar
		//ya ha cargado los atributos ID y Nombre:
		$_SESSION["idUsuario"] = $id;
		$_SESSION["nombreUsuario"] = $obj->getNombre();
		//Redirigimos a la intranet
		$pagina = "../views/PrincipalV.php";
	} else {
		$pagina="../views/LoginV.php?msg=Login incorrecto";
	}
	header('Location: ' . $pagina);
} catch (Exception $e) {
	$msg=$e->getMessage();
	echo $msg;
}
?>