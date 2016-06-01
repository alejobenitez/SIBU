<?php
include ("../Negocio/ConexionMySQL.php");

	
if (isset($_POST['correo']))
	{          
	if($_POST['correo']!="")
    {
		$email      = mysqli_real_escape_string($conex,$_POST['correo']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate Cor_Usuario address
        {
            $message =  "Invalid Cor_Usuario address please type a valid Cor_Usuario!!";
        }
        else
        {
            $query = "SELECT CORREO FROM usuario where CORREO='".$email."'";
            $result = mysqli_query($conex,$query);
            $Results = mysqli_fetch_array($result);
            
            if(count($Results)>=1)
            {
                $encrypt = md5(90*13+$Results['CORREO']);
                $to=$email;
                $subject="Recuperacion contrasena";
                $from = 'admin@SIBU.edu.co';
                $body='Hola, <br/> <br/>Su usuario es: '.$email.'<br><br>Haga click aca para restablecer su contrase&ntildea http://sibu.sytes.net/SIBU/Presentacion/restablecer.php?encrypt='.$encrypt.'&action=reset   <br/> <br/>--<br>SIBU<br>Departamento de Sistemas.';
                $headers = "From: SIBU<" . strip_tags($from) . ">\r\n";
                $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                
                mail($to,$subject,$body,$headers);
				
				echo "El link para restablecer la contrasena fue enviado a su direccion de correo.";
				$conex->close();
				header( "refresh:3; url=../Presentacion/login.php" );

            }
            else
            {
                echo "Cuenta no encontrada, por favor registrese!!";
				$conex->close();
				header( "refresh:3; url=../Presentacion/registro.php" );
            }
        }
    }
}


?>