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


if($tipo == 2) { $tipoEleccion = "jd"; }
if($tipo == 3) { $tipoEleccion = "dmr"; }
//jg no aplica para eleccion 2009

//echo $distrito." ".$seccion."<br/>";
$sql = "select * from ". $tipoEleccion ."2009fp where distrito='".$distrito."' and seccion=".$seccion;
$rs = $db->execute($sql);
$del = $rs->fields[2];

// valores segun resultado
$del_name = array(0,1,"AZCAPOTZALCO","COYOACAN","CUAJIMALPA DE MORELO","GUSTAVO A. MADERO","IZTACALCO","IZTAPALAPA","LA MAGDALENA CONTRERAS","MILPA ALTA","ALVARO OBREGON","TLAHUAC","TLALPAN","XOCHIMILCO","BENITO JUAREZ","CUAUHTEMOC","MIGUEL HIDALGO","VENUSTIANO CARRANZA");
$delx = $rs->fields[2];
$delnom = $del_name[$delx]; 


$sql2= "SELECT distrito, del, seccion, COUNT( casilla ) , SUM( pan ) , SUM( pri ) , SUM( prd ) , SUM( pt ) , SUM( pvem ) , SUM( conv ) , SUM( na ), SUM( psd ), 1=1 , SUM( cc1 ) , SUM( cc2 ) , SUM( nulos ) , SUM( votos ) , SUM( lista ) ";
if($tipo == 2) { $sql2.= " , SUM( cc3 ) , SUM( cc4 ) "; }
$sql2.= " FROM ". $tipoEleccion ."2009fp ";

$texto = "Posición por el número total de votos ";

if($dato == null) { $dato=1;}
if($dato==1) {
	$sql2.= " WHERE distrito = '".$distrito."' AND seccion = ".$seccion." GROUP BY seccion";
	$texto.="en la sección:";	
	}
if($dato==2) {
	$sql2.= " WHERE distrito = '".$distrito."' GROUP BY distrito";
	$texto.="en el distrito:";
	}
if($dato==3) {
	$sql2.= " WHERE del = '".$del."' GROUP BY del";
	$texto.="en la delegación:";
	}
if($dato==4) {
	$sql2= "SELECT 1=1, 2=2, 3=3, COUNT( casilla ) , SUM( pan ) , SUM( pri ) , SUM( prd ) , SUM( pt ) , SUM( pvem ) , SUM( conv ) , SUM( na ) , SUM( psd ) , 1=1 , SUM( cc1 ) , SUM( cc2 ) , SUM( nulos ) , SUM( votos ) , SUM( lista ) ";
	if($tipo == 2) { $sql2.= " , SUM( cc3 ) , SUM( cc4 ) "; }
	$sql2.= "FROM ". $tipoEleccion ."2009fp ";
	$texto.="en el DF:";
	}

//CANDIDATURAS COMUNES
//CC1 - Candidatura Común PRD_PT_Convergencia	DIS: IX,XVII,XX,XXVII,XXX
//CC2 - Candidatura Común PRD_Convergencia		DIS: XIV,XXI
$vcc=0;
if($tipo==3) {
	if($distrito=='IX' || $distrito=='XVII' || $distrito=='XX' || $distrito=='XXVII' || $distrito=='XXX') { $vcc=1;}
	if($distrito=='XIV' || $distrito=='XXI') { $vcc=2;}
}
if($tipo==2) {
	if($del==16 || $del==14 || $del==4 || $del==3) { $vcc=1;}
	if($del==2) { $vcc=2;}
	if($del==10 || $del==11 || $del==8) { $vcc=3;}
	if($del==17) { $vcc=4;}
}

		$rs2 = $db->execute($sql2);


$rpan	=$rs2->fields[4];
$rpri	=$rs2->fields[5];
$rprd	=$rs2->fields[6];
$rpt	=$rs2->fields[7];
$rpvem	=$rs2->fields[8];
$rconv	=$rs2->fields[9];
$rna	=$rs2->fields[10];
$rpsd	=$rs2->fields[11];
//$rcc	=$rs2->fields[12];

