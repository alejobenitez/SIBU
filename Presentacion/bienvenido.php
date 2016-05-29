<?php
	include ("../Presentacion/usuario.php");
?>
<html lang = "es">
<title>BIENVENIDO</title>
<?php include 'header.html'; ?>
<link rel="stylesheet" type="text/css" href="../Datos/CSS/scroller.css" ></link>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../Datos/js/amazon_scroller.js"></script>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
    
    <div id="wrapper">
        <div id="header"></div>
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
	<?php Menu(); ?>
	<div class='estudiante'>
		<h1> Bienvenido, <?php echo $usuario; ?></h1>
	</div>
        <h2>Mejor Calificados</h2>
        <div id="amazon_scroller1" class="amazon_scroller">
            <div class="amazon_scroller_mask">
            <ul>
            <li><a href='calificacion.php?codMaterial=01&nomMaterial=Libro 01' title="Libro 01" target="_self"><img src="../Datos/imgMaterial/01.jpg" width="124" height="160" alt="Libro 01"/></a></li>
            <li><a href='calificacion.php?codMaterial=02&nomMaterial=Libro 02' title="Libro 02" target="_self"><img src="../Datos/imgMaterial/02.jpg" width="124" height="160" alt="L02"/></a></li>
            <li><a href='calificacion.php?codMaterial=03&nomMaterial=Libro 03' title="Libro 03" target="_self"><img src="../Datos/imgMaterial/03.jpg" width="124" height="160" alt="jQuery: Novice to Ninja"/></a></li>
            <li><a href='calificacion.php?codMaterial=04&nomMaterial=Libro 04' title="Libro 04" target="_self"><img src="../Datos/imgMaterial/04.jpg" width="124" height="160" alt="HTML, XHTML, and CSS, Sixth Edition"/></a></li>
            <li><a href='calificacion.php?codMaterial=05&nomMaterial=Libro 05' title="Libro 05" target="_self"><img src="../Datos/imgMaterial/05.jpg" width="124" height="160" alt="L05"/></a></li>
            <li><a href='calificacion.php?codMaterial=06&nomMaterial=Libro 06' title="Libro 06" target="_self"><img src="../Datos/imgMaterial/06.jpg" width="60" height="60" alt="Head First HTML with CSS & XHTML"/></a></li>
            <li><a href='calificacion.php?codMaterial=07&nomMaterial=Libro 07' title="Libro 07" target="_self"><img src="../Datos/imgMaterial/07.jpg" width="60" height="60" alt="L"/></a></li>
            <li><a href='calificacion.php?codMaterial=08&nomMaterial=Libro 08' title="Libro 08" target="_self"><img src="../Datos/imgMaterial/08.jpg" width="60" height="60" alt="L08"/></a></li>
            </ul>
            </div>
            <ul class="amazon_scroller_nav">
            <li></li>
            <li></li>
            </ul>
            <div style="clear: both"></div>
        </div>

        </div>
        <?php include 'footer.html'; ?>
    </div>
    </body>
</html>