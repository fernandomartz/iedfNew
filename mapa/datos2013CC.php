<?php
//DATOS POR CANDIDATURA COMUN
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
//if($seccion==""){$dato=2;}

if($tipo == 1) { $tipoEleccion = "jg"; }
if($tipo == 2) { $tipoEleccion = "jd"; }
if($tipo == 3) { $tipoEleccion = "dmr"; }


//echo $distrito." ".$seccion."<br/>";
$ssql = "select anterior, modificado, nuevo from redistritacion where tipo=1 and seccion=".$seccion;
$srs = $db->execute($ssql);

$sql = "select * from ". $tipoEleccion ."2012fp where distrito='".$distrito."' and seccion=".$seccion;
$rs = $db->execute($sql);
$del = $rs->fields[2];

if($del==""){
	$sql = "select * from ". $tipoEleccion ."2012fp where distrito='".$distrito."'";
	$rs = $db->execute($sql);
	$distrito = $rs->fields[1];
	$del = $rs->fields[2];
}

// valores segun resultado
$del_name = array(0,1,"AZCAPOTZALCO","COYOACAN","CUAJIMALPA DE MORELO","GUSTAVO A. MADERO","IZTACALCO","IZTAPALAPA","LA MAGDALENA CONTRERAS","MILPA ALTA","ALVARO OBREGON","TLAHUAC","TLALPAN","XOCHIMILCO","BENITO JUAREZ","CUAUHTEMOC","MIGUEL HIDALGO","VENUSTIANO CARRANZA");
$delx = $rs->fields[2];
$delnom = $del_name[$delx]; 


$sql2= "SELECT distrito, del, seccion, COUNT( casilla ) , SUM( pan ) , SUM( pri ) , SUM( pvem ) , SUM( na ) , SUM( cc1 ) , SUM( cc2 ) , SUM( nulos ) , SUM( votos ) , SUM( lista ) FROM ". $tipoEleccion ."2012fp ";

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
	$sql2= "SELECT 1=1, 2=2, 3=3, COUNT( casilla ) , SUM( pan ) , SUM( pri ) , SUM( pvem ) , SUM( na ) , SUM( cc1 ) , SUM( cc2 ) , SUM( nulos ) , SUM( votos ) , SUM( lista ) FROM ". $tipoEleccion."2012fp ";
	$texto.="en el DF:";
	}

$vcc1 = 1;
	// echo $sql."<br/>";
if($tipo==3) {
		$sqlcc= "SELECT * FROM dmr2012discc WHERE distrito='".$distrito."'";
		$rscc = $db->execute($sqlcc);
		$vcc1 = $rscc->fields[2];		//verificar candidatura comun PRI - PVEM
}

$rs2 = $db->execute($sql2);

$rpan	=$rs2->fields[4];
$rpri	=$rs2->fields[5];
$rpvem	=$rs2->fields[6];
$rna	=$rs2->fields[7];
$rcc1	=$rs2->fields[8];
$rcc2	=$rs2->fields[9];
$rVN = $rs2->fields[10];
$rTV = $rs2->fields[11];
$rLN = $rs2->fields[12];

	$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
	$datos[] = array('partido' => 'NA', 'votos' => $rna);
	if($vcc1 == 0) {
		$datos[] = array('partido' => 'PRI', 'votos' => $rpri);
		$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
	} else {
		$datos[] = array('partido' => 'CC1', 'votos' => $rcc1);
	}
	$datos[] = array('partido' => 'CC2', 'votos' => $rcc2);


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
	<center><br />
	<table border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" summary="">
    <th colspan="3">Redistritación 2012 - 2015</th>
    <tr align="center" style="font-weight:bold;"><td width="80px">2012</td><td width="100px">Modificado 2012</td><td width="80px">2015</td></tr>
    <tr align="center"><td><?php echo $srs->fields[0];?></td><td><?php echo $srs->fields[1];?></td><td><?php echo $srs->fields[2];?></td></tr>
    </table></center><?php }?><br />
<?php if($seccion==""){?>
	<div style="background-color:#FFF; border-style:solid; border-color:#000; border-width:1px;">
	Datos:

    <!--<a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',1,1,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2013)">Sección 2012</a> |
    <a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',1,1,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2013)">Sección 2015</a> |-->
    <a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',1,2,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2013)">Distrito 2012</a> |
    <a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',1,2,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2015)">Distrito 2015</a> |
<?php //}?>
    <a href="#" onClick="javascript:loadXMLDoc3('<?php echo $seccion; ?>','<?php echo $distrito; ?>',2,1,2,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2013)">PP</a>
	</div>

<!-- DIV DATOS -->
<div style="background-color:#FFF; border-style:solid; border-color:#000; border-width:1px; padding-left:10px;">
<?php

echo "Candidatura Comun<br/>". $texto ."";
echo "<table border='1'>";
echo "<tr style='background-color:#CCC'><td>Lugar</td><td>Partido</td><td>Votos</td><td>Dif#</td><td>Dif%</td><td>TV%</td></tr>";
if($vcc1 == 0) { $fin=5; }  else  { $fin=4; }
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
	echo "<tr><td>".($i+1).".- </td><td>".$datos[$i]['partido']." </td><td> ".number_format($datos[$i]['votos'],0)." </td><td>". number_format($difn,0) ."</td><td>". $difp ."</td><td>". $tvp ."</td>";

} //for
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
<?php }?>
</div>
</body>
</html>