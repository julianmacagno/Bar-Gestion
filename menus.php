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

		//Seleccionamos toda la tabla de menus
		$sql = "SELECT * FROM `menus`";
		$rs = $bdmotor->query($sql);

		if($cant=mysqli_num_rows($rs))
		{
			//y la mostramos entera
			echo "<table>
				<tr> 
		 			<td> Id del menu </td>
		 		 	<td> Nombre del menu </td>
                    <td> Precio </td>
		 		 	<td>  </td>
		 		<tr>";
							
			while ($row = $rs->fetch_array(MYSQLI_ASSOC))
		 	{
		 		$elim = -1;
		 		//con opciones para eliminar menus
		 		echo 
		 		"<tr> 
		 			<td>".$row["menus_id"]."</td>
		 		 	<td>".$row["menus_nombre"]."</td>
                    <td>".$row["menus_precio"]."</td>
		 		 	<td><a href=\"admin_menus.php?id=".$row["menus_id"]."\"> Eliminar </a></td>
		 		<tr>";
		 	}

		 	echo "</table>";
		}

		else
		{
			echo "La base de datos esta vacia.";
		}

		//o agregar nuevos
	 	echo "<p></p> <a href=\"admin_menus.php?id=".$elim."\"> Agregar nuevo menu </a>
	 		  <p></p> <a href=\"index.php?\"> Volver al menu </a>";
	?>

</body>
</html>