$rcc1	=$rs2->fields[13];
$rcc2	=$rs2->fields[14];

$rVN = $rs2->fields[15];
$rTV = $rs2->fields[16];
$rLN = $rs2->fields[17];

if($tipo == 2) {
$rcc3	=$rs2->fields[18];
$rcc4	=$rs2->fields[19];
}


		if($vcc == 0) {
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
			$datos[] = array('partido' => 'PRI', 'votos' => $rpri);
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PT', 'votos' => $rpt);
			$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
			$datos[] = array('partido' => 'CONV', 'votos' => $rconv);
			$datos[] = array('partido' => 'NA', 'votos' => $rna);
			$datos[] = array('partido' => 'PSD', 'votos' => $rpsd);
		} 
		elseif($vcc == 1) {
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
			$datos[] = array('partido' => 'PRI', 'votos' => $rpri);
			$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
			$datos[] = array('partido' => 'NA', 'votos' => $rna);
			$datos[] = array('partido' => 'PSD', 'votos' => $rpsd);
			$datos[] = array('partido' => 'CC1', 'votos' => $rcc1);
		}
		elseif($vcc == 2) {
		$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
		$datos[] = array('partido' => 'PRI', 'votos' => $rpri);
		$datos[] = array('partido' => 'PT', 'votos' => $rpt);
		$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
		$datos[] = array('partido' => 'NA', 'votos' => $rna);
		$datos[] = array('partido' => 'PSD', 'votos' => $rpsd);
		$datos[] = array('partido' => 'CC2', 'votos' => $rcc2);			
		}
		elseif($vcc == 3) {
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
			$datos[] = array('partido' => 'PRI', 'votos' => $rpri);
			$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
			$datos[] = array('partido' => 'CONV', 'votos' => $rconv);
			$datos[] = array('partido' => 'NA', 'votos' => $rna);
			$datos[] = array('partido' => 'PSD', 'votos' => $rpsd);
			$datos[] = array('partido' => 'CC3', 'votos' => $rcc3);			
		}
		elseif($vcc == 4) {
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
			$datos[] = array('partido' => 'PRI', 'votos' => $rpri);
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
			$datos[] = array('partido' => 'NA', 'votos' => $rna);
			$datos[] = array('partido' => 'PSD', 'votos' => $rpsd);
			$datos[] = array('partido' => 'CC4', 'votos' => $rcc4);			
		}

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
			echo "<h2>Sección: ".  $seccion . " - Distrito: ". $distrito ."</h2>"; 
			echo "<b>Delegación: ".$delnom."</b><br/>";
		?>
	</div>

<!-- DIV MENU DATOS -->
	<div style="background-color:#FFF; border-style:solid; border-color:#000; border-width:1px;">
	Datos:
    <a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',1,1,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2009)">Sección</a> |
    <a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',1,2,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2009)">Distrito</a> |
    <a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',1,3,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2009)">Delegación</a> |
    <a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',1,4,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2009)">DF</a> |
    <a href="#" onClick="javascript:loadXMLDoc3('<?php echo $seccion; ?>','<?php echo $distrito; ?>',2,1,2,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2009)">PP</a>
	</div>

<!-- DIV DATOS -->
<div style="background-color:#FFF; border-style:solid; border-color:#000; border-width:1px; padding-left:10px;">
<?php

echo "Candidatura Comun<br/>". $texto ."";
echo "<table border='1'>";
echo "<tr style='background-color:#CCC'><td>Lugar</td><td>Partido</td><td>Votos</td><td>Dif#</td><td>Dif%</td><td>TV%</td></tr>";

if($tipo==2)
	if($vcc == 0) { $fin=8; }  elseif($vcc == 1)  { $fin=6; } else { $fin=7; }
if($tipo==3)
	if($vcc == 0) { $fin=8; }  elseif($vcc == 1)  { $fin=6; } elseif($vcc == 2)  { $fin=7; }

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


?>
<br/>
</div>

</div>
</body>
</html>