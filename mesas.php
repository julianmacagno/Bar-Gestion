<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href="mesas.css" rel="stylesheet" type="text/css">
	<title>Administrar mesas</title>
</head>
<body>

<h1>Administrar Mesas</h1>
	<?php 
		include "connect.php";
		//Seleccionamos toda la tabla de mesas
		$sql = "SELECT * FROM `mesas`";
		$rs = $bdmotor->query($sql);
		if($cant=mysqli_num_rows($rs))
		{
			//y la mostramos entera
			echo "<table>
				<tr class='titulos-tabla'> 
		 			<td> Id de mesa </td>
		 		 	<td> Numero de mesa </td>
		 		<tr>";
							
			while ($row = $rs->fetch_array(MYSQLI_ASSOC))
		 	{
		 		echo 
		 		"<tr class='tabla'> 
		 			<td class='c1'>".$row["mesas_id"]."</td>
		 		 	<td class='c2'>".$row["mesas_numero"]."</td>
		 		<tr>";
		 	}
		 	echo "</table>";
		}
		else
		{
			echo "La base de datos esta vacia.";
		}
		$var1 = -1;
		$var2 = -2;
		//y agregamos opciones para agregar o eliminar mesas
	 	echo "<a href=\"admin_mesas.php?id=".$var1."\" class='bAgregar'> Agregar nueva mesa </a>
		 	  <a href=\"admin_mesas.php?id=".$var2."\" class='bEliminar'> Eliminar una mesa </a>
	 		  <a href=\"index.php?\" class='bVolver'> Volver al menu </a>";
	 		  
		//COLOCAR ESTOR 3 LINKS AL COSTADO DE LA TABLA. TRABAJAR CON CSS
	?>

</body>
</html>