<?php
//DATOS POR PARTIDO POLITO
error_reporting(E_ERROR);
include("../conn/conn.php");

function aleatorio()
{
$ale = rand(99999,99999999999);	
return($ale);
}

$distrito = $_GET['distrito'];
$seccion = $_GET['seccion'];
$dato = $_GET['dato'];
$tipo = $_GET['tipo'];

if($tipo == 1) { $tipoEleccion = "jg"; }
if($tipo == 2) { $tipoEleccion = "jd"; }
if($tipo == 3) { $tipoEleccion = "dmr"; }

//echo $distrito." ".$seccion."<br/>";
$ssql = "select anterior, modificado, nuevo from redistritacion where tipo=1 and seccion=".$seccion;
$srs = $db->execute($ssql);

$sql = "select * from ". $tipoEleccion ."2012 where distrito='".$distrito."' and seccion=".$seccion;
$rs = $db->execute($sql);
$del = $rs->fields[2];

if($del==""){
	$sql = "select * from ". $tipoEleccion ."2015 where distrito='".$distrito."'";
	$rs = $db->execute($sql);
	$distrito = $rs->fields[1];
	$del = $rs->fields[2];
}

// valores segun resultado
$del_name = array(0,1,"AZCAPOTZALCO","COYOACAN","CUAJIMALPA DE MORELO","GUSTAVO A. MADERO","IZTACALCO","IZTAPALAPA","LA MAGDALENA CONTRERAS","MILPA ALTA","ALVARO OBREGON","TLAHUAC","TLALPAN","XOCHIMILCO","BENITO JUAREZ","CUAUHTEMOC","MIGUEL HIDALGO","VENUSTIANO CARRANZA");
$delx = $rs->fields[2];
$delnom = $del_name[$delx]; 

$sql2= "SELECT distrito, del, seccion, COUNT( casilla ) , SUM( pan ) , SUM( pri ) , SUM( prd ) , SUM( pt ) , SUM( pvem ) , SUM( mc ) , SUM( na ) , SUM( cc1 ) , SUM( cc2 ) , SUM( nulos ) , SUM( votos ) , SUM( lista ) FROM ". $tipoEleccion ."2015 ";

$texto = "Posición por el número total de votos ";

if($dato == null) { $dato=1;}
if($dato==1) {
	if($seccion!=""){
		$sql2.= " WHERE distrito = '".$distrito."' AND seccion = ".$seccion." GROUP BY seccion";
		$texto.="en la sección:";
	}else{
		$sql2.= " WHERE distrito = '".$distrito."' GROUP BY distrito";
		$texto.="en el distrito:";
	}	
}
if($dato==2) {
	if($_GET['anio']==2015){
		$sql2.= " WHERE seccion in(SELECT seccion FROM redistritacion WHERE modificado =  '".$distrito."') GROUP BY distrito";
		$texto.="en el distrito:";
	}else{
	$sql2.= " WHERE distrito = '".$distrito."' GROUP BY distrito";
	$texto.="en el distrito:";
	}
}
if($dato==3) {
	if($_GET['anio']==2015){
		$sql2.= " WHERE seccion in(SELECT seccion FROM redistritacion WHERE modificado =  '".$distrito."') GROUP BY distrito";
		$texto.="en el distrito:";
	}else{
	$sql2.= " WHERE del = '".$del."' GROUP BY del";
	$texto.="en la delegación:";
	}
}
if($dato==4) {
	$sql2= "SELECT 1=1, 2=2, 3=3, COUNT( casilla ) , SUM( pan ) , SUM( pri ) , SUM( prd ) , SUM( pt ) , SUM( pvem ) , SUM( mc ) , SUM( na ) , SUM( cc1 ) , SUM( cc2 ) , SUM( nulos ) , SUM( votos ) , SUM( lista ) FROM ". $tipoEleccion ."2015 ";
	$texto.="en el DF:";
	}


if($tipo==3) {
	if($dato==1)
	{
	//Marca del partido ganador en Candidatura Comun
		$sql3 = "select partido from dmr2015diffp where distrito='".$distrito."' and seccion=".$seccion." and lugar=1";
		$rs3 = $db->execute($sql3);
		$ganador = $rs3->fields[0];
	}
}
// echo $sql."<br/>";

	$rs2 = $db->execute($sql2);

		$rpan	=$rs2->fields[4];
		$rpri	=$rs2->fields[5];
		$rprd   =$rs2->fields[6];
		$rpvem	=$rs2->fields[7];
		$rpt 	=$rs2->fields[8];
		$rmc    =$rs2->fields[9];
		$rna	=$rs2->fields[10];
		$rmorena =$rs2->fields[11];
		$rph    =$rs2->fields[12];
		$res    =$rs2->fields[13];

		$rcc1	=$rs2->fields[14];
		$rcc2	=$rs2->fields[15];
		$rcc3   =$rs2->fields[16];
		$rcc4   =$rs2->fields[17];

		$rVN = $rs2->fields[18];
		$rTV = $rs2->fields[19];
		$rLN = $rs2->fields[20];


	$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
	$datos[] = array('partido' => 'PRI', 'votos' => $rpri);
	$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
	$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
	$datos[] = array('partido' => 'PT', 'votos' => $rpt);
	$datos[] = array('partido' => 'MC', 'votos' => $rmc);
	$datos[] = array('partido' => 'NA', 'votos' => $rna);
	$datos[] = array('partido' => 'MORENA', 'votos' => $rmorena);
	$datos[] = array('partido' => 'PH', 'votos' => $rph);
	$datos[] = array('partido' => 'ES', 'votos' => $res);

	$datos[] = array('partido' => 'CC1', 'votos' => $rcc1);
	$datos[] = array('partido' => 'CC2', 'votos' => $rcc2);
	$datos[] = array('partido' => 'CC3', 'votos' => $rcc3);
	$datos[] = array('partido' => 'CC4', 'votos' => $rcc4);


