<?php
    include 'connect.php';
    $menu=$_POST['menu'];
    $sql = "SELECT `menus_id` FROM `menus` WHERE `menus_nombre` = $menu";
    $id_menu = $bdmotor->query($sql);
    $sql = "SELECT `comandas_id` FROM `comandas` ORDER BY `comandas_id` DESC LIMIT 1";
    $id_ult_comanda = $bdmotor->query($sql);
    $id_ult_comanda = $id_ult_comanda + 1;
    $sql = "INSERT INTO `personas_atendidas` 
            (
                `personas_atendidas_id`, 
                `personas_atendidas_tiempo`, 
                `personas_atendidas_id_comandas`, 
                `personas_atendidas_id_menus`
            ) 
            
            VALUES 
            (
                NULL, 
                NULL, 
                '$id_ult_comanda', 
                '$id_menu'
            )";
        $rs = $bdmotor->query($sql);
?>