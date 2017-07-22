<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Administrar mesas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="admin_mesas.css" rel="stylesheet">
    </head>
    
    <body>
    <h1>Administrar Mesas</h1>
        <?php
            include 'connect.php';
            $id=$_GET["id"];
            $sql = "SELECT * FROM `mesas` ORDER BY `mesas_id` DESC LIMIT 1";
            $ultima_mesa = $bdmotor->query($sql);
            if(!$ultima_mesa)
            {
                die("Error de SQL consulta: ".$bdmotor->connect_errno);
            }	
            $row = $ultima_mesa->fetch_row();
            $ultima_mesa = $row[0];

            $mensaje = "";
            //se elige eliminar una mesa. se arma la consulta correspondiente
            if($id==-2)
            {
                $sql = "DELETE FROM `mesas` WHERE `mesas`.`mesas_id` = $ultima_mesa";
                $mensaje = "<a class='lEliminar' > Se ha eliminado una mesa con exito! </a>";
            }        

            //se elige agregar una nueva mesa
            else
            {
                $ultima_mesa = $ultima_mesa + 1;
                $sql = "INSERT INTO `mesas` 
                (
                    `mesas_id`, 
                    `mesas_numero`, 
                    `mesas_disponible`, 
                    `mesas_id_mozo`
                ) 
                    VALUES 
                (
                    $ultima_mesa, 
                    $ultima_mesa, 
                    '1', 
                    '0'
                )";

                $mensaje = "<a class='lAgregar'>Se ha agregado una mesa con exito! </a>";
            }

            $rs = $bdmotor->query($sql);
            
            if(!$rs)
            {
                die("Error de SQL consulta: ".$bdmotor->connect_errno);
            }

            echo $mensaje;            
        ?>

        <a href='index.php?' class="bVolver"> Volver al menu </a>

    </body>
</html>