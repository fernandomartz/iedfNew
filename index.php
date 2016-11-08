<?php
$imgPortada = (rand(1,4));
?>
<!DOCTYPE html>
<html>
<head>
<!-----META----->
<meta charset="UTF-8" />
	<title>S3E :: Partido de la Revolución Democratica</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Estadistica de Elecciones Electorales del Distrito Federal" />
    <meta name="keywords" content="Elecciones Electorales, Elecciones DF, Elecciones Distrito Federal" />
    <meta name="author" content="Namen Neme Macal" />

<!-----STYLESHEETS----->
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/dzyngiri.css" rel="stylesheet" type="text/css">
<link href="css/font/font.css" rel="stylesheet" type="text/css">
</head>

<body>

<!-----DEMO ONLY----->
<h1>
	<img src="images/logo.png" alt="Logo" width="50" height="50" style="vertical-align:middle; padding-right:10px;" title="Logo" />
Sistema Estadistico de Procesos Electorales (SEPE)
</h1>
<h2 align="center"></h2>
<!-----END DEMO ONLY----->

<!-----NAVIGATION----->
<ul id="navigation">

    <li>
        <a href="index.php" class="main">Inicio</a>
    </li>

    <li>
        <a href="#" class="main">Elecciones</a>
        <div class="sub-nav-wrapper"><ul class="sub-nav">
<!--            <li><a href="#">Fuente de Datos</a></li> -->
            <li><a href="eleccionesMapa.php">Mapa Tematico</a></li>
            <li><a href="redistritacion.php">Redistritación</a></li>
        </ul></div>
    </li>

    <li>
      <a href="#" class="main">Servicios</a>
    </li>

    <li>
      <a href="#" class="main">Programas</a>
    </li>

    <li>
      <a href="#" class="main">Contactanos</a>
    </li>

    <li>
      <a href="#" class="main">Ayuda</a>
    </li>

</ul>
<!-----END NAVIGATION----->

<center>
<div style="background-color:#FFF; width:800px; margin-top:10px; border:solid; border-color:#000;"> <img src="images/cuadro/cuadros0<?php echo $imgPortada; ?>.png"></div>
</center>

<!-- dzyngiri bottom bar -->
    <div class="dzyngiri-bottom">
    	<strong>@McAllsoftware.com</strong><span class="right">
    			<img src="images/logo.png" alt="Logo" width="50" height="50" style="vertical-align:middle; padding-right:10px;" title="Logo" />
    	</span>
   	    <div class="clr"></div>
</div>
<!--/ dzyngiri bottom bar -->

</body>
</html>
