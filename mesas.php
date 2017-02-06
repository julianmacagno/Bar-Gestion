<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href="mesas.css" rel="stylesheet" type="text/css">
	<title>Administrar mesa</title>
</head>
<body>

	<?php 

		include "connect.php";

		//Seleccionamos toda la tabla de mesas
		$sql = "SELECT * FROM `mesas`";
		$rs = $bdmotor->query($sql);

		if($cant=mysqli_num_rows($rs))
		{
			//y la mostramos entera
			echo "<table>
				<tr> 
		 			<td> Id de mesa </td>
		 		 	<td> Numero de mesa </td>
		 		 	<td> Disponibilidad </td>
		 		 	<td> Id de mozo </td>
		 		 	<td> Eliminar </td>
		 		<tr>";
							
			while ($row = $rs->fetch_array(MYSQLI_ASSOC))
		 	{
		 		$elim = -1;
		 		//con opciones para eliminar mesas
		 		echo 
		 		"<tr> 
		 			<td>".$row["mesas_id"]."</td>
		 		 	<td>".$row["mesas_numero"]."</td>
		 		 	<td>".$row["mesas_disponible"]."</td>
		 		 	<td>".$row["mesas_id_mozo"]."</td>
		 		 	<td><a href=\"admin_mesas.php?id=".$row["mesas_id"]."\"> Eliminar </a></td>
		 		<tr>";
		 	}

		 	echo "</table>";
		}

		else
		{
			echo "La base de datos esta vacia.";
		}

		//o agregar nuevas
	 	echo "<p></p> <a href=\"admin_mesas.php?id=".$elim."\"> Agregar nueva mesa </a>
	 		  <p></p> <a href=\"index.php?\"> Volver al menu </a>";
	?>

</body>
</html>