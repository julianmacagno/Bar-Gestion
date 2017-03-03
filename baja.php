<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href="baja.css" rel="stylesheet" type="text/css">
	<title> Baja </title>
</head>
<body>

	<?php
		include "connect.php";

		if($_POST)
		{
			//parametros del formulario
			$mesa=$_POST["Mesa"];

			//echo "Mesa".$mesa;

			$sql = "UPDATE `mesas`
					SET `mesas_disponible` = '1'
					WHERE `mesas`.`mesas_id` = $mesa";

			$rs = $bdmotor->query($sql);

			if(!$rs)
			{
				die("Error de SQL consulta 1: ".$bdmotor->connect_errno);
			}

			$sql = "UPDATE `mesas`
					SET `mesas_id_mozo` = '0'
					WHERE `mesas`.`mesas_id` = $mesa";

			$rs = $bdmotor->query($sql);

			if(!$rs)
			{
				die("Error de SQL consulta 2: ".$bdmotor->connect_errno);
			}

			echo "<a href=\"index.php?\"> Volver al menu </a>";
			//$rs->close();
		}
		
		$bdmotor->close();
	
	?>

</body>
</html>