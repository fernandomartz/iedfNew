<!DOCTYPE html>
<html>
<head>
	<!--META-->
	<meta charset="UTF-8" />
	<title>Mapa Tematico :: 2016</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Estadistica de Elecciones Electorales del Distrito Federal" />
    <meta name="keywords" content="Elecciones Electorales, Elecciones DF, Elecciones Distrito Federal" />
    <meta name="author" content="Namen Neme Macal" />

	<!--STYLESHEETS-->
	<link rel="stylesheet" type="text/css" href="css/style2.css"/>
	<link rel="stylesheet" type="text/css" href="css/font/font.css"/>
	<link rel="stylesheet" type="text/css" href="css/metisMenu/metisMenu.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/metisMenu/style.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

	<script language="javascript" type="application/javascript">
		function changeText(opt){
			var text;
			if(opt==1) { text="<div style='background-color:#CCC; padding-left:20px;'><br/>Entidad: DF  <input name='limite' id='limite' type='checkbox' value='1' /> Limites Distritales.<br/><br/></div>"; }
			else if(opt==2) {text="<div style='background-color:#CCC; padding-left:20px;'><br/>Delegacion: <select name='delegacion' id='delegacion'>	<option value='0' selected='selected'>Seleccione</option>	<option value='2'>AZCAPOTZALCO</option>	<option value='3'>COYOACAN</option>    <option value='4'>CUAJIMALPA DE MORELOS</option>    <option value='5'>GUSTAVO A. MADERO</option>    <option value='6'>IZTACALCO</option>    <option value='7'>IZTAPALAPA</option>    <option value='8'>LA MAGDALENA CONTRERAS</option>    <option value='9'>MILPA ALTA</option>    <option value='10'>ALVARO OBREGON</option>    <option value='11'>TLAHUAC</option>    <option value='12'>TLALPAN</option>    <option value='13'>XOCHIMILCO</option>    <option value='14'>BENITO JUAREZ</option>    <option value='15'>CUAUHTEMOC</option>    <option value='16'>MIGUEL HIDALGO</option>    <option value='17'>VENUSTIANO CARRANZA</option></select> <input name='limite' id='limite' type='checkbox' value='1' /> Limites Distritales.<br/><br/></div>		";}
			else if(opt==3) {text="<div style='background-color:#CCC; padding-left:20px;'><br/>Delegacion: <select name='distrito' id='distrito'>	<option value='0' selected='selected'>Seleccione</option>	<option value='I'>I</option>    <option value='II'>II</option>	<option value='III'>III</option>    <option value='IV'>IV</option>    <option value='V'>V</option>    <option value='VI'>VI</option>    <option value='VII'>VII</option>    <option value='VIII'>VIII</option>    <option value='IX'>IX</option>    <option value='X'>X</option>    <option value='XI'>XI</option>    <option value='XII'>XII</option>    <option value='XIII'>XIII</option>    <option value='XIV'>XIV</option>    <option value='XV'>XV</option>    <option value='XVI'>XVI</option>    <option value='XVII'>XVII</option>    <option value='XVIII'>XVIII</option>    <option value='XIX'>XIX</option>    <option value='XX'>XX</option>    <option value='XXI'>XXI</option>    <option value='XXII'>XXII</option>    <option value='XXIII'>XXIII</option>    <option value='XXIV'>XXIV</option>    <option value='XXV'>XXV</option>    <option value='XXVI'>XXVI</option>    <option value='XXVII'>XXVII</option>    <option value='XXVIII'>XXVIII</option>    <option value='XXIX'>XXIX</option>    <option value='XXX'>XXX</option>    <option value='XXXI'>XXXI</option>    <option value='XXXII'>XXXII</option>    <option value='XXXIII'>XXXIII</option>    <option value='XXXIV'>XXXIV</option>    <option value='XXXV'>XXXV</option>    <option value='XXXVI'>XXXVI</option>    <option value='XXXVII'>XXXVII</option>    <option value='XXXVIII'>XXXVIII</option>    <option value='XXXIX'>XXXIX</option>    <option value='XL'>XL</option></select> <input name='limite' id='limite' type='checkbox' value='1' /> Limites Distritales.<br/><br/></div>	";}
			else if(opt==4) {text="<div style='background-color:#CCC; padding-left:20px;'><br/>Seccion: <input name='seccion' id='seccion' type='text' size='8' maxlength='5' /> <input name='limite' id='limite' type='checkbox' value='1' /> Limites Distritales.<br/><br/></div>";}
			document.getElementById('formulario').innerHTML = text;
		}

		function ir() {
		//alert("inicio");
			//var display;
			var valueEleccion, valueDatos, valueTipo;
			var diff = document.getElementById('diff').checked;
			var optEleccion = 0;
			var optMapa = 0;
			var valuediff = 0;
			var valuelim = 0;
			if (diff) { valuediff=1; }

			valueEleccion = buscarRadio('radioEleccion',3);
			valueDatos = buscarRadio('radioDatos',2);
			valueTipo = buscarRadio('radioTipo',4);
			optEleccion = buscarSelect('menueleccion');
			optMapa = buscarSelect('mapa');
			optTransp = buscarSelect('transp');
			var lim = document.getElementById('limite').checked;
			if (lim) { valuelim=1; }
			//display = valueEleccion+" "+valueDatos+" "+valueTipo+" "+optEleccion+" "+optTransp+" "+optMapa+' '+diff;
			//alert(valueTipo);
			if(valueTipo==2)
			{
				var valueDel;
				valueDel = buscarSelect('delegacion');
				//optEleccion = valueDel
				//display=display+' '+valueDel;
			}
				else if(valueTipo==3)
			{
				var valueDis;
				valueDis = buscarSelect('distrito');
				//optEleccion = valueDis
				//display=display+' Dis:'+valueDis;
			}
				else if(valueTipo==4)
			{
				var valueSec;
				valueSec = document.getElementById('seccion').value;
				//optEleccion = valueSec
				//display=display+' '+valueSec;
			}

			//alert(display);

			//var url = 'http://nemesoftware.com/sepe2014/mapa/';
			var url = 'http://localhost/iedfNew/mapa/';
			var activarUrl = false;

			if(valueTipo==1) {
				var archivo = 'mapaDF.php';
				var datos = '?tipo='+ valueEleccion +'&anio='+ optEleccion +'&datos='+ valueDatos +'&tem='+ optMapa +'&trans='+optTransp+'&diff='+valuediff+'&lim='+valuelim;
				activarUrl=true;
			}
			else if(valueTipo==2 && valueDel!=null && valueDel!=0) {
				var archivo = 'mapaDelegacion.php';
				var datos = '?tipo='+ valueEleccion +'&anio='+ optEleccion +'&datos='+ valueDatos +'&tem='+ optMapa +'&trans='+optTransp+'&diff='+valuediff+'&del='+valueDel+'&lim='+valuelim;
				//var datos = '?del='+valueDel;
				activarUrl=true;
			}
			else if(valueTipo==3 && valueDis!=null && valueDis!=0) {
				var archivo = 'mapaDistrito.php';
				var datos = '?tipo='+ valueEleccion +'&anio='+ optEleccion +'&datos='+ valueDatos +'&tem='+ optMapa +'&trans='+optTransp+'&diff='+valuediff+'&dis='+valueDis+'&lim='+valuelim;
				//var datos = '?distrito='+valueDis;
				activarUrl=true;
			}
			else if(valueTipo==4 && valueSec!=null && valueSec>0) {
				var archivo = 'mapaSeccion.php';
				var datos = '?tipo='+ valueEleccion +'&anio='+ optEleccion +'&datos='+ valueDatos +'&tem='+ optMapa +'&trans='+optTransp+'&diff='+valuediff+'&seccion='+valueSec+'&lim='+valuelim;
				//var datos = '?seccion='+optEleccion;
				activarUrl=true;
			}

			if(optEleccion==2009 && valueEleccion==1)
				{
					alert("No existe ese Tipo de Eleccion");
				} else {
					if(activarUrl) {
						//alert(url+archivo+datos);
						location.href=url+archivo+datos;
					} else { alert("Faltan datos por seleccionar"); }
				}
		}

		function buscarRadio(elemento,maxnum) {
			var value;
			var d;
				for (var i = 1; i <= maxnum; i++) {
					d = document.getElementById(elemento+i).checked;
					if (d==true) {
						value = document.getElementById(elemento+i).value;
					}
				}
			if(value==null) {value=0;}
			return(value);
		}

		function buscarSelect(elemento) {
			var value;
			var e = document.getElementById(elemento);
			value = e.options[e.selectedIndex].value;
			return(value);
		}
		function inicio() {
			location.href="index.php";
		}
	</script>
