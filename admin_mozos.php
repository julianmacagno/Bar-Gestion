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
            $id = $_GET["id"];
            if($id==-1)
            {
                echo "<form method=\"post\" action=\"agregar_mozo.php\">
                        Nombre <input type=\"text\" name=\"Nombre\" value=\"\">
                        <input type=\"submit\" name=\"\" value=\"Agregar\">
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
                    echo "<a href=\"index.php?\"> Volver al menu </a>";
                }
            }
        ?> 

    </body>
</html>