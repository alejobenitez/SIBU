<?php

	include ("../Presentacion/usuario.php");
	$codigoMaterial=$_GET['codMaterial'];
    $nombreMaterial=$_GET['nomMaterial'];

?>

<html lang="es">
<head>
    <meta charset="utf-8" />
    <title> SIBU - Calificacion </title>
    <link rel="stylesheet" type="text/css" href="../Datos/CSS/estrellas.css" ></link>
    <?php include 'header.html'; ?>


</head>
<body>
<form  class="login" method="POST" action = "../Negocio/calificar.php">
    <h1> Calificacion </h1>
    <h2><?php echo $nombreMaterial; ?></h2><br>
    <img src="../Datos/imgMaterial/<?php echo $codigoMaterial.".jpg";?>" width="124" height="160" alt="<?php echo $codigoMaterial;?>" align="left"/>

    Descripcion:<br>
    bla bla bla bla <br clear="all">

    <p class="clasificacion" align="left">
        <input id="radio1" type="radio" name="calificacion" value="5">
            <label for="radio1">★</label>
        <input id="radio2" type="radio" name="calificacion" value="4">
            <label for="radio2">★</label>
        <input id="radio3" type="radio" name="calificacion" value="3">
            <label for="radio3">★</label>
        <input id="radio4" type="radio" name="calificacion" value="2">
            <label for="radio4">★</label>
        <input id="radio5" type="radio" name="calificacion" value="1">
            <label for="radio5">★</label>
    </p>
    Resena:<br>
    bla bla bla bla <br>
    Opinion:<br>
    <textarea name="opinion" rows="4" cols="50"></textarea>
    <br>
    <input type="submit" value="Enviar" class="login-submit">
</form>
<footer class="about">
    <?php include 'footer.html'; ?>
</footer>
</body>
</html>
