<?php include_once('header.php'); ?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Categorías</title>
		<link rel="stylesheet" href="../css/style.css">
		<script src="../jquery-3.3.1.min.js"></script>
	</head>

	<body>
	<div class="intranet_content">
	
	<?php if(!empty($_GET['msg'])){
	echo "<h1>" . $_GET['msg'] . "</h1>";}?>
	
	<div id="containerPadre">
		<p>Inserte o filtre un producto:</p>
	<div id="categorias">
	<!-- con action cuando se pulse el boton del formulario nos redirigira la información a insertarController-->
	<form name="form_insert" method="post" action="../controllers/insertarController.php">
	<label>Categorias: </label>
	<select name="list_categorias"  id="list_categorias_ID">
          <?php
			 require_once ('../models/MoldeCategorias.php');
			 //Para poder acceder a sus funciones tengo que crear un objeto de la clase:
			 $obj = new MoldeCategorias();
			 //Llamo a la funcion listar Categorias para pintarlas en un desplegable:
			 $lista = $obj->Listar();
			 //Recorro el array, y por cada fila pinto un option:
          	 for ($i=0;$i<count($lista);$i++) {
				 $idC = $lista[$i][0];
				 $nombre = $lista[$i][1];
				 echo "<option value='$idC'>$nombre</option>";
			 }
        	 ?>
	</select>	
		<input type="hidden" name="idweb" value="1"/>
		<input type="button" id="filtrarbut"  value="Filtrar"  />
	</div>
	
	
	</div>
			<div>
				<?php if(!isset($_SESSION['nombreUsuario'])){?>
				<input type="text" name="foto" size="35" placeholder="link foto" required hidden>
				<input type="text" name="titulo" placeholder="nombre" required hidden>
				<input type="number" name="precio" placeholder="precio" required hidden>
				<select name="list_estado" id="list_estado_ID" hidden>
					<option value=0> Chollo </option>
					<option value=1> Estándar </option>
					<option value=2> Caro </option>
				</select>
				<input type="text" name="urlAnuncio" placeholder="url del anuncio..." required hidden>
				<input type="submit" class="boton" id="boton2" value="Añadir" hidden>
				
				<?php }else{?>
				
				<input type="text" name="foto" size="35" placeholder="link foto" required>
				<input type="text" name="titulo" placeholder="nombre" required>
				<input type="number" name="precio" placeholder="precio" required>
				<select name="list_estado" id="list_estado_ID">
					<option value=0> Chollo </option>
					<option value=1> Estándar </option>
					<option value=2> Caro </option>
				</select>
				<input type="text" name="urlAnuncio" placeholder="url del anuncio..." required>
				<input type="submit" class="boton" id="boton2" value="Añadir">
				<?php }?>
			</div>
		</form>
	<div id="scroller"><!-- div de la tabla -->
	<table id="tabla">
		<tr>
			<td class="negrazo"></td>
			<td class="negrazo"></td>
			<td class="negrazo">Precio(€)</td>
			<td class="negrazo">¿Chollo?</td>
		</tr>
	<?php
			 require_once ('../models/MoldeAnuncios.php');
			 $editar = 0;
			
			if (isset($_GET["id"])) { //comprobar si se quiere editar el anuncio
				$editar = $_GET["id"];
			}
			 //Para poder acceder a sus funciones tengo que crear un objeto de la clase:
			 $obj = new MoldeAnuncios();
			 //Llamo a la funcion listar Anuncios para pintarlas en un echo:
			 $lista = $obj->ListarWS();
			 $estado="";

			 //Recorro el array, y por cada fila pinto un echo:
          	 for ($i=0;$i<count($lista);$i++) { 
				 $idAnuncio=$lista[$i]["idAnuncio"];//id para distinguir anuncio
				 if ($idAnuncio==$editar) { //Editamos directamente en la fila:
					?>
					<form id="form_update" name="form_update" method="post" action="../controllers/editarController.php?op=1">
					<input type="hidden" name="idAnuncio" value="<?php echo $lista[$i]['idAnuncio']; ?>"/>
						<tr valign="top">
							<td width="15%"><input type="text" name="foto" value="<?php echo $lista[$i]["foto"]; ?>"/></td>
							<td width="5%"><input type="text" name="titulo" size="4" value="<?php echo $lista[$i]["titulo"]; ?>"/></td>
							<td width="10%"><input type="text" name="precio" value="<?php echo $lista[$i]["precio"]; ?>"/></td>
							<td width="10%"><select name="list_estado" id="list_estado_ID">
								<option value=0> Chollo </option>
								<option value=1> Estándar </option>
								<option value=2> Caro </option>
							</select></td>
							<td width="10%"><input type="text" name="urlAnuncio" value="<?php echo $lista[$i]["urlAnuncio"]; ?>"/></td>
							<td width="10%"><select name="list_categorias" id="list_categorias_ID">
							  <?php
								 $obj2 = new MoldeCategorias();
								 //Llamo a la funcion listar Categorias para pintarlas en un desplegable:
								 $lista2 = $obj2->Listar();
								 //Recorro el array, y por cada fila pinto un option:
								 for ($a=0;$a<count($lista2);$a++) {
									 $idC = $lista2[$a][0];
									 $nombre = $lista2[$a][1];
									 echo "<option value='$idC'>$nombre</option>";
								 }
								 ?>
								</select>
							</td>
							<td width="10%"><select name="list_wbs_N" id="list_wbs_ID">
							  <?php
								 $obj3 = new MoldeWebAnuncio();
								 //Llamo a la funcion listar Categorias para pintarlas en un desplegable:
								 $lista3 = $obj3->Listar();
								 //Recorro el array, y por cada fila pinto un option:
								 for ($e=0;$e<count($lista3);$e++) {
									 $idW = $lista3[$e][0];
									 $nombre = $lista3[$e][1];
									 echo "<option value='$idW'>$nombre</option>";
								 }
								 ?>
								</select>
							</td>
							
							<!-- A continuación los botones de guardar o cancelar -->
							<td width="1%"><a href="#" onclick="document.form_update.submit();" border="0"><img src="../images/save.png" width="24"/></a></td>
							<td width="1%"><a href="CategoriaV.php" border="0"><img src="../images/cancel.png" width="24"/></a></td>
						</tr>
					</form>
				 <?php }else{
				 if ($lista[$i]["icono"] == 0){
					$estado = "../images/green.png";
				 }else if($lista[$i]["icono"] == 1){
					$estado = "../images/orange.png";
				 }else{
					 $estado = "../images/red.png";
				 }
				 if(isset($_SESSION['nombreUsuario'])){
					 echo "<tr><td><a href='".$lista[$i]["urlAnuncio"]."'><img width='200' height='150' src='".$lista[$i]["foto"]."'/></a></td><td>".$lista[$i]["titulo"]."</td><td>".$lista[$i]["precio"]."</td>
					<td><img src='".$estado."' width='25' height='25'/><a href='../controllers/borrarController.php?op=1&id=". $lista[$i]["idAnuncio"]. "'><img src='../images/delete.png' id='papelera' width='25' height='25' /></a>
					</td></tr>";
				 }else{
					echo "<tr><td><a href='".$lista[$i]["urlAnuncio"]."'><img width='200' height='150' src='".$lista[$i]["foto"]."'/></a></td><td>".$lista[$i]["titulo"]."</td><td>".$lista[$i]["precio"]."</td>
					<td><img id='estado' src='".$estado."' width='25' height='25'/></td></tr>"; 
				 }
			 }
			 }
        	 ?>
	</table>
	</div>
	</div> <!--div container padre -->
	
	<script>
	<!--cuando pulsamos el boton filtrar pasa por filtrarcontroller pasando un parametro id categoria este lo recoge llama al metodo listar anuncia poniendo un where -->
		$("#filtrarbut").click(function (){
			$("#tabla").empty();
			$.ajax({
				type:"POST",
				url:'../controllers/filtrarBusqueda.php?op=1',
				data:{idcat:$("#list_categorias_ID option:selected").val()},
				success: function(respuesta){
					var obj= jQuery.parseJSON(respuesta);
					console.log(obj);
					for(i=0;i<obj.length;i++){
						var estado = "";
						if (obj[i].icono == 0){
							estado = "../images/green.png";
						 }else if(obj[i].icono == 1){
							estado = "../images/orange.png";
						 }else{
							 estado = "../images/red.png";
						 }
						 
						$("#tabla").append("<tr><td><a href='"+obj[i].urlAnuncio+"'><img width='150' height='125' src='"+obj[i].foto+"'/></a></td><td>"+obj[i].titulo+"</td><td>"+obj[i].precio+"</td><td><img src='"+estado+"' width='25' height='25'/></td></tr>");
					}
				},
				error: function() {
					console.log("esto no tira");
				}
				});
		});
	</script>
	</body>
</html>