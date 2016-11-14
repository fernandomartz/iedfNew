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

//Valores por GET
$tipo = $_GET['tipo'];		//Tipo de Eleccion (Jefe de Gobierno, Jefe de Delegacion, Diputado)
$anio = $_GET['anio'];		//Año de Eleccion
$datos = $_GET['datos'];	//Tipo de Dato Candidatura Comun:1 - Partido Politico.
$lugar = $_GET['tem'];		//Posicion en la eleccion (Primer Lugar, Segundo Lugar, Tercer lugar).
$transp = $_GET['trans'];	//Transparencia.
$diff = $_GET['diff'];  	//Muestra las diferencias en porcentajes determinado por varios colores.
$dis = $_GET['dis'];		//Distrito a visualizar
$lim = $_GET['lim'];		//Limites Distritales (Si/No)

//Verificar el tipo de Eleccion para información del titulo de la pagina.
if($tipo == 1) { $tipoEleccion = "jg"; $titulo=" Datos de Eleccion de Jefatura de Gobierno - ".$anio; }
if($tipo == 2) { $tipoEleccion = "jd"; $titulo= " Datos de Eleccion de Jefatura de Delegacion - ".$anio; }
if($tipo == 3) { $tipoEleccion = "dmr"; $titulo=" Datos de Eleccion de Diputado de Mayoria Relativa - ".$anio; }

//Verificar el Tipo de Datos a mostrar para incluir en el titulo de la pagina.
if($datos==1) { $fp='diffp'; $titulo.=" / Candidatura Comun"; } else { $fp='dif'; $titulo.=" / Partido Politico"; }

//Verificar la posicion de datos a mostrar para incluir en el titulo de la pagina.
if($lugar == 1) { $titulo.=" : Primer Lugar."; }
if($lugar == 2) { $titulo.=" : Segundo Lugar."; }
if($lugar == 3) { $titulo.=" : Terce Lugar."; }

$tbl_distrito = ($anio=="2015" ? "coord2012distrito":"coordenadas2012distrito");
$tbl_seccion = ($anio=="2015" ? "coord2012seccion":"coordenadas2012seccion");
$anio = ($anio=="2015" ? "2012" : $anio);

$Tabla = $tipoEleccion.$anio; //Seleccion de Tabla
$Tabla2 = $Tabla.$fp; //Seleccion de Tabla

//Transperencia del color de los poligonos.
$fillop = $transp;