</head>
<body>
	<!--DEMO ONLY-->
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="col-lg-2 col-sm-3 text-center navbar-header">
            <a class="navbar-brand" href="#">
            	<img class="img-circle img-responsive img-center" src="https://www.immobilienscout24.de/anbieter/resources_new/application/profilepage/team/profilbild_bb_avatar_275_275.png" alt="iedf">
            </a>
        </div>
        <div class="col-lg-6 col-sm-1 navbar-header">
            <br>
            <h4><strong><i class="glyphicon glyphicon-qrcode"></i> Sistema Estadistico de Procesos Electorales (SEPE)</strong></h4>
        </div>
    </nav>
	<!--END DEMO ONLY-->
	<div class="col-md-1 text-center">
		<br><br><br><br><br><br><br><br><br><br>
		<center>
        	<a type="button" class="btn btn-default" href="principal.php" role="button"><i class="glyphicon glyphicon-home"></i> Inicio</a><br><br>
        	<a type="button" class="btn btn-primary" href="eleccionesMapa.php" role="button"><i class="glyphicon glyphicon-refresh"></i> Actualizar</a><br>
        </center>
	</div>
	<div class="col-md-3">
	</div>
	<div class="col-md-5">
		<br>
		<div class="panel panel-default wrapper wrapper-content animated fadeInRight" style="text-align:center;">
			<div class="panel-heading">Elección:</div>
			<div class="panel-body">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<select class="form-control" name="menueleccion" id="menueleccion" readonly>
							<option value="">Seleccione:</option>
							<option value="2015">2015</option>
							<option value="2012">2012</option>
						    <option value="2009">2009</option>
						    <option value="2006">2006</option>
						    <option value="2003">2003</option>
						    <option value="2000">2000</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
		<div class="panel panel-default wrapper wrapper-content animated fadeInRight" style="text-align:center;">
			<div class="panel-heading">Tipo de Elección:</div>
			<div class="panel-body">
				<input type="radio" name="radioEleccion" id="radioEleccion1" value="1"> Jefe de Gobierno &nbsp;&nbsp;
				<input type="radio" name="radioEleccion" id="radioEleccion2" value="2"> Jefe Delegacional &nbsp;&nbsp;
				<input type="radio" name="radioEleccion" id="radioEleccion3" value="3" checked> Diputado de Mayoria Relativa
			</div>
		</div>
		<div class="panel panel-default wrapper wrapper-content animated fadeInRight" style="text-align:center;">
			<div class="panel-heading">Fuente de Datos:</div>
			<div class="panel-body">
				<input type="radio" name="radioDatos" id="radioDatos1" value="1" checked> Candidatura Comun &nbsp;&nbsp;
				<input type="radio" name="radioDatos" id="radioDatos2" value="2"> Partido Politico
			</div>
		</div>
		<div class="panel panel-default wrapper wrapper-content animated fadeInRight" style="text-align:center;">
			<div class="panel-heading">Presentacion de Datos:</div>
			<div class="panel-body">
				<input type="radio" name="radioTipo" id="radioTipo1" value="1" onClick="javascript:changeText(1)"> Entidad &nbsp;&nbsp;
				<input type="radio" name="radioTipo" id="radioTipo2" value="2" onClick="javascript:changeText(2)"> Delegacion &nbsp;&nbsp;
				<input type="radio" name="radioTipo" id="radioTipo3" value="3" onClick="javascript:changeText(3)"> Distrito &nbsp;&nbsp;
				<input type="radio" name="radioTipo" id="radioTipo4" value="4" onClick="javascript:changeText(4)"> Seccion
			</div>
		</div>
		<div class="panel panel-default wrapper wrapper-content animated fadeInRight" style="text-align:center;">
			<div class="panel-heading">Opciones:</div>
			<div class="panel-body">
				<div>
					<div id="formulario" style="margin-left:20px; margin-right:20px;"></div>
					<div style="text-align:center; margin-right:10px;"><br/>
						Tematico:
						<select name="mapa" id="mapa">
							<option value="">Seleccione</option>
						    <option value="1" selected>Primer Lugar</option>
							<option value="2">Segundo Lugar</option>
							<option value="3">Tercer Lugar</option>
						    <option value="4">Posicion PRD</option>
						</select>
						&nbsp;&nbsp;
						<input name="diff" id="diff" type="checkbox" value="1"> Con diferencias.
						&nbsp;&nbsp;
						Transparencia:
						<select name="transp" id="transp">
							<option value="1" selected>0%</option>
						    <option value="0.75">25%</option>
						    <option value="0.5">50%</option>
							<option value="0.25">75%</option>
						    <option value="0">100%</option>
						</select>
						<br/><br/>
					</div>
					<center>
						<input type="button" class="btn btn-success dropdown-toggle" name="ir" id="ir" onClick="javascript:ir();" value="Buscar">
					</center>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
	</div>

	<!-- script -->
	<script type="text/javascript" src="css/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="css/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="css/metisMenu/metisMenu.min.js"></script>
    <script type="text/javascript" src="css/metisMenu/style.min.js"></script>
