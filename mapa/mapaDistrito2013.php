<?php
//---------------------------------------------------------------------------------------------------------------------------
//Archivo: mapaDis.php
//Descripcion: Visualizar el mapa tematico del Distrito Federal.
//Fecha: 15-08-2013
//Elaboro: ISC. Namen Neme Macal - namenn@gmail.com
//Nota: Si se activa la variable "debug" el mapa no se despliega.
//---------------------------------------------------------------------------------------------------------------------------

//Conexion de Base de Datos.
include("../conn/conn.php");
//Tiempo de espera de respuesta de la base de datos ilimitado.
set_time_limit(0);

// ===========================================================================================================================
header('Content-Type: text/html; charset=utf-8');
//Valores por GET
$tipo = $_GET['tipo'];		//Tipo de Eleccion (Jefe de Gobierno, Jefe de Delegacion, Diputado)
$anio = $_GET['anio'];		//Año de Eleccion
$datos = $_GET['datos'];	//Tipo de Dato Candidatura Comun:1 - Partido Politico.
$lugar = $_GET['tem'];		//Posicion en la eleccion (Primer Lugar, Segundo Lugar, Tercer lugar).
$transp = $_GET['trans'];	//Transparencia.
$diff = $_GET['diff'];  	//Muestra las diferencias en porcentajes determinado por varios colores.
$dis = $_GET['dis'];		//Distrito a visualizar
$lim = $_GET['lim'];		//Limites Distritales (Si/No)

$tipo = 1;		//Tipo de Eleccion (Jefe de Gobierno, Jefe de Delegacion, Diputado)
$anio = 2012;	//Año de Eleccion
$datos = 1;		//Tipo de Dato Candidatura Comun:1 - Partido Politico:2.
$lugar = 1;		//Posicion en la eleccion (Primer Lugar, Segundo Lugar, Tercer lugar).
$transp = 1;	//Transparencia.
$diff = 1;  	//Muestra las diferencias en porcentajes determinado por varios colores.
$dis = 'IX';	//Distrito a visualizar
$lim = 1;		//Limites Distritales (Si/No)

//Verificar el Tipo de Datos a mostrar para incluir en el titulo de la pagina.
if($datos==1) { $fp='diffp'; $titulo.=" / Candidatura Comun"; } else { $fp='dif'; $titulo.=" / Partido Politico"; }

//Transperencia del color de los poligonos.
$fillop = $transp;

//Iniciar variables globales.
$numPoly = 1;
$dnumPoly = 1;
$xseccion = array();
$xdistrito = array();

