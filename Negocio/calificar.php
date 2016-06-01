<?php
	$calificacion=$_POST['calificacion'];
	$codigoMaterial=$_POST['codMaterial'];
	$opinion=$_POST['opinion'];


	include ("ConexionMySQL.php");
	mysqli_query($conex,"INSERT INTO calif_material (OPINION,COD_MATERIAL,ID_CALIFICACION) VALUES('$opinion','.$codigoMaterial.','.$calificacion.')");
	echo "Se ha guardado su opinion con exito!!";
	$conex->close();
	header( "refresh:2; url=../Presentacion/bienvenido.php" );

?>