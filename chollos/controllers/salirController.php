<?php
session_start();
include ('../models/MoldeUsuarios.php');
$pagina="PrincipalV.php";
$msg="";
try {
	$obj = new MoldeUsuarios();
	$id=$obj->Desconectarse();
	$pagina="../views/PrincipalV.php";
	header('Location: ' . $pagina);
} catch (Exception $e) {
	$msg=$e->getMessage();
	echo $msg;
}
?>