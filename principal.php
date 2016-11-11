<?php
session_start();
?>
<?php
$imgPortada = (rand(1,4));
?>
<!DOCTYPE html>
<html>
<head>
    <!--META-->
    <meta charset="UTF-8" />
	<title>SEPE :: 2016</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Estadistica de Elecciones Electorales del Distrito Federal" />
    <meta name="keywords" content="Elecciones Electorales, Elecciones DF, Elecciones Distrito Federal" />
    <meta name="author" content="Namen Neme Macal" />

    <!--STYLESHEETS-->
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/dzyngiri.css"/>
    <link rel="stylesheet" type="text/css" href="css/font/font.css"/>
    <link rel="stylesheet" type="text/css" href="css/metisMenu/metisMenu.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/metisMenu/style.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

</head>
<body>
    <!--DEMO ONLY-->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="col-lg-2 col-sm-3 text-center navbar-header">
            <a class="navbar-brand" href="#">
            <img class="img-circle img-responsive img-center" src="https://www.immobilienscout24.de/anbieter/resources_new/application/profilepage/team/profilbild_bb_avatar_275_275.png" alt="iedf">
            <small><strong></strong></small></a><br>
        </div>
        <div class="col-lg-6 col-sm-1 navbar-header">
            <br><br><br><br>
            <h4><strong class="wrapper wrapper-content animated fadeInRight"><i class="glyphicon glyphicon-qrcode"></i> Sistema Estadistico de Procesos Electorales (SEPE)</strong></h4>
        </div>
    </nav>
    <h2 align="center"></h2>
    <!--END DEMO ONLY-->

    <!--NAVIGATION-->
    <ul id="navigation" class="nav navbar-top-links">
        <li class="dropdown">
            <a href="principal.php" class="main"><i class="glyphicon glyphicon-home"></i> Inicio</a>
        </li>
        <li>
            <a href="#" class="main"><i class="glyphicon glyphicon-list-alt"></i> Elecciones</a>
            <div class="sub-nav-wrapper">
                <ul class="sub-nav nav navbar-top-links">
                    <!--<li><a href="#">Fuente de Datos</a></li>-->
                    <li><a href="eleccionesMapa.php"><i class="glyphicon glyphicon-modal-window"></i> Mapa Tematico</a></li>
                    <li><a href="redistritacion.php"><i class="glyphicon glyphicon-modal-window"></i> Redistritación</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#" class="main"><i class="glyphicon glyphicon-inbox"></i> Servicios</a>
        </li>
        <li>
            <a href="#" class="main"><i class="glyphicon glyphicon-cloud"></i> Programas</a>
        </li>
        <li>
            <a href="#" class="main"><i class="glyphicon glyphicon-comment"></i> Contactanos</a>
        </li>
        <li>
            <a href="#" class="main"><i class="glyphicon glyphicon-bullhorn"></i> Ayuda</a>
        </li>
        <li class="text-danger">
            <a href="index.html" class="main"><i class="glyphicon glyphicon-off"></i> Cerrar Sesion</a>
        </li>
    </ul>
    <!--END NAVIGATION-->
    <center>
        <div class="row carousel-holder">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="slide-image" src="images/cuadro/cuadros01.png" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="images/cuadro/cuadros02.png" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="images/cuadro/cuadros03.png" alt="">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </center>

    <!-- dzyngiri bottom bar -->
    <div class="dzyngiri-bottom">
    	<strong>@McAllsoftware.com</strong>
        <span class="right">
            SEPE :: 2016
    		<!--<img src="http://www.logotypes101.com/logos/601/C1A9F6BBDCCB8D0048E0C827CF8E01F8/tn_IEDF_Mexico_Politica.png" alt="Logo" width="50" height="50" style="vertical-align:middle; padding-right:10px;"/>-->
    	</span>
   	    <div class="clr"></div>
    </div>
    <!--/ dzyngiri bottom bar -->
    <script type="text/javascript" src="css/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="css/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="css/metisMenu/metisMenu.min.js"></script>
    <script type="text/javascript" src="css/metisMenu/style.min.js"></script>
</body>
</html>
