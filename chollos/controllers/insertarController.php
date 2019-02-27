<?php
session_start();
$pagina="../views/CategoriaV.php";
$msg="Insertado";
try{
	
			include_once ('../models/MoldeAnuncios.php');
			$obj = new MoldeAnuncios();//creación del objeto
			
			//recogemos los ids
			$idUsuario = $_SESSION['idUsuario'];
			$idCategoria = $_POST['list_categorias'];
			$idWeb = $_POST['idweb'];
			
			//recogemos los otros valores
			$foto = $_POST['foto'];
			$titulo = $_POST['titulo'];
			$precio = $_POST['precio'];
			$icono = $_POST['list_estado'];
			$urlAnuncio = $_POST['urlAnuncio'];

			//usamos el metodo insertar con los valores recogidos
			$obj->Insertar($foto,$titulo,$urlAnuncio,$precio,$icono,$idUsuario,$idCategoria,$idWeb);
		
	
	
	
	
}catch (Exception $e){
	$msg=$e->getMessage();
	echo $msg;
}
header("Location:$pagina?msg=$msg");

?>