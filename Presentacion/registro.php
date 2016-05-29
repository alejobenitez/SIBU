<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title> SIBU - Registro </title>
        <?php include 'header.html'; ?>
    </head>
    <body>
    <div id="wrapper">
        <div id="header"></div>
        <div id="content">

        <form class="basic-grey" name="registro" method="POST" action="..\Negocio\insertarUsuario.php" onSubmit="return validar_Clave()">
            <h1> Registro </h1>
                <input name="correo" type="email" size="65" class="login-input" placeholder="Correo electrónico" required/>
                <input name="nombre" type="text" size="60" class="login-input" placeholder="Nombre(s)" required />
                <input name="apellido" type="text" size="60" class="login-input" placeholder="Apellido(s)" required />

                <input name="clave1" type="password" size="30" class="login-input" placeholder="Contraseña minímo 8 caracteres" required /><br><br>

                <input name="clave2" type="password" size="30" class="login-input" placeholder="Repita contraseña" required /><br><br>
                <input type="hidden" name="perfil" value="2">
                <input type="submit" value="Registrarse" class="login-submit">
                <p class="login-help"><a href="login.php">Ya tienes una cuenta? Entra aquí</a></p>
                <p class="login-help"><a href="inicio.php">Volver al inicio</a></p>
        </form>
        </div>
            <?php include 'footer.html'; ?>
     </div>
    </body>
</html>