/***************************TIPO DE COORDENADAS******************/
$titulo ="Distribución por Distrito ";
if($_GET['redist']!=""){
$tbl_distrito = ($_GET['redist']==0 ? "coordenadas2012distrito" : "coord2012distrito");
$titulo .=  ($_GET['redist']==0 ? "2012" : "2015");
}else{
	echo "Indique el tipo de redistritación";
	exit();
}
// ===========================================================================================================================
?>
<!DOCTYPE html>
<html>
<head>
	<title>SEPE :: Mapa Distrito Federal</title>
	<!--STYLESHEETS-->
	<link href="css/default.css" rel="stylesheet">
	<link href="../css/style2.css" rel="stylesheet" type="text/css">
	<link href="../css/font/font.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../css/metisMenu/metisMenu.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/metisMenu/style.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<!-- Script -->
	<script type="text/javascript" src="../css/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../css/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../css/metisMenu/metisMenu.min.js"></script>
	<script type="text/javascript" src="../css/metisMenu/style.min.js"></script>
   	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJtZ6XHmDWDD0XQOmRLpalkxaL4U8AiWQ&sensor=false"></script>
	<script language="javascript" src="js/ajax.js"></script>
	<script>
		var map;
		var infoWindow;
		var datos = <?php echo $datos; ?>;
		function initialize() {

//-----------------------------------------------------------------------------------------------
<?php
if($lim==1) {
	$dsql1= "SELECT * FROM ".$tbl_distrito." ORDER BY distrito, orden";
	$drs = $db->execute($dsql1);
	$ini_distrito=$drs->fields[2];
	$xdistrito[$dnumPoly]=$ini_distrito;
	$dnumPuntos = 1;

	?>//COORDENADAS
		var dCoords0<?php echo $dnumPoly; ?> = [
	<?php
		while(!$drs->EOF)
		{
			$fin_distrito = $drs->fields[2];
			if($ini_distrito==$fin_distrito){
				$dcadena = "new google.maps.LatLng(".$drs->fields[4].")";
				/*if($dnumPuntos>=1)
					$dcadena = $dcadena.",\n".$dcadena;*/
				if($dnumPuntos==0) { $dcadena.="\n"; } else { $dcadena.=",\n"; }

				echo $dcadena;
				$dnumPuntos++;
			}else{
				//$dcadena.="\n";
				//$dcadena = substr($dcadena,0,strlen($dcadena)-2);
				//echo $dcadena."\n";

				$dsql3="SELECT COUNT(*) FROM redistritacion where tipo=2 and anterior='".$ini_distrito."'";
				$drs3 = $db->execute($dsql3);
				$color="#FFFF00";
				$lcolor="#000";

				if($drs3->fields[0]>0){
					$color="#FF0000";
					$lcolor="#FCD209";
				}

	?>
				];
				var dPol0<?php echo $dnumPoly; ?>;
				dPol0<?php echo $dnumPoly; ?> = new google.maps.Polygon({ paths: dCoords0<?php echo $dnumPoly; ?>, strokeColor: '<?php echo $lcolor; ?>', strokeWeight: 1.3, fillColor: '<?php echo $color; ?>', fillOpacity: '<?php echo $fillop; ?>', zIndex: 1});
	    <?php /****reinicilizo porque cambia el distrito************/
				$xdistrito[$dnumPoly]=$ini_distrito;
				$dnumPoly++;
				$dnumPuntos = 1;
				$ini_distrito = $drs->fields[2];
		?>
				var dCoords0<?php echo $dnumPoly; ?> = [
		<?php
				$dcadena= "new google.maps.LatLng(".$drs->fields[4].")";
				$dcadena.=",\n";
				echo $dcadena;
				$dnumPuntos++;
			}
			$drs->MoveNext();
		} //while

		$color="#FFFF00";
		$lcolor="#000";

		$dsql3="SELECT COUNT(*) FROM redistritacion where tipo=2 and anterior='".$ini_distrito."'";
		$drs3 = $db->execute($dsql3);


		if($drs3->fields[0]>0){
			$color="#FF0000";
			$lcolor="#FCD209";
		}
		$xdistrito[$dnumPoly]=$ini_distrito;
		?>
		];
		var dPol0<?php echo $dnumPoly; ?>;
		dPol0<?php echo $dnumPoly; ?> = new google.maps.Polygon({ paths: dCoords0<?php echo $dnumPoly; ?>, strokeColor: '<?php echo $lcolor; ?>', strokeWeight: 1.3, fillColor: '<?php echo $color; ?>', fillOpacity: '<?php echo $fillop; ?>', zIndex: 1});

		<?php
		$dnumPoly++;

} //if limites distritales
?>
//-----------------------------------------------------------------------------------------------

	//CENTROIDE DE LA PRIMERA COORDENADA
	var bounds = new google.maps.LatLngBounds();
	var i;
	for (i = 0; i < dCoords016.length; i++) {
  		bounds.extend(dCoords016[i]);
	}
    var myLatLng = bounds.getCenter();

	var myLatLng = new google.maps.LatLng('19.347904','-99.167116');
	//OPCIONES DE MAPA
  	var mapOptions = {
    	zoom: 11,
    	center: myLatLng,
		panControl: false,
		streetViewControl: false,
		mapTypeControl: true,
    	mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
		zoomControl: true,
    	zoomControlOptions: {style: google.maps.ZoomControlStyle.SMALL
    	},
    	mapTypeId: google.maps.MapTypeId.ROADMAP
  	};

	//Asignar mapa al DIV
  	map = new google.maps.Map(document.getElementById('map-canvas2'),
      	mapOptions);


//-----------------------------------------------------------------------------------------------

<?php
//-----------------------------------------------------------------------------------------------
//Asignar las secciones al mapa, crear el escucha del poligono y la funcion a realizar.
for($i=1; $i < $dnumPoly; $i++){
?>
		dPol0<?php echo $i; ?>.setMap(map);
		google.maps.event.addListener(dPol0<?php echo $i; ?>, 'click', function(){
			loadXMLDoc4('<?php echo $seccion; ?>','<?php echo $xdistrito[$i]; ?>','<?php echo $tipo; ?>','<?php echo "2013"; ?>'); });
<?php } ?>
}
	//Cargar mapa cuando inicie la pagina.
	google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>
