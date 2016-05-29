<?php
	$nombreUsuario=$_POST['nombre'];
	$apellidoUsuario=$_POST['apellido'];
	$correoUsuario=$_POST['correo'];
	$pswUsuario=$_POST['clave1'];
	$perfilUsuario=$_POST['perfil'];
	//$Operacion=$_POST['Operacion'];

	include ("ConexionMySQL.php");
	
	$query = "SELECT CORREO FROM usuario where CORREO='".$correoUsuario."'";

	$result = mysqli_query($conex,$query);
	$numResults = mysqli_num_rows($result);
	if($numResults>=1)
	{
		echo "El correo ".$correoUsuario." ya existe!!";
		$conex->close();
		header( "refresh:3; url=../Presentacion/registro.php" );
	}
	else
	{	
		mysqli_query($conex,"INSERT INTO usuario VALUES('$correoUsuario','".$nombreUsuario."','".$apellidoUsuario."','".md5($pswUsuario)."','".$perfilUsuario."')");
		echo "El usuario se ha creado con exito!!";
		$conex->close();
		header( "refresh:3; url=../Presentacion/login.php" );
	}

?>
