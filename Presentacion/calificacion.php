<?php

	include ("../Presentacion/usuario.php");
	$codigoMaterial=$_GET['codMaterial'];

?>

<html lang="es">
<head>
    <meta charset="utf-8" />
    <title> SIBU - Calificacion </title>
    <link rel="stylesheet" type="text/css" href="../Datos/CSS/estrellas.css" ></link>

</head>
<body>
    <div id="wrapper">
        <div id="header"><?php include 'header.html'; ?></div>
        <div id="content">
            <h1> Calificacion </h1>
            <?php Menu(); ?>
            <form  class="basic-grey" method="POST" action = "../Negocio/calificar.php">
                <?php
                //$query = "SELECT * FROM material INNER JOIN calif_material ON material.COD_MATERIAL = calif_material.COD_MATERIAL WHERE material.COD_MATERIAL=".$codigoMaterial=$_GET['codMaterial'];
                $query1 = "SELECT * FROM material WHERE material.COD_MATERIAL=".$codigoMaterial=$_GET['codMaterial'];
                $result1 = mysqli_query($conex,$query1);
                $Results = mysqli_fetch_array($result1);

                if(count($Results)>=1)
                {
                    echo "<h2>".$Results["TITULO"]."</h2>";
                }

                ?>
                <img src="../Datos/imgMaterial/<?php echo $Results["RUTA_IMAGEN"].".jpg";?>" width="124" height="160" alt="<?php echo $Results["TITULO"];?>" align="left"/>

                Descripcion:<br>
                <?php echo $Results["DESCRIPCION"]; ?>
                 <br clear="all">

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
                Opinion:<br>
                <textarea name="opinion" rows="4" cols="50"></textarea>
                <br>
                <input type="hidden" name="codMaterial" value="<?php echo $_GET['codMaterial']?>">
                <input type="submit" value="Enviar" class="login-submit"><br><br>
                Opiniones Anteriores:<br><br>
                <?php
                $query2 = "SELECT * FROM calif_material WHERE COD_MATERIAL=".$codigoMaterial=$_GET['codMaterial'];

                $result2 = mysqli_query($conex,$query2);
                if(count($Results)>=1)
                {
                    while($Results = mysqli_fetch_array($result2)) {
                        echo "<div class='line-separator'></div>";
                        echo "<p class='espacioLinea'>";
                        echo $Results["OPINION"]."<br>";
                        echo "</p>";

                    }
                }
                ?>
            </form>

        </div>
        <?php include 'footer.html'; ?>
    </div>
</body>
</html>
