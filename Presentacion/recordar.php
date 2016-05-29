<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title> SITPOLI - Recordar </title>
        <?php include 'header.html'; ?>
    </head>
    <body>
        <form  class="login" method="POST" action="..\Negocio\recordar.php">
            <h1> Recordar mi clave </h1>
            <input name="correo" type="email" class="login-input" placeholder="Correo electrónico" required autofocus/>
            <input type="submit" value="Enviar" class="login-submit" />
            <p class="login-link"><a href="inicio.php">Regresar al inicio</a></p>
        </form>
        <footer class="about">
            <?php include 'footer.html'; ?>
        </footer>
    </body>
</html>