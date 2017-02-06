<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href="index.css" rel="stylesheet" type="text/css">
	<title> Bar Gestion </title>
</head>

<!-- Funcion que muestra la hora usando javascript -->
<SCRIPT LANGUAGE="JavaScript">

	function TimeOutfunc() {

	timeout = window.setTimeout("TimeOutfunc()", 1000);
	var today = new Date();
	document.forms[0].elements[0].value = today.toString();
	}

</SCRIPT>

<body ONLOAD="timeout = setTimeout('TimeOutfunc();',1000);">

	<nav>

		<!-- este formulario es la hora-->
		<form>
			<span id="hora"> <input TYPE="text" NAME="disp" VALUE="" SIZE="18"> </span>
		</form>

		<!-- Este es el boton desplegable. -->
		<div id="header">
			<ul class="nav">
				<li><a href="">Administrar</a>
					<ul>
						<li><a href="mozos.php">Mozos</a></li>
						<li><a href="mesas.php">Mesas</a></li>
						<li><a href="menus.php">Menus</a></li>
					</ul>
				<li>
			</ul>
		</div>
	</nav>
	


	<div class="content">
		<h1> Bar Gestion. </h1>

		<!-- Dos imagenes "linkeadas" para abrir y cerrar una mesa -->
		<a href="abrir.php"><img src="abrir.png" border="0"></a>
		<a href="cerrar.php"><img src="cerrar.png" border="0"></a>

		<?php
			include 'connect.php';
			
			// consultas sql para las dos mesas, si estan disponibles o no
			$sql1 = " SELECT * FROM `mesas` WHERE `mesas_disponible` = 1 ";
			$sql2 = " SELECT * FROM `mesas` WHERE `mesas_disponible` = 0 ";

			//metemos las consultas en un vector para ahorrar codigo
			$consulta = array ($sql1 , $sql2);
			
			//usamos un for para el vector anterior
			for($i=0; $i<2;$i++)
			{
				$rs=$bdmotor->query($consulta[$i]);

				if($cant=mysqli_num_rows($rs))
				{
					//dibujamos la tabla
					echo "<div style=\"width:50%; float:left;\"> <table>
					<tr> 
			 			<td> Id de mesa </td>
			 		 	<td> Numero de mesa </td>
			 		 	<td> Disponibilidad </td>
			 		 	<td> Id de mozo </td>
			 		<tr>";
				
					//con sus respectivos datos
					while ($row = $rs->fetch_array(MYSQLI_ASSOC))
				 	{
				 		echo 
				 		"<tr> 
				 			<td>".$row["mesas_id"]."</td>
				 		 	<td>".$row["mesas_numero"]."</td>
				 		 	<td>".$row["mesas_disponible"]."</td>
				 		 	<td>".$row["mesas_id_mozo"]."</td>
				 		 <tr>";
				 	}

				 	echo "</table> </div> ";
				}

				else
				{
					echo "La base de datos esta vacia.";
				}
			}

			
		?>

		<footer style="width:100%; float:left;">
			<p id="info1">Programadores: Julian Macagno.</p>
			<p id="info2">Lucas Lo Preiato.</p>
			<p id="universidad">Universidad Blas Pascal. </p>
		</footer>
	</div>
</body>

