<?php include_once('header.php'); ?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" href="../css/style.css">
	</head>

	<body>
		<div class="intranet_content">
		
		<div>
		<h1 id="centrarTexto">LOGIN - Iniciar Sesión </h1>
		<?php if (isset($_GET["msg"])) {
			echo "<p class='error'>" . $_GET["msg"] . "</p>";
		}else if (isset($_GET["msg2"])) {
			echo "<p id='acierto'>" . $_GET["msg2"] . "</p>";
		}
		?>
		<form name="validar" method="post" action="../controllers/loginController.php">
			<p>Introduce tu email:<br/></p>
			<input type="text" name="mail" placeholder="Email" required><br/>
			<p>Introduce tu password:<br/></p>
			<input type="password" name="pass" value="" placeholder="Password..." required><br/>
			<p><input type="submit" value="Validar"></p>
		</form>
		<div id="centrarTexto">
			¿Quieres ser administrador? <a href="RegistroV.php">Apuntate!</a>
		</div>
		</div>
		</div>
	
	
	
	</body>


</html>