<body>
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="col-lg-2 col-sm-3 text-center navbar-header">
            <a class="navbar-brand" href="#"></a>
        </div>
        <div class="col-lg-6 col-sm-1 navbar-header">
            <br>
        	<h4><strong><a type="button" class="btn btn-primary wrapper wrapper-content animated fadeInRight" href="../redistritacion.php" role="button"><i class="glyphicon glyphicon-chevron-left"></i> Redistritación</a> <i class="glyphicon glyphicon-qrcode"></i> Sistema Estadistico de Procesos Electorales (SEPE)</strong></h4>
        	<br>
        </div>
    </nav>
   	<!-- Carga de datos -->
    <div class="col-md-12 text-center text-success wrapper wrapper-content animated fadeInRight"> <!-- Texto de informacion -->
		<div style="padding-left::5px; font-size:16px;">
			<br>
			<strong><?php echo $titulo; ?></strong>
			<br><br>
		</div>	
	</div>		
 		<br><br>
 	<div class="col-md-6">
     	<div id="map-canvas2" style="width: 1450px; height: 650px; border-style:solid; border-width:1px; border-color:#000; margin-left:5px;">
     		<!-- Carga del mapa -->
     	</div>
     	<!--<iframe width="100%" height="520" frameborder="0" src="https://yoryyosyyoel.carto.com/viz/edd799a0-a6a8-11e6-ad60-0ee66e2c9693/embed_map" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>-->
    	<br><br>
   	</div>
	<!-- Recuadro de informacion -->
    <div class="col-md-6">
	    <div class="col-md-6">
	     	<!--<div class="table table-inverse table-striped table-condensed table-responsive wrapper wrapper-content animated fadeInRight">
				<?php
					if($diff==1) { 
						include('inc/colores'.$anio.'Dif.php'); 
					} else { 
						include('inc/colores'.$anio.'Ind.php'); 
					}
				?>
	    	</div>-->
	    </div>
	    <div class="col-md-6">
	     	<div class="table table-inverse table-striped table-condensed table-responsive wrapper wrapper-content animated fadeInRight" id="datos">
	     		<?php 
	     			if($tipo == 2 && $anio==2003) {
	     				
	     			}else{
	     				
	     			} 
	     		?> 
	     	</div>
	    </div>
    </div>
</body>
<!--<body>
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	    <div class="col-lg-2 col-sm-3 text-center navbar-header">
	        <a class="navbar-brand" href="#"></a>
	    </div>
	    <div class="col-lg-6 col-sm-1 navbar-header">
	        <br>
	        <h4><strong><a type="button" class="btn btn-primary wrapper wrapper-content animated fadeInRight" href="../redistritacion.php" role="button"><i class="glyphicon glyphicon-chevron-left"></i> Redistritación</a> <i class="glyphicon glyphicon-qrcode"></i> Sistema Estadistico de Procesos Electorales (SEPE)</strong></h4>
	    	<br>
	    </div>
	</nav>
	< Carga de datos >
	<div class="col-md-6 text-center text-success wrapper wrapper-content animated fadeInRight"> < Texto de informacion >
		<div style="padding-left::5px; font-size:14px;">
			<br>
			<strong><?php echo $titulo; ?></strong>
			<br><br>
		</div>	
	</div>		
		<br><br>
	<div id="map-canvas2" style="width: 800px; height: 800px; border-style:solid; border-width:1px; border-color:#000; margin-left:5px;">
	< Carga del mapa >
	</div>
	<br><br>
	< <div style="position:absolute; width:100px; height:200px; top:80px; left:820px;border=1;">
			<?php
			/*if($diff==1) { include('inc/colores'.$anio.'Dif.php'); }
			else { include('inc/colores'.$anio.'Ind.php'); }*/
			?>
	</div> >
	<div id="datos" style="position: absolute; width: 300px; height: 200px; top: 270px; left: 820px; border=1;">	
	</div>
</body>-->
</html>