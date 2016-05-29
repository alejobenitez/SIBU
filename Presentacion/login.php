<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title> SITPOLI - Login </title>
        <?php include 'header.html'; ?>
        

    </head>
    <body>
        <form  class="login" method="POST" action = "../controler/login.php">
            <h1> Login </h1>
            <input name="correo" type="email" size="65" class="login-input" placeholder="Correo electrónico" required autofocus/>
            <input name="clave" type="password" size="30" class="login-input" placeholder="Contraseña" required /> <br /> <br />
            <input type="submit" value="Ingresar" class="login-submit">
            <p class="login-help"><a href="registro.php"> No tienes cuenta aún? Registrate </a> </p>
            <p class="login-help"><a href="recordar.php">Recordar contraseña?</a></p>
        </form>
        <footer class="about">
            <?php include 'footer.html'; ?>
        </footer>
    </body>
</html>