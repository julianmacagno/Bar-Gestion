<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href="abrir.css" rel="stylesheet" type="text/css">
	<title>Abrir mesa</title>

	<script type="text/javascript">
			
			//modifica el value del input "costo" con los valores de los menus seleccionados
			function actualizar(){
				
				// Obtener la referencia a la lista
				var lista = document.getElementById("menu");
				 
				// Obtener el índice de la opción que se ha seleccionado
				var indiceSeleccionado = lista.selectedIndex;
				
				// Con el índice y el array "options", obtener la opción seleccionada
				var opcionSeleccionada = lista.options[indiceSeleccionado];
				 
				// Obtener el valor y el texto de la opción seleccionada
				var valorSeleccionado = opcionSeleccionada.value;

				//convertimos a int las variables
				var menuSeleccionado = parseInt(valorSeleccionado);
				var total = parseInt(document.getElementById("costo").value);

				total+=menuSeleccionado;

				//modificamos el value del campo costo
				document.getElementById("costo").value = total;

				// alert("Opción seleccionada: " + textoSeleccionado + "\n Valor de la opción: " + valorSeleccionado + "\n Valor del costo: " + costo.value);
			}
	</script>
</head>

<body>
	<!-- Formulario a cargar -->
	<form method="post" name="formulario" action="comanda.php">
		
		<!-- Lista de mesas -->
		<select name="Mesa" id="mesa">
			<option value="-1">Elija una mesa</option>
		
		<?php 		
			include 'connect.php';
			$sql = "SELECT * FROM `mesas` WHERE `mesas_disponible` = 1";;
			$rs = $bdmotor->query($sql);
			while ($row=$rs->fetch_row())
			{
				echo "<option value=\"$row[0]\"> $row[1]</option>";
			}
		?>
		</select>

		<!-- Lista de mozos -->
		<select name="Mozo" id="mozo">
			<option value="-1">Elija un mozo</option>
		
		<?php 		
			include 'connect.php';
			$sql = "SELECT * FROM `mozos`";
			$rs = $bdmotor->query($sql);
			while ($row=$rs->fetch_row())
			{
				echo "<option value=\"$row[0]\"> $row[1]</option>";
			}
		?>
		</select>
		
		<!-- Lista de menus -->
		<select name="Menu" id="menu">
			<option value="-1">Elija un menu</option>
		
		<?php 		
			include 'connect.php';
			$sql = "SELECT * FROM `menus`";
			$rs = $bdmotor->query($sql);
			while ($row=$rs->fetch_row())
			{
				echo "<option value=\"$row[2]\"> $row[1] </option>";
				// echo "<option type=\"hidden\" value=\"$row[2]\"> $row[2] </option>";
			}
		?>
		</select>

		<!-- Botones de sumar, campo con el costo y el submit del formulario -->
		<button type="button" id="sumar" name="sumar" onclick="actualizar()"> Sumar </button>
		<input type="number" id="costo" name="Costo" value="0">
		<input type="submit" name="comanda" value="Nueva Comanda">
	</form>

		<a href=\"index.php?\"> Volver al menu </a>
</body>
</html>