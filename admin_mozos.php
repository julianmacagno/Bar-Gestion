<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Administrar mozos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="admin_mozos.css" rel="stylesheet">

    <script type="text/javascript">		
		function validar()
		{
			var ok=true;

			if(document.getElementById("agregar").value=="")
			{
				ok=false;
			}

			if(!ok)
			{
				alert("Ingrese el nombre del mozo a agregar.");
			}

			return ok;
		}
	</script>

    </head>
    <body>
    <h1>Administrar Mozos</h1>
    
        <?php
            $id = $_GET["id"];
            if($id==-1)
            {
                echo "<form method=\"post\" action=\"agregar_mozo.php\" onsubmit=\"return validar()\">
                        Nombre <input type=\"text\" name=\"Nombre\" value=\"\" class='nombre' id='agregar'>
                        <input type=\"submit\" name=\"\" value=\"Agregar\" class='boton'>
                      </form>";
            }
            else
            {
                include 'connect.php';
                $sql = "DELETE FROM `mozos` WHERE `mozos`.`mozos_id` = $id";
                $bdmotor->query($sql);
                
                if($bdmotor->connect_errno)
                {
                    die("Error de SQL: ".$bdmotor->connect_errno);
                }
                else 
                {
                    echo "<a class='lEliminar'> Se ha eliminado el mozo con exito! </a>";
                }
            }
        ?> 
    <a href="index.php?" class="bVolver"> Volver al menu </a>
    </body>
</html>