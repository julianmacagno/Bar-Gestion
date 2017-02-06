<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href="cerrar.css" rel="stylesheet" type="text/css">
	<title>Abrir mesa</title>
</head>
<body>

	<!-- Formulario a cargar -->
	<form method="post" name="formulario" action="baja.php">
		
		<!-- Lista de mesas -->
		<select name="Mesa" id="mesa">
			<option value="-1">Elija una mesa</option>
		
			<?php 		
				include 'connect.php';
				$sql = "SELECT * FROM `mesas` WHERE `mesas_disponible` = 0";
				$rs = $bdmotor->query($sql);
				while ($row=$rs->fetch_row())
				{
					echo "<option value=\"$row[0]\"> $row[1]</option>";
				}
			?>
		</select>

		<input type="submit" name="cerrar" value="Cerrar Mesa">

	</form>

</body>
</html>