</body>
</html>
<!--<center>
			<div style="background-color:#FFF; width:800px; margin-top:10px; text-align: left; border:solid; border-color:#000;">
				
				<div><h3>Eleccion:</h3></div>
				<div style="position:relative; text-align:center;">
					<br/>
					<select name="menueleccion" id="menueleccion">
						<option value="2015">2015</option>
						<option value="2012">2012</option>
					    <option value="2009">2009</option>
					    <option value="2006">2006</option>
					    <option value="2003">2003</option>
					    <option value="2000">2000</option>
					</select>
					<br/>
				</div>
				<br/>

				<div><h3>Tipo de Eleccion:</h3></div>
				<div style="position:relative; text-align:center;">
					<br/>
					<input type="radio" name="radioEleccion" id="radioEleccion1" value="1">Jefe de Gobierno &nbsp;&nbsp;
				    <input type="radio" name="radioEleccion" id="radioEleccion2" value="2">Jefe Delegacional &nbsp;&nbsp;
				    <input type="radio" name="radioEleccion" id="radioEleccion3" value="3" checked>Diputado de Mayoria Relativa
					<br/>
				</div>
				<br/>

				<div><h3>Fuente de Datos:</h3></div>
				<div style="position:relative;text-align:center;">
					<br/>
					<input type="radio" name="radioDatos" id="radioDatos1" value="1" checked>Candidatura Comun &nbsp;&nbsp;
				    <input type="radio" name="radioDatos" id="radioDatos2" value="2">Partido Politico
					<br/>
				</div>
				<br/>

				<div><h3>Presentacion de Datos:</h3></div>
				<div style="position:relative;text-align:center;">
					<br/>
					<input type="radio" name="radioTipo" id="radioTipo1" value="1" onClick="javascript:changeText(1)">Entidad &nbsp;&nbsp;
				    <input type="radio" name="radioTipo" id="radioTipo2" value="2" onClick="javascript:changeText(2)">Delegacion &nbsp;&nbsp;
				    <input type="radio" name="radioTipo" id="radioTipo3" value="3" onClick="javascript:changeText(3)">Distrito &nbsp;&nbsp;
				    <input type="radio" name="radioTipo" id="radioTipo4" value="4" onClick="javascript:changeText(4)">Seccion
					<br/>
				</div>
				<br/>

				<div><h3>Opciones:</h3>
					<div>
						<br/>
							<div id="formulario" style="margin-left:20px; margin-right:20px;"></div>

						<div style="text-align:center; margin-right:10px;"><br/>
							Tematico:
							<select name="mapa" id="mapa">
								<option value="0">Seleccione</option>
							    <option value="1" selected>Primer Lugar</option>
								<option value="2">Segundo Lugar</option>
								<option value="3">Tercer Lugar</option>
							    <option value="4">Posicion PRD</option>
							</select>
							&nbsp;&nbsp;
							<input name="diff" id="diff" type="checkbox" value="1">Con diferencias.
							&nbsp;&nbsp;
							Transparencia:
							<select name="transp" id="transp">
								<option value="1" selected>0%</option>
							    <option value="0.75">25%</option>
							    <option value="0.5">50%</option>
								<option value="0.25">75%</option>
							    <option value="0">100%</option>
							</select>
							<br/><br/>
						</div>

						<center>
							<input name="ir" type="button" class="css3button" id="ir" onClick="javascript:ir();" value="Buscar">
							<input name="regresar" type="button" class="css3button" id="regresar" onClick="javascript:inicio();" value="Inicio">
						</center>
						<br/><br/>
					</div> 
				</div>
			</div>
</center>-->