<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title> SIBU </title>
    
</head>
<body>
    <div id="wrapper">
        <div id="header"><?php include 'header.html'; ?></div>
        <div id="content">
        <form class="basic-grey" name="registro" method="POST" action="..\Negocio\insertarUsuario.php" onSubmit="return validar_Clave()">
            <h1>BIENVENIDO A SIBU</h1>

            Con este proyecto queremos mostrar como la información puede ser compartida por medio de una
            plataforma informática de consultas de libros encontrados en las bibliotecas de las universidades
            de la ciudad de Medellín que permita brindar a los usuarios el manejo ágil y oportuno de la misma.<br><br>
            <a href="login.php" class="btn btn-default vertical-center">Ingresar</a>
        </form>
        </div>
    <?php include 'footer.html'; ?>
    </div>
</body>
</html>