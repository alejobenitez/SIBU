<?php

    if(isset($_GET['universidad']))
    {
        $codUniversidad=$_GET['universidad'];
    }

    if(isset($_GET['tipoMaterial']))
    {
        $codTipoMaterial=$_GET['tipoMaterial'];
    }
    if(isset($_GET['tema']))
    {
        $codTema=$_GET['tema'];
    }
    if(isset($_GET['calificacion']))
    {
        $codCalificacion=$_GET['calificacion'];
    }
	include ("../Presentacion/usuario.php");

?>

<html lang = "es">
<title>BIENVENIDO</title>
<link rel="stylesheet" type="text/css" href="../Datos/CSS/scroller.css" ></link>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../Datos/js/amazon_scroller.js"></script>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    </head>
    <body>
    
    <div id="wrapper">
        <div id="header"><?php include 'header.html'; ?></div>
        <div id="content">
            <script language="javascript" type="text/javascript">

                $(function() {
                    $("#amazon_scroller1").amazon_scroller({
                        scroller_title_show: 'enable',
                        scroller_time_interval: '4000',
                        scroller_window_background_color: "#CCC",
                        scroller_window_padding: '10',
                        scroller_border_size: '1',
                        scroller_border_color: '#000',
                        scroller_images_width: '124',
                        scroller_images_height: '160',
                        scroller_title_size: '12',
                        scroller_title_color: 'black',
                        scroller_show_count: '6',
                        directory: '../Datos/Images'
                    });
                });
            </script>

            <h1>BIENVENIDO A SIBU</h1>
            <?php Menu(); ?>

            <h2>Mejor Calificados</h2>
            <div id="amazon_scroller1" class="amazon_scroller">
                <div class="amazon_scroller_mask">
                <ul>
                    <?php
                    $query = "SELECT material.TITULO,material.RUTA_IMAGEN,calif_material.COD_MATERIAL, AVG(calif_material.ID_CALIFICACION) AS PROMEDIO
                              FROM calif_material INNER JOIN material ON calif_material.COD_MATERIAL = material.COD_MATERIAL
                              GROUP BY COD_MATERIAL
                              ORDER BY SUM(ID_CALIFICACION) DESC
                              LIMIT 5";
                    $result = mysqli_query($conex,$query);

                    if(mysqli_num_rows($result)>=1)
                    {

                        while($Results = mysqli_fetch_array($result))
                        {
                            //echo $Results['TITULO'];
                            echo "<li><a href='calificacion.php?codMaterial=".$Results['COD_MATERIAL']."' title='".$Results['TITULO']."' target='_self'><img src='../Datos/imgMaterial/".$Results['RUTA_IMAGEN'].".jpg' width='124' height='160' alt='".$Results['TITULO']."'/></a></li>";

                        }

                    }

                    ?>

                </ul>
                </div>
                <ul class="amazon_scroller_nav">
                <li></li>
                <li></li>
                </ul>
                <div style="clear: both"></div>
            </div>

                <form action="" method="GET" class="basic-grey">
                    <table>
                        <tr>
                            <td><h2>Filtrar Contenido</h2></td>
                            </tr>
                        <tr>
                            <td>
                    <select onchange="this.form.submit()" name="universidad">
                        <option value="" selected>-- Universidad -- </option>
                        <?php

                        $query1 = "SELECT * FROM universidad ORDER BY NOMBRE ASC ";
                        $result1 = mysqli_query($conex,$query1);

                        if(mysqli_num_rows($result)>=1)
                        {

                            while($Results = mysqli_fetch_array($result1))
                            {
                                echo "<option value='".$Results['ID_UNIVERSIDAD']."'";
                                if(isset($_GET['universidad']))
                                {
                                    if( $codUniversidad== $Results['ID_UNIVERSIDAD'])
                                    {
                                        echo "selected='selected'";
                                    }
                                }
                                echo ">".$Results['NOMBRE']."</option>";
                            }

                            echo "</select>";


                        }
                        ?>
                    </select>
                            </td>
                    <td>
                    <select onchange="this.form.submit()" name="tipoMaterial">
                        <option value="" selected>-- Tipo de Material -- </option>
                        <?php

                        $query2 = "SELECT * FROM tipo_material ORDER BY NOMBRE ASC ";
                        $result2 = mysqli_query($conex,$query2);

                        if(mysqli_num_rows($result2)>=1)
                        {

                            while($Results = mysqli_fetch_array($result2))
                            {
                                echo "<option value='".$Results['ID_TIPO_MATERIAL']."'";
                                if(isset($_GET['tipoMaterial']))
                                {
                                    if( $codTipoMaterial== $Results['ID_TIPO_MATERIAL'])
                                    {
                                        echo "selected='selected'";
                                    }
                                }
                                echo ">".$Results['NOMBRE']."</option>";
                            }

                            echo "</select>";


                        }
                        ?>
                    </select></td>
                                <td>
                    <select onchange="this.form.submit()" name="tema">
                        <option value="" selected>-- Tema/Categoria -- </option>
                        <?php

                        $query3 = "SELECT * FROM tema_categoria ORDER BY NOMBRE ASC ";
                        $result3 = mysqli_query($conex,$query3);

                        if(mysqli_num_rows($result3)>=1)
                        {

                            while($Results = mysqli_fetch_array($result3))
                            {
                                echo "<option value='".$Results['ID_TEMA']."'";
                                if(isset($_GET['tema']))
                                {
                                    if( $codTema== $Results['ID_TEMA'])
                                    {
                                        echo "selected='selected'";
                                    }
                                }
                                echo ">".$Results['NOMBRE']."</option>";
                            }

                            echo "</select>";


                        }
                        ?>
                    </select>
                                </td>
                            <td>
                                <select onchange="this.form.submit()" name="calificacion">
                                    <option value="" selected>-- Calificacion -- </option>
                                    <option value="1">Malo</option>
                                    <option value="2">Regular</option>
                                    <option value="3">Excelente</option>
                                    <option value="4">Muy Bueno</option>
                                    <option value="5">Excelente</option>
                                </select>
                            </td>
                            <td> "<a href='../Presentacion/bienvenido.php'> Reiniciar Filtro </a>";</td>
                        </tr>
                        <?php
                        $query4 = "SELECT * FROM material_universitario INNER JOIN material ON material_universitario.COD_MATERIAL = material.COD_MATERIAL";
                        $filtros="0";
                        if(isset($_GET['tema'],$_GET['universidad'],$_GET['calificacion'],$_GET['tipoMaterial'])){
                            $query4=$query4. " WHERE ";
                            if($_GET['tema']!=""){
                                $query4=$query4. " ID_TEMA=".$_GET['tema'];
                                $filtros=1;
                            }
                            if ($_GET['universidad']!=""){
                                if($filtros>0){
                                    $query4=$query4. " AND ";
                                }
                                $filtros++;
                                $query4=$query4. " ID_UNIVERSIDAD=".$_GET['universidad'];
                            }
                            if ($_GET['calificacion']!=""){
                                if($filtros>0){
                                    $query4=$query4. " AND ";
                                }
                                $filtros++;
                                $query4=$query4. " ID_CALIFICACION=".$_GET['calificacion'];
                            }
                            if ($_GET['tipoMaterial']!=""){
                                if($filtros>0){
                                    $query4=$query4. " AND ";
                                }
                                $filtros++;
                                $query4=$query4. " 	ID_TIPO_MATERIAL=".$_GET['tipoMaterial'];
                            }

                        }

                        $result4 = mysqli_query($conex,$query4);
                        if(mysqli_num_rows($result4)>=1)
                        {
                            $i=0;
                            while($Results = mysqli_fetch_array($result4))
                            {
                                if($i==0){
                                    echo "<tr>";
                                }
                                if($i<6){

                                    echo "<td>";
                                    echo "<a href='calificacion.php?codMaterial=".$Results['COD_MATERIAL']."' title=".$Results['TITULO']." target='_self'>";
                                    echo "<img width='124' height='160'  src='../Datos/imgMaterial/".$Results['RUTA_IMAGEN'].".jpg' alt='".$Results['TITULO']."'>";
                                    echo "</a><br>";
                                    echo $Results['TITULO'];
                                    echo "</td>";
                                    $i++;
                                }
                                if($i==6){
                                    echo "</tr>";
                                    $i=0;

                                }

                            }
                        }


                        ?>

                    </table>
                </form>
            </table>
        </div>
        <?php include 'footer.html'; ?>
    </div>
    </body>
</html>