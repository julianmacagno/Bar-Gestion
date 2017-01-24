<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href="comanda.css" rel="stylesheet" type="text/css">
	<title> Comanda </title>
</head>
<body>

	<?php
		include "connect.php";

		if($_POST)
		{
			//parametros del formulario
			$mesa=$_POST["Mesa"];
			$mozo=$_POST["Mozo"];
			$costo=$_POST["Costo"];

			//echo "Mesa".$mesa."Mozo".$mozo."Costo".$costo;

			$sql = "UPDATE `mesas`
					SET `mesas_disponible` = '0'
					WHERE `mesas`.`mesas_id` = $mesa";

			$rs = $bdmotor->query($sql);

			if(!$rs)
			{
				die("Error de SQL consulta 1: ".$bdmotor->connect_errno);
			}
			
			else
			{
				echo "Su consulta 1 ha sido realizada con exito.";
			}	
			
			$sql = "INSERT INTO `comandas` 
			(
				`comandas_id`,
				`comandas_total`,
				`comandas_id_mozo`
			)

			VALUES
			(
				NULL,
				$costo,
				$mozo
			)";


			$rs = $bdmotor->query($sql);

			if(!$rs)
			{
				die("Error de SQL consulta 2: ".$bdmotor->connect_errno);
			}
			
			else
			{
				echo "Su consulta 2 ha sido realizada con exito.";
			}

			echo "<a href=\"index.php?\"> Volver al menu </a>";
			//$rs->close();
		}
		
		$bdmotor->close();
	
	?>

</body>
</html>