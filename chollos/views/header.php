<?php session_start();?>
<HTML>
<HEAD>
	<link rel="stylesheet" href="../css/style.css">
</HEAD>
<BODY>
	<div class="intranet_header">	
		<div class="intranet_header_menu">
			<a href="PrincipalV.php">Inicio</a>
			<a href="CategoriaV.php">Categorías</a>
		</div>
		<div class="intranet_header_links">
			<?php 
			if (empty($_SESSION["nombreUsuario"])){
				echo "<a href='' hidden>Gestionar</a>";
				echo "<a href='LoginV.php'>Entrar</a>";
				echo "<a href='' hidden>Salir</a>";					
			}else{
				echo "<a href='LoginV.php' hidden>Entrar</a>";
				echo "<a href='../controllers/salirController.php'>Salir</a>";	
			}
			?>
		</div>
	</div>
</BODY>
</HTML>