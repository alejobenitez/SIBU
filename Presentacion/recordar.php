<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title> SITPOLI - Recordar </title>
    </head>
    <body>
    <div id="wrapper">
        <div id="header"><?php include 'header.html'; ?></div>
            <div id="content">
                <script language="java"></script>
                <form  class="basic-grey" method="POST" action="..\Negocio\recordar.php">
                    <h1>Recordar mi clave</h1>
                    <input name="correo" type="email" class="login-input" placeholder="Correo electrónico" required autofocus/><br>
                    <input type="submit" value="Enviar" class="login-submit" />
                    <p class="login-link"><a href="inicio.php">Regresar al inicio</a></p>
                </form>
             </div>
        <?php include 'footer.html'; ?>
    </div>
    </body>
</html>