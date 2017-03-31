<?php
	$server='localhost';
	$bduser='root';
	$bdpass='';
	$bdname='bar_db';
	$bdmotor = new mysqli($server,$bduser,$bdpass,$bdname);
	if($bdmotor->connect_errno)
	{
		die("Error de SQL: ".$bdmotor->connect_errno);
	}
?>