// Obtener una lista de columnas
foreach ($datos as $key => $row) {
    $partidos[$key]  = $row['partido'];
    $voto[$key] = $row['votos'];
}
array_multisort($voto, SORT_DESC, $partidos, SORT_ASC, $datos); // SORT_DESC - SORT_ASC




?>
<html>
    <head>
        <meta charset="utf-8">
    </head>
<body>
<!-- DIV PRINCIPAL -->
<div style="background-color:#FFF; border-style:solid; border-color:#000; border-width:1px;">

<!-- DIV TITULO: Distrito, Seccion, Delegacion -->
	<div>
		<?php 
			if($seccion!="")
				echo "<h2>Sección: ".  $seccion . " - Distrito: ". $distrito ."</h2>"; 
			else
				echo "<h2>Distrito: ". $distrito ."</h2>";
			 
			echo "<b>Delegación: ".$delnom."</b><br/>";
		?>
	</div>

<!-- DIV MENU DATOS -->
	<?php if($srs->fields[0]!=""){?>
	<center>
	<table style="margin-top:5px; margin-bottom:5px;">
    <tr align="center" style="font-weight:bold;"><td width="80px">2012</td><td width="100px">Modificado 2012</td><td width="80px">2015</td></tr>
    <tr align="center"><td><?php echo $srs->fields[0];?></td><td><?php echo $srs->fields[1];?></td><td><?php echo $srs->fields[2];?></td></tr>
    </table></center><?php }?><br />
<?php if($seccion==""){?>
	<div style="background-color:#FFF; border-style:solid; border-color:#000; border-width:1px;">
	Datos:

    <!--<a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',2,1,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2012)">Sección</a> |
    <a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',2,3,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2012)">Delegación</a> |
    <a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',2,4,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2012)">DF</a> |-->

    <a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',2,2,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2013)">Distrito 2012</a> |    
    <a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',2,3,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2015)">Distrito 2015</a> |    
    <a href="#" onClick="javascript:loadXMLDoc3('<?php echo $seccion; ?>','<?php echo $distrito; ?>',1,1,1,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2013)">CC</a>
	</div>


<!-- DIV DATOS -->
<div style="background-color:#FFF; border-style:solid; border-color:#000; border-width:1px; padding-left:10px;">
<?php



echo "Partidos Politicos<br/>". $texto ."";
echo "<table border='1'>";

echo "<tr><td>Lugar</td><td>Partido</td><td>Votos</td><td>Dif#</td><td>Dif%</td><td>TV%</td><td>G</td></tr>";

$fin=9;
for($i=0;$i<$fin;$i++) {

if($i <= 1) {
	$difp = number_format((((($datos[0]['votos']-$datos[1]['votos']))/$rTV)*100),2,'.',',');
	$difn = ($datos[0]['votos']-$datos[1]['votos']);
	}
else
	{
	$difp = number_format((((($datos[0]['votos']-$datos[$i]['votos']))/$rTV)*100),2,'.',',');
	$difn = ($datos[0]['votos']-$datos[$i]['votos']);
	}
	$tvp = number_format((($datos[$i]['votos']/$rTV)*100),2,'.',',');

if($ganador == $datos[$i]['partido']) { $marca = '*'; } else { $marca = ""; }

echo "<tr><td>".($i+1).".- </td><td>".$datos[$i]['partido']." </td><td> ".number_format($datos[$i]['votos'],0)." </td><td>". number_format($difn,0) ."</td><td>". $difp ."</td><td>". $tvp ."</td><td>". $marca ."</td></tr>";

}
echo "</table>";
echo "Lista Nominal: ".number_format($rLN,0)."<br/>";
echo "Votación Total: ".number_format($rTV,0)."<br/>";
echo "Votos Nulos: ".number_format($rVN,0)." (".number_format((($rVN/$rTV)*100),2,'.',',')."%)<br/>";
echo "Numero de Casillas: ".number_format($rs2->fields[3],0)."<br/>";;
echo "Participación: ".number_format((($rTV/$rLN)*100),2,'.',',')."%";
//echo "<br /><br /><br />".$sql."<br />".$sql2."<br />".$sql3;
?>

<br/>
</div>
<!--  VENTANA DE BOTONES SECUNDARIOS. (Ver datos del Ganador, Ir datos comparativos, Ver mapa transparente, etc)
    <div style=" position:relative; float:left; top:0px; width:30px; height:50px; background-color:#FFF; border-style:solid; border-color:#000; border-width:1px;">
    1
    </div>
-->
<?php }?>
</div>
</body>
</html>