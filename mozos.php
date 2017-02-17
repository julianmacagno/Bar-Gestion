<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href="mesas.css" rel="stylesheet" type="text/css">
	<title>Administrar mozos</title>
</head>
<body>

	<?php 

		include "connect.php";

		//Seleccionamos toda la tabla de mozos
		$sql = "SELECT * FROM `mozos`";
		$rs = $bdmotor->query($sql);

		if($cant=mysqli_num_rows($rs))
		{
			//y la mostramos entera
			echo "<table>
				<tr> 
		 			<td> Id del mozo </td>
		 		 	<td> Nombre del mozo </td>
		 		 	<td>  </td>
		 		<tr>";
							
			while ($row = $rs->fetch_array(MYSQLI_ASSOC))
		 	{
		 		$elim = -1;
		 		//con opciones para eliminar menus
		 		echo 
		 		"<tr> 
		 			<td>".$row["mozos_id"]."</td>
		 		 	<td>".$row["mozos_nombre"]."</td>
		 		 	<td><a href=\"admin_mozos.php?id=".$row["mozos_id"]."\"> Eliminar </a></td>
		 		<tr>";
		 	}

		 	echo "</table>";
		}

		else
		{
			echo "La base de datos esta vacia.";
		}

		//o agregar nuevos
	 	echo "<p></p> <a href=\"admin_mozos.php?id=".$elim."\"> Agregar nuevo mozo </a>
	 		  <p></p> <a href=\"index.php?\"> Volver al menu </a>";
	?>

</body>
</html>