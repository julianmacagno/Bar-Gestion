<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Administrar mozos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="" rel="stylesheet">
    </head>
    <body>
        <?php
           $nombre = $_POST["Nombre"];

           include 'connect.php';
           $sql = "INSERT INTO `mozos`
           (
            `mozos_id`, 
            `mozos_nombre`
            ) 
            
            VALUES 
            (
                NULL, 
                '$nombre'
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