<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href="menuss.css" rel="stylesheet" type="text/css">
	<title>Administrar menus</title>
</head>

<body>

	<h1>Administrar Menus</h1>

	<?php 
		include "connect.php";
		//Seleccionamos toda la tabla de menus
		$sql = "SELECT * FROM `menus`";
		$rs = $bdmotor->query($sql);
		if($cant=mysqli_num_rows($rs))
		{
			//y la mostramos entera
			echo "<table>
				<tr class='titulos-tabla'> 
		 			<td> Id del menu </td>
		 		 	<td> Nombre del menu </td>
                    <td> Precio </td>
		 		 	<td>  </td>
		 		<tr>";
							
			while ($row = $rs->fetch_array(MYSQLI_ASSOC))
		 	{
		 		//con opciones para eliminar menus
		 		echo 
		 		"<tr class='tabla'> 
		 			<td class='c1'>".$row["menus_id"]."</td>
		 		 	<td class='c2'>".$row["menus_nombre"]."</td>
                    <td class='c3'>".$row["menus_precio"]."</td>
		 		 	<td ><a  href=\"admin_menus.php?id=".$row["menus_id"]."\" class='bEliminar'> Eliminar </a></td>
		 		<tr>";
		 	}
		 	echo "</table>";
		}
		else
		{
			echo "La base de datos esta vacia.";
		}
		//o agregar nuevos
		$agregar = -1;
		echo "<p></p> <a href=\"admin_menus.php?id=".$agregar."\" class= 'bAgregar'> Agregar nuevo menu </a>
	 	<p></p> <a href=\"index.php?\" class= 'bVolver'> Volver al menu </a>";
	?>

</body>
</html>