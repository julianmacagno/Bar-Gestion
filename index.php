<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="index.css" rel="stylesheet" type="text/css">
	<title> Bar Gestion </title>


	<!-- Funcion que muestra la hora usando javascript -->
	<SCRIPT>
		function TimeOutfunc() {
			timeout = window.setTimeout("TimeOutfunc()", 1000);
			var today = new Date();
			document.forms[0].elements[0].value = today.toString();
		}
	</SCRIPT>
</head>

<body ONLOAD="timeout = setTimeout('TimeOutfunc();',1000);">

	<nav>
		<!-- este formulario es la hora-->
			<!-- <form class="reloj" ONLOAD="timeout = setTimeout('TimeOutfunc();',1000);">
			<div id="hora"> <input TYPE="text" NAME="disp" VALUE="" SIZE="18"> </div>
		</form> -->

		<!-- Este es el boton desplegable. -->
		<div id="header">
			<ul class="nav">
				<li><a class= "nav-comun">Administrar</a></li>
					<li class= "nav-especial"><a href="mozos.php">Mozos</a></li>
					<li class= "nav-especial"><a href="mesas.php">Mesas</a></li>
					<li class= "nav-especial"><a href="menus.php">Menus</a></li>
			</ul>
		</div>
	</nav>

	<div class="content">
		<h1>Bar Gestión</h1>

		<!-- Dos imagenes "linkeadas" para abrir y cerrar una mesa -->
		<!--<a href="abrir.php"><img src="abrir.png" border="0"></a>
		<a href="cerrar.php"><img src="cerrar.png" border="0"></a>-->
		<div class="botones">
		<a class="boton1" href="abrir.php">Abrir Mesa</a>
		<a class="boton2" href="cerrar.php">Cerrar Mesa</a>
		</div>
		
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
					echo "<div> <table>
					<tr class='titulos-tabla'> 
						<td> Mesa ID </td>
						<td> Mesa Número </td>
						<td> Disponibilidad </td>
						<td> Mozo ID </td>
					<tr>";
				
					//con sus respectivos datos
					while ($row = $rs->fetch_array(MYSQLI_ASSOC))
					{
						if($row["mesas_disponible"]==1)
						{
							$disp = "Si";
						}
						else
						{
							$disp = "No";
						}
						echo 
						"<tr class='tabla'> 
							<td class='c1'>".$row["mesas_id"]."</td>
							<td class='c2'>".$row["mesas_numero"]."</td>
							<td class='c3'>".$disp."</td>
							<td class='c4'>".$row["mesas_id_mozo"]."</td>
						<tr>";
					}
					echo "</table> </div> ";
				}
				else
				{
					echo "<a class='aux'>La base de datos esta vacía</a>";
				}
			}
			
		?>
	</div>			

	<footer>	
		<p id="alumnos" class="nombres">Julian Macagno - Lucas Lo Preiato </p>
		<p id="separador">~</p>
		<p id="universidad">Universidad Blas Pascal </p>
	</footer>
</body>
</html>