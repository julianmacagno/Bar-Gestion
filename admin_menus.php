<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Administrar Menus</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="admin_menus.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php

            $id = $_GET["id"];
            
            if($id==-1)
            {
                echo "Ingrese un nuevo Menu <p></p>
                    <form action=\"agregar_menu.php\" method=\"post\">
                            Nombre <input type=\"text\" name=\"Nombre\">
                            Precio <input type=\"number\" name=\"Precio\"> 
                            <input type=\"submit\" value=\"Agregar\">
                    </form>";
            }

            else
            {   
                include 'connect.php';
                $sql="DELETE FROM `menus` WHERE `menus`.`menus_id` = $id";
                
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