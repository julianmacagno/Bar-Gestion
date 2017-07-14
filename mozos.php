<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href="mozos.css" rel="stylesheet" type="text/css">
	<title>Administrar mozos</title>
</head>
<body>
	<h1>Administrar Mozos</h1>
	<?php 
		include "connect.php";
		//Seleccionamos toda la tabla de mozos
		$sql = "SELECT * FROM `mozos`";
		$rs = $bdmotor->query($sql);
		if($cant=mysqli_num_rows($rs))
		{
			//y la mostramos entera
			echo "<table>
				<tr class='titulos-tabla'> 
		 			<td> Id del mozo </td>
		 		 	<td> Nombre del mozo </td>
		 		 	<td>  </td>
		 		<tr>";
							
			while ($row = $rs->fetch_array(MYSQLI_ASSOC))
		 	{
		 		//con opciones para eliminar menus
		 		echo 
		 		"<tr class='tabla'> 
		 			<td class='c1'>".$row["mozos_id"]."</td>
		 		 	<td class=c2>".$row["mozos_nombre"]."</td>
		 		 	<td><a href=\"admin_mozos.php?id=".$row["mozos_id"]."\" class='bEliminar'> Eliminar </a></td>
		 		<tr>";
		 	}
		 	echo "</table>";
		}
		else
		{
			echo "La base de datos esta vacia.";
		}
		$agregar = -1;
		//o agregar nuevos
	 	echo "<p></p> <a href=\"admin_mozos.php?id=".$agregar."\" class='bAgregar'> Agregar nuevo mozo </a>
	 		  <p></p> <a href=\"index.php?\" class='bVolver'> Volver al menu </a>";
	?>

</body>
</html>