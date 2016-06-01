<?php
include ("ConexionMySQL.php");

session_start();
session_set_cookie_params(0);	
if(isset($_POST['correo']))
{          
        $email = mysqli_real_escape_string($conex,$_POST['correo']);
        $password = mysqli_real_escape_string($conex,$_POST['clave']);
        $strSQL = mysqli_query($conex,"SELECT * FROM usuario WHERE CORREO='".$email."' AND CONTRASENA='".md5($password)."'");
        $Results = mysqli_fetch_array($strSQL);
        if(count($Results)>=1)
        {
            $_SESSION['User'] = $Results["CORREO"];
			$_SESSION['type'] = $Results["ID_PERFIL"];
			if ($Results["ID_PERFIL"]==2)
			{
				header( "location:../Presentacion/bienvenido.php" );
			}
			else
			{
				if ($Results["ID_PERFIL"]==1)
				{
					header( "location:../Presentacion/administrador.php" );
				}
			}
        }
        else
        {
            echo  "Nombre de usuario o contrasena no validos!!";
			session_destroy();
			header( "refresh:3; url=../Presentacion/login.php" );
        }        
}
	
?>