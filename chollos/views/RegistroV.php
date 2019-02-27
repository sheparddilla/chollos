<?php include_once('header.php'); ?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="content">
		<h1 id="centrarTexto">REGISTRO</h1>
		<?php if (isset($_GET["msg"])) { ?>
			<div class='error'><?php echo $_GET["msg"]; ?></div>
		<?php }	?>
		<form name="validar" method="post" action="../controllers/registroController.php">
			<p>Introduce tu nombre:</p>
			<input type="text" name="nombre" placeholder="Nombre" required>
			<p>Introduce tu email:</p>
			<input type="text" name="mail" placeholder="Email" required>
			<p>Introduce tu contraseña:</p>
			<input type="password" name="pass" placeholder="Contraseña..." required>
			<p><input type="submit" value="Validar"></p>
		</form>
		<div id="centrarTexto">
			<p>¿Ya eres admin? <a href="LoginV.php">Identifíquese soldado</a></p>
		</div>
	</div>
	
</body>
</html>