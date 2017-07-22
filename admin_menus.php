<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Administrar Menus</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="admin_menus.css" rel="stylesheet" type="text/css">

        <script type="text/javascript">		
            function validar()
            {
                var ok=true;

                if(document.getElementById("nombre").value=="")
                {
                    ok=false;
                }

                if(document.getElementById("precio").value==0)
                {
                    ok=false;
                }

                if(!ok)
                {
                    alert("Algunos campos del formulario no son correctos. Reviselo para continuar.");
                }

                return ok;
            }
	</script>

    </head>
    <body>
    <h1>Administrar Menus</h1>
        <?php
            $id = $_GET["id"];
            
            if($id==-1)
            {
                echo " <p class ='titulo'>Ingrese un nuevo Menu</p>
                    <form action=\"agregar_menu.php\" method=\"post\" onsubmit='return validar()'>
                        <p class='lNombre'> Nombre </p> <input type=\"text\" name=\"Nombre\" id='nombre' value=''>
                        <p class='lPrecio'> Precio </p> <input type=\"number\" name=\"Precio\" id='precio' value='0'> 
                        <input type=\"submit\" value=\"Agregar\" class='bAgregar'>
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
                    echo "<a class='lEliminar' > Se ha eliminado el menu con exito! </a>";
                    echo "<a href=\"index.php?\" class='bVolver'> Volver al menu </a>";
                }
            }
        ?>

    </body>
</ht