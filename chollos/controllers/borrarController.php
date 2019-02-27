<?php
session_start();
$pagina="../views/CategoriaV.php";
$msg="Eliminado con éxito";
$op=$_GET['op'];
try{
	

			include_once ('../models/MoldeAnuncios.php');
			$obj = new MoldeAnuncios();//creación del objeto
			
			//recogemos los ids
			$idAnuncio=$_GET['id'];

			//usamos el metodo borrar con los valores recogidos
			$obj->Eliminar($idAnuncio);
			
	
	
	
	
}catch (Exception $e){
	$msg=$e->getMessage();
	echo $msg;
}
header("Location:$pagina?msg=$msg");

?>