//Iniciar variables globales.
$numPoly = 1;
$dnumPoly = 1;
$xseccion = array();
$xdistrito = array();

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
   	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJtZ6XHmDWDD0XQOmRLpalkxaL4U8AiWQ&callback=initMap"></script>
    <script language="javascript" src="js/ajax.js"></script>
    <script>
		var map;
		var infoWindow;
		var datos = <?php echo $datos; ?>;
		function initialize() {
			//-----------------------------------------------------------------------------------------------
			<?php
			if($lim==1) {
			//***********************************************************************************************
			// DISTRITO
			//***********************************************************************************************
			//$dsql9= "SELECT distrito FROM coordenadas2012distrito WHERE distrito = '".$ddistrito."' GROUP BY distrito";
			$dsql9= "SELECT distrito FROM ".$tbl_distrito." GROUP BY distrito";
			$drs9 = $db->execute($dsql9);
			while(!$drs9->EOF)
			{
				$ddistrito = $drs9->fields[0];
				$dsql1= "SELECT * FROM ".$tbl_distrito." WHERE distrito = '".$ddistrito."' ORDER BY orden";
				$drs = $db->execute($dsql1);
				$dsql2= "SELECT distrito, distriton, COUNT(distrito) as num FROM ".$tbl_distrito." WHERE distrito = '".$ddistrito."' GROUP BY distrito ";
				$drs2 = $db->execute($dsql2);
				$dnumPuntos = 1;
				$dultimo = $drs2->fields[2]-1;  //Candidad de puntos por poligono
				$dfill="#FFF";
			?>
			//COORDENADAS
			  var dCoords0<?php echo $dnumPoly; ?> = [
			<?php
					while(!$drs->EOF)
					{
						$dcadena= "new google.maps.LatLng(".$drs->fields[4].")";
						if($dultimo < $dnumPuntos) { $dcadena.="\n"; } else { $dcadena.=",\n"; }
						//echo "//".$dnumPoly." - ".$dultimo."\n";
						echo $dcadena;
						$dnumPuntos++;
						$drs->MoveNext();
					} //while
			?>
			  ];
				var dPol0<?php echo $dnumPoly; ?>;
			  	dPol0<?php echo $dnumPoly; ?> = new google.maps.Polyline({ path: dCoords0<?php echo $dnumPoly; ?>, strokeColor: '#000', strokeWeight: 2, zIndex:2 });

			<?php
				$dnumPoly++;
				$drs9->MoveNext();
			} //while
			} //if limites distritales

			//***********************************************************************************************
			// SECCIONES
			//***********************************************************************************************

				//Consulta: Buscar todas las secciones a desplegar en el mapa por DELEGACION
				$sql9= "SELECT seccion FROM ".$Tabla." WHERE distrito = '".$dis."' GROUP BY seccion";
				$rs9 = $db->execute($sql9);
				while(!$rs9->EOF)
				{
					$seccion = $rs9->fields[0];
					//Consulta: Buscar las coordenadas de la seccion para formar el poligo.
					$sql1= "SELECT * FROM coordenadas2012seccion WHERE seccion in (".$seccion.") ORDER BY orden";
					$rs = $db->execute($sql1);
					$ndistrito=$rs->fields[1];
					//Consulta: Buscar informacion para representar el tematico {Ej: primer lugar, Segundo Lugar, etc.}
					$sql3= "SELECT partido, difp FROM ".$Tabla2." WHERE seccion in (".$seccion.") AND lugar =". $lugar;
					$rs3 = $db->execute($sql3);
					$partido = $rs3->fields[0];
					$difp = $rs3->fields[1];

					//Determinar el color {Individual o Diferencias}
					$color='#000';
					if($diff==1)
					{
						//Diferencias
						include("inc/selectcolor".$anio."Dif.php");
					} else {
						//Indivitual
						include("inc/selectcolor".$anio."Ind.php");
					}

					//Optiene datos de la seccion
					$sql2= "SELECT distrito, seccion, COUNT(seccion) as num FROM coordenadas2012seccion WHERE seccion in (".$seccion.") GROUP BY seccion";
					$rs2 = $db->execute($sql2);
					$numPuntos = 1;
					$ultimo = $rs2->fields[2]-1;  //Candidad de puntos por poligono

			?>
					//COORDENADAS
					var Coords0<?php echo $numPoly; ?> = [
			<?php
						while(!$rs->EOF)
						{
							$cadena= "new google.maps.LatLng(".$rs->fields[4].")";
							if($ultimo < $numPuntos) { $cadena.="\n"; } else { $cadena.=",\n"; }
							//echo "//".$numPoly." - ".$ultimo."\n";
							echo $cadena;
							$numPuntos++;
							$fill = $color;
							$rs->MoveNext();
						} //while
			?>
					]; //Coordsx
					//Crea la variable del numero del poligo
					var Pol0<?php echo $numPoly; ?>;
			  		//Crea el poligo y las propiedades
					Pol0<?php echo $numPoly; ?> = new google.maps.Polygon({ paths: Coords0<?php echo $numPoly; ?>, strokeColor: '#666', strokeOpacity: 0.8, strokeWeight: 1, fillColor: '<?php echo $fill; ?>', fillOpacity: '<?php echo $fillop; ?>', zIndex: 1 });

			<?php
					// ************************************************************************************
					//Arreglo de secciones relacionadas con el numero del poligono
					$xseccion[$numPoly] = $seccion;
					$xdistrito[$numPoly] = $ndistrito;
					$numPoly++;
					$rs9->MoveNext();
				} //while
			?>

			//-----------------------------------------------------------------------------------------------

				//CENTROIDE DE LA PRIMERA COORDENADA
				var bounds = new google.maps.LatLngBounds();
				/*var i; // Comentado por Joel
				for (i = 0; i < Coords01.length; i++) {
			  		bounds.extend(Coords01[i]);
				}*/
			  	var myLatLng = bounds.getCenter();

				//OPCIONES DE MAPA
			  	var mapOptions = {
			    	zoom: 14,
			    	center: myLatLng,
					panControl: false,
					streetViewControl: false,
					mapTypeControl: true,
			    	mapTypeControlOptions: {
			      		style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
			    	},
					zoomControl: true,
			    	zoomControlOptions: {
			      		style: google.maps.ZoomControlStyle.SMALL
			    	},
			    	mapTypeId: google.maps.MapTypeId.ROADMAP
			  	};

				//Asignar mapa al DIV
			  	map = new google.maps.Map(document.getElementById('map-canvas2'),
			      	mapOptions);
			//-----------------------------------------------------------------------------------------------

			<?php
			if($lim==1) { 
				for($di=1; $di < $dnumPoly; $di++)
				{
			?>
				  dPol0<?php echo $di; ?>.setMap(map);
			<?php
				}
			} //if limites distritales
			?>

			<?php
			//-----------------------------------------------------------------------------------------------

				//Asignar las secciones al mapa, crear el escucha del poligono y la funcion a realizar.
				for($i=1; $i < $numPoly; $i++)
				{
			?>
					Pol0<?php echo $i; ?>.setMap(map);
					google.maps.event.addListener(Pol0<?php echo $i; ?>, 'click', function(){
				  		loadXMLDoc('<?php echo $xseccion[$i]; ?>','<?php echo $xdistrito[$i]; ?>','<?php echo $tipo; ?>','<?php echo $anio; ?>'); });
			<?php } ?>

				//Incluir ventada de informacion
				infoWindow = new google.maps.InfoWindow();
				//Crear escucha y cerrar ventana de informacion cuando se de un click en el mapa.
				google.maps.event.addListener(map, 'click', function() { infoWindow.close(); });
			} //function

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
	            <h4><strong><a type="button" class="btn btn-primary wrapper wrapper-content animated fadeInRight" href="../eleccionesMapa.php" role="button"><i class="glyphicon glyphicon-chevron-left"></i> Mapa Tematico</a> <i class="glyphicon glyphicon-qrcode"></i> Sistema Estadistico de Procesos Electorales (SEPE)</strong></h4>
	        </div>
	    </nav>
	   <!-- Carga de datos -->
	    <div class="col-md-6 text-center text-success wrapper wrapper-content animated fadeInRight"> <!-- Texto de informacion -->
			<div style="padding-left::5px; background-color:#FFF; font-size:14px;">
				<strong><?php echo $titulo; ?></strong>
			</div>	
		</div>		
     		<br>
     	<div id="map-canvas2" style="width: 800px; height: 800px; border-style:solid; border-width:1px; border-color:#000; margin-left:5px;">
     		<!-- Carga del mapa -->
     	</div>
    		<br><br>
    	<!-- Recuadro de informacion -->
     	<div class="wrapper wrapper-content animated fadeInRight" style="position:absolute; width:100px; height:200px; top:80px; left:820px;border=1;">
			<br><br>
			<?php
				if($diff==1) { 
					include('inc/colores'.$anio.'Dif.php'); 
				} else { 
					include('inc/colores'.$anio.'Ind.php'); 
				}
			?>
			<br><br>
    	 </div>
     	<div class="wrapper wrapper-content animated fadeInRight" id="datos" style="position: absolute; 
     		<?php 
     			if($tipo == 2 && $anio==2003) {
     				echo 'top: 570px;';
     			}else{
     				echo 'top: 370px;';
     			} 
     		?> 
     		width: 300px; height: 200px; left: 820px; border=1;">
     	</div> 	
	</body>
</html>
