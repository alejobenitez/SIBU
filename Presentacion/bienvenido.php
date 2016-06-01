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
                              LIMIT 6";
                    $result = mysqli_query($conex,$query);

                    if(mysqli_num_rows($result)>=1)
                    {

                        while($Results = mysqli_fetch_array($result))
                        {
                            $promedio2 = ($Results["PROMEDIO"] * 100) / 5;
                            echo "<li><a href='calificacion.php?codMaterial=".$Results['COD_MATERIAL']."' title='' target='_self'><img src='../Datos/imgMaterial/".$Results['RUTA_IMAGEN'].".jpg' width='124' height='160' alt='".$Results['TITULO']."'/><div class='rating_bar'><div  class='rating' style='width:" .$promedio2. "%'></div></div>".$Results['TITULO']."</a></li>";

                        }
                        echo "<div class='rating_bar'>";
                        /*if(count($Results5)>=1) {
                            if ($Results5['COD_MATERIAL'] == $Results['COD_MATERIAL']) {
                                $promedio2 = ($Results5["PROMEDIO"] * 100) / 5;
                                echo "<div  class='rating' style='width:" .$promedio2. "%'></div>";
                                $Results5 = mysqli_fetch_array($result5);
                            }
                        }*/
                        echo "</div>";
                        
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

            <form action="" method="GET">
                <table>
                    <tr>
                        <th colspan="5"><h2>Filtrar Contenido</h2></th>
                    </tr>
                    <tr>
                        <th>
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
                        </th>
                        <th>
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
                        </select>
                        </th>
                        <th>
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
                        </th>
                        <th>

                            <select onchange="this.form.submit()" name="calificacion">
                                <option value="" selected>-- Todas -- </option>
                                <?php

                                $queryCali = "SELECT * FROM calificacion";
                                $resultCali = mysqli_query($conex,$queryCali);

                                if(mysqli_num_rows($resultCali)>=1)
                                {

                                    while($Results = mysqli_fetch_array($resultCali))
                                    {
                                        echo "<option value='".$Results['ID_CALIFICACION']."'";
                                        if(isset($_GET['calificacion']))
                                        {
                                            if( $codCalificacion== $Results['ID_CALIFICACION'])
                                            {
                                                echo "selected='selected'";
                                            }
                                        }
                                        echo ">".$Results['DESCRIPCION']."</option>";
                                    }

                                    echo "</select>";


                                }
                                ?>
                            </select>
                        </th>
                        <th>
                            <a href='../Presentacion/bienvenido.php' class ='button'> Reiniciar Filtro </a></td>

                        </th>
                    </tr>
                </table>
            </form>
                        <?php


                        $query4 = "SELECT * FROM material_universitario INNER JOIN material ON material_universitario.COD_MATERIAL = material.COD_MATERIAL";
                        $filtros="0";
                        if(isset($_GET['tema'],$_GET['universidad'],$_GET['calificacion'],$_GET['tipoMaterial'])){
                        if(($_GET['tema']!="") OR ($_GET['universidad']!="") OR ($_GET['calificacion']!="") OR ($_GET['tipoMaterial']!="")) {
                            $query4 = $query4 . " WHERE ";
                        }
                            if($_GET['calificacion']!=""){
                                $query4="SELECT 
                                        DISTINCT material_universitario.COD_MATERIAL, material.TITULO, material.RUTA_IMAGEN
                                        FROM material_universitario 
                                        INNER JOIN material ON material_universitario.COD_MATERIAL = material.COD_MATERIAL 
                                        INNER JOIN calif_material ON material_universitario.COD_MATERIAL = calif_material .COD_MATERIAL ";
                                $query4=$query4." WHERE calif_material.ID_CALIFICACION=".$_GET['calificacion'];
                                $filtros=1;
                            }
                            if ($_GET['universidad']!=""){
                                if($filtros>0){
                                    $query4=$query4. " AND ";
                                }
                                $filtros++;
                                $query4=$query4. " ID_UNIVERSIDAD=".$_GET['universidad'];
                            }
                            if ($_GET['tema']!=""){
                                if($filtros>0){
                                    $query4=$query4. " AND ";
                                }
                                $filtros++;
                                $query4=$query4. " ID_TEMA=".$_GET['tema'];
                            }
                            if ($_GET['tipoMaterial']!=""){
                                if($filtros>0){
                                    $query4=$query4. " AND ";
                                }
                                $filtros++;
                                $query4=$query4. " 	ID_TIPO_MATERIAL=".$_GET['tipoMaterial'];
                            }
                            $result4 = mysqli_query($conex,$query4);
                            if(mysqli_num_rows($result4)>=1) {
                                
                                while ($Results = mysqli_fetch_array($result4)) {

                                    $query5 = "SELECT material.TITULO,material.RUTA_IMAGEN,calif_material.COD_MATERIAL, AVG(calif_material.ID_CALIFICACION) AS PROMEDIO
                                               FROM calif_material INNER JOIN material ON calif_material.COD_MATERIAL = material.COD_MATERIAL
                                               WHERE calif_material.COD_MATERIAL=".$Results['COD_MATERIAL'];

                                    $result5 = mysqli_query($conex,$query5);
                                    $Results5 = mysqli_fetch_array($result5);

                                    echo "<div class='galeria'>";
                                    echo "<a href='calificacion.php?codMaterial=" . $Results['COD_MATERIAL'] . "' title='' target='_self'>";
                                    echo "<img width='124' height='160'  src='../Datos/imgMaterial/" . $Results['RUTA_IMAGEN'] . ".jpg' alt='" . $Results['TITULO'] . "'>";

                                    //echo "<div class='desc'>".$Results['TITULO']."</div>";
                                    echo "<div class='rating_bar'>";
                                   // asdf$promedio = ($Results5["PROMEDIO"] * 100) / 5;
//asdfecho "<a href='calificacion.php?codMaterial=".$Results['COD_MATERIAL']."' title='' target='_self'><img src='../Datos/imgMaterial/".$Results['RUTA_IMAGEN'].".jpg' width='124' height='160' alt='".$Results['TITULO']."'/><div class='rating_bar'><div  class='rating' style='width:" .$promedio2. "%'></div></div>".$Results['TITULO']."</a>";
                                    if(count($Results5)>=1) {
                                        $promedio = ($Results5["PROMEDIO"] * 100) / 5;
                                        echo "<div  class='rating' style='width:" .$promedio. "%'></div>";
                                    }
                                    echo "</div>";
                                    echo $Results['TITULO'] ."</a>";
                                    echo "</div>";


                                }
                            }
                        }
                        ?>

        </div>
        <?php //include 'footer.html'; ?>
    </div>
    </body>
</html>