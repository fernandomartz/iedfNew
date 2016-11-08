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
<link href="css/style2.css" rel="stylesheet" type="text/css">

<link href="css/font/font.css" rel="stylesheet" type="text/css">

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
	//var url = 'http://nemesoftware.com/sepe2014/mapa/';
	var url = 'http://localhost/sepe2014/mapa/';
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
	location.href="index.php";
}

</script>

</head>

<body>

<!-----DEMO ONLY----->
<h1>
	<img src="images/logo.png" alt="Logo" width="50" height="50" style="vertical-align:middle; padding-right:10px;" title="Logo" />
Sistema de Estadistica de Procesos Electorales (SEPE)
</h1>

<!-----END DEMO ONLY----->

<center>
<div style="background-color:#FFF; width:800px; margin-top:10px; text-align: left; border:solid; border-color:#000;">
<!-- SubTitulo -->
<div style="text-align:left; font-family: Arial, Helvetica, sans-serif; font-size: 14px; padding-top:5px; padding-bottom:5px;"> &nbsp;&nbsp;
<a href="index.php">Inicio</a>
</div>
<!-- Opciones  -->
<div><h3>Eleccion:</h3></div>
<div style="position:relative; text-align:center;">
<br/>
<select name="menueleccion" id="menueleccion">
	<option value="1">2015</option>
	<option value="0">2012</option>
</select>
<br/>
</div>
<br/>
<div><h3>Presentacion de Datos:</h3></div>
<div style="position:relative;text-align:center;">
<br/>
    <input type="radio" name="radioTipo" id="radioTipo1" value="1">
    Distrito &nbsp;&nbsp;
    <input type="radio" name="radioTipo" id="radioTipo2" value="2">
    Seccion
<br/>
</div>
<br/>
<center>
<input name="ir" type="button" class="css3button" id="ir" onClick="javascript:ir();" value="Buscar">
<input name="regresar" type="button" class="css3button" id="regresar" onClick="javascript:inicio();" value="Inicio">
</center>
<br/><br/>
	</div> <!-- fin opciones -->
</div>
</div> <!-- Fin div principal -->
</center>
</body>
</html>