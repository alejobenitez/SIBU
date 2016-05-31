<?php
	include ("../Negocio/ConexionMySQL.php");
	session_start();
	session_set_cookie_params(0);
	
	if(!isset($_SESSION['User'])){
		//header ("Location: ../view/login.html");
		echo 'No tiene permiso para ver esta pagina.'; 
		exit; 
	}
	else
	{
		if($_SESSION['type']!="2")
		{	 
			//header('HTTP/1.0 401 Unauthorized'); 
			echo 'No tiene permiso para ver esta pagina.'; 
			exit; 
		} 
	}

	$query = "SELECT * FROM usuario WHERE CORREO='".$_SESSION['User']."'";
	$result = mysqli_query($conex,$query);
    $Results = mysqli_fetch_array($result);

	if(count($Results)>=1)
    {
		$usuario = $Results["NOMBRE"]." ".$Results["APELLIDO"];
	}

    function Menu(){
        global $usuario;
        echo "<div class='menu'>";
        echo $usuario;
        echo "<a href='../Negocio/logout.php'> Cerrar sesión </a>";
        echo "</div>";
	}

?>