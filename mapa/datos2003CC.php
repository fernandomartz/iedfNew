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

//echo $distrito." ".$seccion."<br/>";
$sql = "select * from ". $tipoEleccion ."2003fp where distrito='".$distrito."' and seccion=".$seccion;
$rs = $db->execute($sql);
$del = $rs->fields[2];

// valores segun resultado
$del_name = array(0,1,"AZCAPOTZALCO","COYOACAN","CUAJIMALPA DE MORELOS","GUSTAVO A. MADERO","IZTACALCO","IZTAPALAPA","LA MAGDALENA CONTRERAS","MILPA ALTA","ALVARO OBREGON","TLAHUAC","TLALPAN","XOCHIMILCO","BENITO JUAREZ","CUAUHTEMOC","MIGUEL HIDALGO","VENUSTIANO CARRANZA");
$delx = $rs->fields[2];
$delnom = $del_name[$delx]; 


$sql2= "SELECT 1=1, 2=2, 3=3, COUNT( casilla ) , sum(pan), sum(pri), sum(prd), sum(pt), sum(pvem), sum(conv), sum(psn), sum(pas), sum(mp), sum(plm), sum(fc) ";
if($tipo==3){$sql2.= ", sum(cc1), sum(cc2), sum(cc3), sum(cc4) ";}
if($tipo==2){$sql2.= ", sum(cc5), sum(cc3), sum(cc1), sum(cc8), sum(cc2), sum(cc6), sum(cc7), sum(cc4), sum(cc9), sum(cc10), sum(cc11) ";}
$sql2.=", sum(blancos), sum(nulos), sum(votos), sum(lista) ";
$sql2.= " FROM ". $tipoEleccion ."2003fp ";

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
	$sql2= "SELECT 1=1, 2=2, 3=3, COUNT( casilla ) , sum(pan), sum(pri), sum(prd), sum(pt), sum(pvem), sum(conv), sum(psn), sum(pas), sum(mp), sum(plm), sum(fc) ";
	if($tipo==3){$sql2.= ", sum(cc1), sum(cc2), sum(cc3), sum(cc4) ";}
	if($tipo==2){$sql2.= ", sum(cc5), sum(cc3), sum(cc1), sum(cc8), sum(cc2), sum(cc6), sum(cc7), sum(cc4), sum(cc9), sum(cc10), sum(cc11) ";}
	$sql2.=", sum(blancos), sum(nulos), sum(votos), sum(lista) ";
	$sql2.= " FROM ". $tipoEleccion ."2003fp ";
	$texto.="en el DF:";
	}

//jd2003
//CC1 - PRI-PVEM-FC
//CC2 - PT-CONV-FC
//CC3 - PRI-FC
//CC4 - PT-MP
//CC5 - PRI-PVEM
//CC6 - PT-PVEM-CONV
//CC7 - PAS-FC
//CC8 - PT-CONV
//CC9 - CONV-PAS
//CC10- CONV-PLM
//CC11- PT-CONV-PAS-PLM

$rs2 = $db->execute($sql2);
$rpan      = $rs2->fields[4];
$rpri	  = $rs2->fields[5];
$rprd	  = $rs2->fields[6];
$rpt		= $rs2->fields[7];
$rpvem	  = $rs2->fields[8];
$rconv	  = $rs2->fields[9];
$rpsn	  = $rs2->fields[10];
$rpas	  = $rs2->fields[11];
$rmp	  	  = $rs2->fields[12];
$rplm	  = $rs2->fields[13];
$rfc	  	  = $rs2->fields[14];
$rcc1	  = $rs2->fields[15];
$rcc2	  = $rs2->fields[16];
$rcc3	  = $rs2->fields[17];
$rcc4	  = $rs2->fields[18];
if($tipo==2){
$rcc5	  = $rs2->fields[19];
$rcc6	  = $rs2->fields[20];
$rcc7	  = $rs2->fields[21];
$rcc8	  = $rs2->fields[22];
$rcc9	  = $rs2->fields[23];
$rcc10	  = $rs2->fields[24];
$rcc11	  = $rs2->fields[25];
$rblancos  = $rs2->fields[26];
$rVN	  = $rs2->fields[27];
$rTV	  = $rs2->fields[28];
$rLN   = $rs2->fields[29];
}else{
$rblancos  = $rs2->fields[19];
$rVN	  = $rs2->fields[20];
$rTV	  = $rs2->fields[21];
$rLN   = $rs2->fields[22];
}

