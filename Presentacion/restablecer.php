<?php
    include ("../Negocio/ConexionMySQL.php");

    if(isset($_GET['action']))
    {
        if($_GET['action']=="reset")
        {
            $encrypt = mysqli_real_escape_string($conex,$_GET['encrypt']);
            $query = "SELECT CORREO FROM usuario where md5(90*13+CORREO)='".$encrypt."'";
            $result = mysqli_query($conex,$query);
            $Results = mysqli_fetch_array($result);
            if(count($Results)>=1)
            {
            }
            else
            {
                echo 'Clave invalida por favor intente de nuevo . <a href="..Presentacion/recordar.php">recordar contrasena?</a>';
            }
        }
    }
    elseif(isset($_POST['action']))
    {
        $encrypt      = mysqli_real_escape_string($conex,$_POST['action']);
        $password     = mysqli_real_escape_string($conex,$_POST['password']);
        $query = "SELECT CORREO FROM usuario where md5(90*13+CORREO)='".$encrypt."'";
        $result = mysqli_query($conex,$query);
        $Results = mysqli_fetch_array($result);
        if(count($Results)>=1)
        {
            $query = "update usuario set CONTRASENA='".md5($password)."' where CORREO='".$Results['CORREO']."'";
            mysqli_query($conex,$query);
            echo 'La contrase&ntildea se cambio con exito.';
            header( "refresh:3; url=http://sibu.sytes.net/SIBU/Presentacion/login.php" );
            exit;
            //echo "Su contraseña fue cambiada correctamente!!";
            //header( "refresh:3; url=http://proyectotaller.sytes.net/proyectotaller/proyectoHenry/view/login.html" );
        }
        else
        {
             echo 'Clave invalida por favor intente de nuevo . <a href="..Presentacion/recordar.php">recordar contrasena?</a>';
        }
    }

?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <link rel="stylesheet" type="text/css" href="../public/css/estiloMenu.css" />
        <link rel="stylesheet" type="text/css" href="../public/css/estiloCarga.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>RESTABLECER CONTRASEÑA | SIBU</title>\
        </head>
    <body>
    <div id="wrapper">
        <div id="header"><?php include 'header.html'; ?></div>
        <div id="content">
            <form action="../Presentacion/restablecer.php" method="post" class="basic-grey" id="reset" >
                <h1> RESTABLECER CONTRASEÑA </h1>
                <p><input name="password" type="password" id="password" placeholder="Escriba la nueva contrasena" pattern=".{8,}" required title="8 caracteres como mínimo"></p>
                <p><input name="passwordconf" type="password" id="passwordconf"  placeholder="Escriba de nuevo su contrasena" pattern=".{8,}" required title="8 caracteres como mínimo" onkeyup="check(this)"></p>
                <script type="text/javascript">
                    function check(input) {
                        if (input.value != document.getElementById('password').value) {
                            input.setCustomValidity('Las contraseñas deben coincidir.');
                        } else {
                            input.setCustomValidity('');
                        }
                    }
                    password.onchange = validatePassword;
                    confirm_password.onkeyup = validatePassword;
                </script>
                <p><input name="action" type="hidden" value="<?php echo $encrypt;?>" /></p>
                <p><input type="submit" value="Restablecer contraseña"/></p>
            </form>
        </div>
    
        <?php include 'footer.html'; ?>
    </div>
    </body>
</html>