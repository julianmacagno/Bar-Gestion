<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Administrar mozos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="agregar_mozo.css" rel="stylesheet">
    </head>
    <body>
    <h1>Administrar Mozos</h1>
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
                echo "<a class='lAgregar'> Se ha agregado el mozo con exito! </a>";                
            }
        ?>

        <a href="index.php?" class="bVolver"> Volver al menu </a>
    </body>
</html>