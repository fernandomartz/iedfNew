<?php
error_reporting(E_ERROR);
include("config/conn.php");

$distrito = $_GET['distrito'];
$distrito = 'V';
//$seccion = $_GET['seccion'];

//echo $distrito." ".$seccion."<br/>";
//$sql = "select * from dmr2012fp where distrito='".$distrito."' and seccion=".$seccion;


$sql2= "
SELECT distrito, del, seccion, COUNT( casilla ) , SUM( pan ) , SUM( pri ) , SUM( prd ) , SUM( pvem ) , SUM( pt ) , SUM( mc ) , SUM( na ) , SUM( morena ) , SUM( ph ) , SUM( es ) , SUM( cc1 ) , SUM( cc2 ) , SUM( cc3 ) , SUM( cc4 ) , SUM( nulos ) , SUM( votos ) , SUM( lista )
FROM dmr2015fp
WHERE distrito = '".$distrito."'

GROUP BY seccion";
//AND seccion = ".$seccion."
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Estadistica por Fuerza Politica</title>
    </head>
<body>
<?php
	echo "<h2>Distrito: ". $distrito ."</h2>";

	 echo $sql."<br/>";

		/*$sqlcc= "SELECT * FROM dmr2012discc WHERE distrito='".$distrito."'";
		$rscc = $db->execute($sqlcc);
		$vcc1 = $rscc->fields[2];		//verificar candidatura comun PRI - PVEM
		*/
		$rs2 = $db->execute($sql2);


while(!$rs2->EOF)
{
	echo "<h2>Seccion: ".  $rs2->fields[2] ."</h2>";
$xdel = $rs2->fields[1];
$xseccion = $rs2->fields[2];


	//	$rs = $db->execute($sql);
		$tabla = "<table border=1>";
		$tabla .= "<tr>
			<td>Distrito</td>
			<td>Delegacion</td>
			<td>Seccion</td>
			<td>Casilla</td>";
			if($vcc1 == 0) {
				$tabla .="
					<td>PAN</td>
					<td>PRI</td>
					<td>PRD</td>
					<td>PVEM</td>
					<td>PT</td>
					<td>MC</td>
					<td>NA</td>
					<td>MORENA</td>
					<td>PH</td>
					<td>ES</td>
					<td>CC1</td>
					<td>CC2</td>
					<td>CC3</td>
					<td>CC4</td>";
			} else {
				$tabla .="
					<td>PAN</td>
					<td>PRI</td>
					<td>PRD</td>
					<td>PVEM</td>
					<td>PT</td>
					<td>MC</td>
					<td>NA</td>
					<td>MORENA</td>
					<td>PH</td>
					<td>ES</td>
					<td>CC1</td>
					<td>CC2</td>
					<td>CC3</td>
					<td>CC4</td>>";
			}
		$tabla .= "<td>V.Nulos</td>
			<td>T.Votos</td>
			<td>L.Nominal</td>
			</tr>";

		echo $tabla;

			$tabla3 = "<tr>
			<td colspan='3'>Totales</td>
			<td>".$rs2->fields[3]."</td>";
			if($vcc1 == 0) {
			$tabla3 .= "
			<td>".$rs2->fields[4]."</td>
			<td>".$rs2->fields[5]."</td>
			<td>".$rs2->fields[6]."</td>
			<td>".$rs2->fields[7]."</td>
			<td>".$rs2->fields[8]."</td>
			<td>".$rs2->fields[9]."</td>
			<td>".$rs2->fields[10]."</td>
			<td>".$rs2->fields[11]."</td>
			<td>".$rs2->fields[12]."</td>
			<td>".$rs2->fields[13]."</td>
			<td>".$rs2->fields[14]."</td>";
			} else {
			$tabla3 .= "
			<td>".$rs2->fields[4]."</td>
			<td>".$rs2->fields[5]."</td>
			<td>".$rs2->fields[6]."</td>
			<td>".$rs2->fields[7]."</td>
			<td>".$rs2->fields[8]."</td>
			<td>".$rs2->fields[9]."</td>
			<td>".$rs2->fields[10]."</td>
			<td>".$rs2->fields[11]."</td>
			<td>".$rs2->fields[12]."</td>
			<td>".$rs2->fields[13]."</td>
			<td>".$rs2->fields[14]."</td>";
			}
			$tabla3 .= "<td>".$rs2->fields[15]."</td>
			<td>".$rs2->fields[16]."</td>
			<td>".$rs2->fields[17]."</td>
			</tr>";
		echo $tabla3;
		echo "</table>";

		// valores segun resultado
		$rpan	=$rs2->fields[4];
		$rpri	=$rs2->fields[5];
		$rprd   =$rs2->fields[6];
		$rpvem	=$rs2->fields[7];
		$rpt 	=$rs2->fields[8];
		$rmc    =$rs2->fields[9];
		$rna	=$rs2->fields[7];
		$rmorena =$rs2->fields[8];
		$rph    =$rs2->fields[9];
		$res    =$rs2->fields[10];
		$rcc1	=$rs2->fields[11];
		$rcc2	=$rs2->fields[12];
		$rcc3   =$rs2->fields[13];
		$rcc4   =$rs2->fields[14];
		$rVN = $rs2->fields[15];
		$rTV = $rs2->fields[16];
		$rLN = $rs2->fields[17];

		unset($datos);

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
		echo "<br/>Posición por numero total de votos en la seccion:<br/>";
		echo "<table border=1>";
		echo "<tr><td>Lugar</td><td>Partido</td><td>Votos</td><td>Dif#</td><td>Dif%</td><td>TV%</td></tr>";

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

			$xlugar = $i+1;
			$xpartido = $datos[$i]['partido'];
			$xvotos = $datos[$i]['votos'];

			echo "<tr><td>".($i+1).".- </td><td>".$datos[$i]['partido']." </td><td> ".$datos[$i]['votos']." </td><td>". $difn ."</td><td>". $difp ."</td><td>". $tvp ."</td>";

		$sql3 = "insert into dmr2015diffp (distrito,del,seccion,lugar,partido,votos,difn,difp,tvp) ";
		$sql3 .= "values ('".$distrito."'"; 	//distrito
		$sql3 .= ",".$xdel;						//delegacion
		$sql3 .= ",".$xseccion;					//seccion
		$sql3 .= ",".$xlugar;					//lugar
		$sql3 .= ",'".$xpartido."'";			//partido
		$sql3 .= ",".$xvotos;					//votos
		$sql3 .= ",".$difn;						//difn
		$sql3 .= ",".$difp;						//difp
		$sql3 .= ",".$tvp.")";					//tvp

		echo $sql3."<br/>";

		if ($db->Execute($sql3) === false) {
			print 'error al insertar: '.$db->ErrorMsg().'<BR>';
		}


		} //for
		echo "</table><br/>";

		
			$rs2->MoveNext();
		}



?>
<br/>
</body>
</html>