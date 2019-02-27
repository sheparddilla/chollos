<?php
require("../models/MoldeAnuncios.php");
session_start();

$user = new MoldeAnuncios();
$run = $_GET["op"];



		$listado = array();
		$listado = $user->listarAnunciosFilter($_POST["idcat"]);
		
		echo json_encode($listado, JSON_UNESCAPED_UNICODE);
	



?>