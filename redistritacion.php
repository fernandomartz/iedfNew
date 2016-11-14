<!DOCTYPE html>
<html>
<head>
	<!--META-->
	<meta charset="UTF-8"/>
	<title>Redistritación :: 2016</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Sistema de Estadistica de Elecciones Electorales del Distrito Federal"/>
    <meta name="keywords" content="Elecciones Electorales, Elecciones DF, Elecciones Distrito Federal"/>
    <meta name="author" content="Namen Neme Macal"/>

	<!--STYLESHEETS-->
	<link rel="stylesheet" type="text/css" href="css/style2.css"/>
	<link rel="stylesheet" type="text/css" href="css/font/font.css"/>
	<link rel="stylesheet" type="text/css" href="css/metisMenu/metisMenu.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/metisMenu/style.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"/>

	<script language="javascript" type="application/javascript">
		/*function changeText(opt){
			var text;
			if(opt==1) { text="<div style='background-color:#CCC; padding-left:20px;'><br/>Entidad: DF<br/><br/></div>"; }
			else if(opt==2) {text="<div style='background-color:#CCC; padding-left:20px;'><br/>Delegacion: <select name='delegacion' id='delegacion'>	<option value='0' selected='selected'>Seleccione</option>	<option value='2'>AZCAPOTZALCO</option>	<option value='3'>COYOACAN</option>    <option value='4'>CUAJIMALPA DE MORELOS</option>    <option value='5'>GUSTAVO A. MADERO</option>    <option value='6'>IZTACALCO</option>    <option value='7'>IZTAPALAPA</option>    <option value='8'>LA MAGDALENA CONTRERAS</option>    <option value='9'>MILPA ALTA</option>    <option value='10'>ALVARO OBREGON</option>    <option value='11'>TLAHUAC</option>    <option value='12'>TLALPAN</option>    <option value='13'>XOCHIMILCO</option>    <option value='14'>BENITO JUAREZ</option>    <option value='15'>CUAUHTEMOC</option>    <option value='16'>MIGUEL HIDALGO</option>    <option value='17'>VENUSTIANO CARRANZA</option></select> <input name='limite' id='limite' type='checkbox' value='1' /> Limites Distritales.<br/><br/></div>		";}
			else if(opt==3) {text="<div style='background-color:#CCC; padding-left:20px;'><br/>Delegacion: <select name='distrito' id='distrito'>	<option value='0' selected='selected'>Seleccione</option>	<option value='I'>I</option>    <option value='II'>II</option>	<option value='III'>III</option>    <option value='IV'>IV</option>    <option value='V'>V</option>    <option value='VI'>VI</option>    <option value='VII'>VII</option>    <option value='VIII'>VIII</option>    <option value='IX'>IX</option>    <option value='X'>X</option>    <option value='XI'>XI</option>    <option value='XII'>XII</option>    <option value='XIII'>XIII</option>    <option value='XIV'>XIV</option>    <option value='XV'>XV</option>    <option value='XVI'>XVI</option>    <option value='XVII'>XVII</option>    <option value='XVIII'>XVIII</option>    <option value='XIX'>XIX</option>    <option value='XX'>XX</option>    <option value='XXI'>XXI</option>    <option value='XXII'>XXII</option>    <option value='XXIII'>XXIII</option>    <option value='XXIV'>XXIV</option>    <option value='XXV'>XXV</option>    <option value='XXVI'>XXVI</option>    <option value='XXVII'>XXVII</option>    <option value='XXVIII'>XXVIII</option>    <option value='XXIX'>XXIX</option>    <option value='XXX'>XXX</option>    <option value='XXXI'>XXXI</option>    <option value='XXXII'>XXXII</option>    <option value='XXXIII'>XXXIII</option>    <option value='XXXIV'>XXXIV</option>    <option value='XXXV'>XXXV</option>    <option value='XXXVI'>XXXVI</option>    <option value='XXXVII'>XXXVII</option>    <option value='XXXVIII'>XXXVIII</option>    <option value='XXXIX'>XXXIX</option>    <option value='XL'>XL</option></select> <input name='limite' id='limite' type='checkbox' value='1' /> Limites Distritales.<br/><br/></div>	";}
			else if(opt==4) {text="	<div style='background-color:#CCC; padding-left:20px;'><br/>Seccion: <input name='seccion' id='seccion' type='text' size='8' maxlength='5' /><br/><br/></div>";}

			document.getElementById('formulario').innerHTML = text;
		}*/

		function ir() {
			var optEleccion = document.getElementById('menueleccion').value;
			//var url = 'http://nemesoftware.com/sepe/mapa/';
			var url = 'http://localhost/iedfNew/mapa/';
			//var url = 'localhost/mapa/';
			var activarUrl = false;
			var valueTipo;
			if(document.getElementById('radioTipo1').checked){
				var archivo = 'mapaDistrito2013.php';
				activarUrl=true;
			}
			else if(document.getElementById('radioTipo2').checked){
				var archivo = 'mapaSeccion2013.php';
				activarUrl=true;
			}
				
			var datos = '?redist='+optEleccion;

			if(activarUrl)
		  	   location.href=url+archivo+datos;
			else 
			   alert("Faltan datos por seleccionar");

		}

		function inicio() {
			location.href="principal.php";
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
        <a type="button" class="btn btn-default" href="principal.php" role="button"><i class="glyphicon glyphicon-home"></i> Inicio</a><br><br>
        <a type="button" class="btn btn-primary" href="redistritacion.php" role="button"><i class="glyphicon glyphicon-refresh"></i> Actualizar</a><br>
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
							<option value="1">2015</option>
							<option value="0">2012</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
		<div class="panel panel-default wrapper wrapper-content animated fadeInRight" style="text-align:center;">
			<div class="panel-heading">Presentación de Datos:</div>
			<div class="panel-body">
				<input type="radio" name="radioTipo" id="radioTipo1" value="1"> Distrito &nbsp;&nbsp;
				<input type="radio" name="radioTipo" id="radioTipo2" value="2"> Seccion
				<br><br>
				<center>
					<input type="button" class="btn btn-success dropdown-toggle" name="ir" id="ir" onClick="javascript:ir();" value="Buscar">
				</center>
			</div>
		</div>
	</div>
	<div class="col-md-3">
	</div>
</body>
</html>