$vcc=0;
if($tipo==2) {	
	if($delx==2){$vcc=2;}
	if($delx==3){$vcc=3;}
	if($delx==4){$vcc=5;}
	if($delx==5){$vcc=6;}
	if($delx==6){$vcc=8;}
	if($delx==7){$vcc=5;}
	if($delx==8){$vcc=9;}
	if($delx==9){$vcc=9;}
	if($delx==10){$vcc=1;}
	if($delx==11){$vcc=10;}
	if($delx==12){$vcc=11;}
	if($delx==15){$vcc=5;}
	if($delx==16){$vcc=3;}
	
	if($vcc == 0) {
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
			$datos[] = array('partido' => 'PRI', 'votos' => $rpri);
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PT', 'votos' => $rpt);
			$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
			$datos[] = array('partido' => 'CONV', 'votos' => $rconv);
			$datos[] = array('partido' => 'PSN', 'votos' => $rpsn);
			$datos[] = array('partido' => 'PAS', 'votos' => $rpas);
			$datos[] = array('partido' => 'MP', 'votos' => $rmp);
			$datos[] = array('partido' => 'PLM', 'votos' => $rplm);
			$datos[] = array('partido' => 'FC', 'votos' => $rfc);									
		} 
		elseif($vcc == 1) {//PRI-PVEM-FC
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);			
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PT', 'votos' => $rpt);
			$datos[] = array('partido' => 'CONV', 'votos' => $rconv);
			$datos[] = array('partido' => 'PSN', 'votos' => $rpsn);
			$datos[] = array('partido' => 'PAS', 'votos' => $rpas);
			$datos[] = array('partido' => 'MP', 'votos' => $rmp);
			$datos[] = array('partido' => 'PLM', 'votos' => $rplm);
			$datos[] = array('partido' => 'CC1', 'votos' => $rcc3);
		}
		elseif($vcc == 2) {//CC2 - PT-CONV-FC
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
			$datos[] = array('partido' => 'PRI', 'votos' => $rpri);
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
			$datos[] = array('partido' => 'PSN', 'votos' => $rpsn);
			$datos[] = array('partido' => 'PAS', 'votos' => $rpas);
			$datos[] = array('partido' => 'MP', 'votos' => $rmp);
			$datos[] = array('partido' => 'PLM', 'votos' => $rplm);
			$datos[] = array('partido' => 'CC2', 'votos' => $rcc5);	
		}
		elseif($vcc == 3) {//CC3 - PRI-FC
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PT', 'votos' => $rpt);
			$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
			$datos[] = array('partido' => 'CONV', 'votos' => $rconv);
			$datos[] = array('partido' => 'PSN', 'votos' => $rpsn);
			$datos[] = array('partido' => 'PAS', 'votos' => $rpas);
			$datos[] = array('partido' => 'MP', 'votos' => $rmp);
			$datos[] = array('partido' => 'PLM', 'votos' => $rplm);
			$datos[] = array('partido' => 'CC3', 'votos' => $rcc2);	
		}elseif($vcc == 5) {
			//CC4 - PT-MP
			//CC5 - PRI-PVEM
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'CONV', 'votos' => $rconv);
			$datos[] = array('partido' => 'PSN', 'votos' => $rpsn);
			$datos[] = array('partido' => 'PAS', 'votos' => $rpas);
			$datos[] = array('partido' => 'PLM', 'votos' => $rplm);
			$datos[] = array('partido' => 'FC', 'votos' => $rfc);	
			$datos[] = array('partido' => 'CC4', 'votos' => $rcc8);	
			$datos[] = array('partido' => 'CC5', 'votos' => $rcc1);								
		}elseif($vcc == 6) {
			//CC6 - PT-PVEM-CONV
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
			$datos[] = array('partido' => 'PRI', 'votos' => $rpri);
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PSN', 'votos' => $rpsn);
			$datos[] = array('partido' => 'PAS', 'votos' => $rpas);
			$datos[] = array('partido' => 'MP', 'votos' => $rmp);
			$datos[] = array('partido' => 'PLM', 'votos' => $rplm);
			$datos[] = array('partido' => 'FC', 'votos' => $rfc);	
			$datos[] = array('partido' => 'CC6', 'votos' => $rcc6);								
		}elseif($vcc == 8) {
			//CC7 - PAS-FC
			//CC8 - PT-CONV
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
			$datos[] = array('partido' => 'PRI', 'votos' => $rpri);
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
			$datos[] = array('partido' => 'PSN', 'votos' => $rpsn);
			$datos[] = array('partido' => 'MP', 'votos' => $rmp);
			$datos[] = array('partido' => 'PLM', 'votos' => $rplm);
			$datos[] = array('partido' => 'CC7', 'votos' => $rcc7);
			$datos[] = array('partido' => 'CC8', 'votos' => $rcc4);								
		}elseif($vcc == 9) {
			//CC9 - CONV-PAS			
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
			$datos[] = array('partido' => 'PRI', 'votos' => $rpri);
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PT', 'votos' => $rpt);
			$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
			$datos[] = array('partido' => 'PSN', 'votos' => $rpsn);
			$datos[] = array('partido' => 'MP', 'votos' => $rmp);
			$datos[] = array('partido' => 'PLM', 'votos' => $rplm);
			$datos[] = array('partido' => 'FC', 'votos' => $rfc);	
			$datos[] = array('partido' => 'CC9', 'votos' => $rcc9);								
		}elseif($vcc == 10) {	
			//CC10- CONV-PLM		
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
			$datos[] = array('partido' => 'PRI', 'votos' => $rpri);
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PT', 'votos' => $rpt);
			$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
			$datos[] = array('partido' => 'PSN', 'votos' => $rpsn);
			$datos[] = array('partido' => 'PAS', 'votos' => $rpas);
			$datos[] = array('partido' => 'MP', 'votos' => $rmp);
			$datos[] = array('partido' => 'FC', 'votos' => $rfc);	
			$datos[] = array('partido' => 'CC10', 'votos' => $rcc10);								
		}elseif($vcc == 11) {
			//CC11- PT-CONV-PAS-PLM			
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
			$datos[] = array('partido' => 'PRI', 'votos' => $rpri);
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
			$datos[] = array('partido' => 'PSN', 'votos' => $rpsn);
			$datos[] = array('partido' => 'MP', 'votos' => $rmp);
			$datos[] = array('partido' => 'FC', 'votos' => $rfc);	
			$datos[] = array('partido' => 'CC11', 'votos' => $rcc11);								
		}		
}else{
	if($distrito=='I' || $distrito=='X' || $distrito=='XIV' || $distrito=='XVIII' || $distrito=='XIX' || $distrito=='XXI' || $distrito=='XXIII' || $distrito=='XXIV' || $distrito=='XXVI'){ $vcc=1;}
	elseif($distrito=='XVII') { $vcc=3;}
	elseif($distrito=='VI' || $distrito=='XXX') { $vcc=2;}
	elseif($distrito=='XVI') { $vcc=4;}
	
	if($vcc == 0) {
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
			$datos[] = array('partido' => 'PRI', 'votos' => $rpri);
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PT', 'votos' => $rpt);
			$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
			$datos[] = array('partido' => 'CONV', 'votos' => $rconv);
			$datos[] = array('partido' => 'PSN', 'votos' => $rpsn);
			$datos[] = array('partido' => 'PAS', 'votos' => $rpas);
			$datos[] = array('partido' => 'MP', 'votos' => $rmp);
			$datos[] = array('partido' => 'PLM', 'votos' => $rplm);
			$datos[] = array('partido' => 'FC', 'votos' => $rfc);									
		} 
		elseif($vcc == 1) {
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);			
			$datos[] = array('partido' => 'PT', 'votos' => $rpt);
			$datos[] = array('partido' => 'CONV', 'votos' => $rconv);
			$datos[] = array('partido' => 'PSN', 'votos' => $rpsn);
			$datos[] = array('partido' => 'PAS', 'votos' => $rpas);
			$datos[] = array('partido' => 'MP', 'votos' => $rmp);
			$datos[] = array('partido' => 'PLM', 'votos' => $rplm);
			$datos[] = array('partido' => 'FC', 'votos' => $rfc);
			$datos[] = array('partido' => 'CC1', 'votos' => $rcc1);
		}
		elseif($vcc == 2) {
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);			
			$datos[] = array('partido' => 'PT', 'votos' => $rpt);
			$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
			$datos[] = array('partido' => 'CONV', 'votos' => $rconv);
			$datos[] = array('partido' => 'PSN', 'votos' => $rpsn);
			$datos[] = array('partido' => 'PAS', 'votos' => $rpas);
			$datos[] = array('partido' => 'MP', 'votos' => $rmp);
			$datos[] = array('partido' => 'PLM', 'votos' => $rplm);
			$datos[] = array('partido' => 'CC2', 'votos' => $rcc2);	
		}
		elseif($vcc == 3) {
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);			
			$datos[] = array('partido' => 'PT', 'votos' => $rpt);
			$datos[] = array('partido' => 'CONV', 'votos' => $rconv);
			$datos[] = array('partido' => 'PSN', 'votos' => $rpsn);
			$datos[] = array('partido' => 'PAS', 'votos' => $rpas);
			$datos[] = array('partido' => 'MP', 'votos' => $rmp);
			$datos[] = array('partido' => 'PLM', 'votos' => $rplm);
			$datos[] = array('partido' => 'CC3', 'votos' => $rcc3);	
		}elseif($vcc == 4) {
			$datos[] = array('partido' => 'PRD', 'votos' => $rprd);
			$datos[] = array('partido' => 'PAN', 'votos' => $rpan);
			$datos[] = array('partido' => 'PRI', 'votos' => $rpri);			
			$datos[] = array('partido' => 'PVEM', 'votos' => $rpvem);
			$datos[] = array('partido' => 'PSN', 'votos' => $rpsn);
			$datos[] = array('partido' => 'PAS', 'votos' => $rpas);
			$datos[] = array('partido' => 'MP', 'votos' => $rmp);
			$datos[] = array('partido' => 'PLM', 'votos' => $rplm);
			$datos[] = array('partido' => 'FC', 'votos' => $rfc);	
			$datos[] = array('partido' => 'CC4', 'votos' => $rcc4);								
		}
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
    <a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',1,1,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2003)">Sección</a> |
    <a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',1,2,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2003)">Distrito</a> |
    <a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',1,3,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2003)">Delegación</a> |
    <a href="#" onClick="javascript:loadXMLDoc2('<?php echo $seccion; ?>','<?php echo $distrito; ?>',1,4,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2003)">DF</a> |
    <a href="#" onClick="javascript:loadXMLDoc3('<?php echo $seccion; ?>','<?php echo $distrito; ?>',2,1,2,<?php echo aleatorio(); ?>,<?php echo $tipo; ?>, 2003)">PP</a>
	</div>

<!-- DIV DATOS -->
<div style="background-color:#FFF; border-style:solid; border-color:#000; border-width:1px; padding-left:10px;">
<?php

echo "Candidatura Comun<br/>". $texto ."";
echo "<table border='1'>";
echo "<tr style='background-color:#CCC'><td>Lugar</td><td>Partido</td><td>Votos</td><td>Dif#</td><td>Dif%</td><td>TV%</td></tr>";

if($tipo==2){
	if($vcc==0){$fin=11;}elseif($vcc==1||$vcc==2||$vcc==5||$vcc==6||$vcc==8){$fin=9;}elseif($vcc==3||$vcc==9||$vcc==10){$fin=10;}elseif($vcc==11){$fin=8;}
}else{
	if($vcc == 0){$fin=11;}elseif($vcc == 1){$fin=10;}elseif($vcc == 2){$fin=10;}elseif($vcc == 3){$fin=9;}elseif($vcc == 4){$fin=10;}
}

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
//echo "<br /><br /><br />".$sql."<br />".$sql2;
?>
<br/>
</div>

</div>
</body>
</html>