<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Agregar Menu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="" rel="stylesheet">
    </head>
    <body>
        <?php

            include 'connect.php';

            $nombre=$_POST["Nombre"];
            $precio=$_POST["Precio"];
            
            $sql= "INSERT INTO `menus` 
            (
                `menus_id`, 
                `menus_nombre`, 
                `menus_precio`
            ) 
            
            VALUES 
            (
                NULL, 
                '$nombre', 
                '$precio'
            )";

            $bdmotor->query($sql);
            
            if($bdmotor->connect_errno)
            {
                die("Error de SQL: ".$bdmotor->connect_errno);
            }
            else 
            {
                echo "<a href=\"index.php?\"> Volver al menu </a>";
            }

        ?>
    </body>
</html>