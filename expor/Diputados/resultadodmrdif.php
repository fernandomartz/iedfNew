<?php
//CONEXION BD
include("../../../adodb/adodb.inc.php");
$db = ADONewConnection("mysql");
$db->debug = "true";
$conectado = $db->Connect("localhost", "root", "123", "iedf");
if(!$conectado) {
	echo "<br/>No se conecto a la Base de Datos<br/>";
 } else {
 	echo "<br/>Conectado a la Base de Datos<br/>";
}
$cantidad=999;

//Verifica que la Tabla este Vacia
$rs0 = $db->execute("select count(*) from dmr2015diffp");
$cantidad=$rs0->fields[0];
echo "Registro existentes en la Tabla: ".$cantidad."<br/>";

if($cantidad < 1)
{
	//Recorrer el archivo linea por linea.
	while(!feof($file))
	{

		$cadena = fgets($file);
		//Dividir en un arreglo los valores de la fila
		$arreglo = explode(",", $cadena);
			//echo $total_lineas ." ". fgets($file). "<br />"; // Muestra los datos de la base de datos
		if($total_lineas==-1)
		{
			echo "Salta<br/>";
		} else {

			$sql= "SELECT * FROM dmr2015 ORDER BY distrito, seccion, casilla";
			$rs = $db->execute($sql);

			while(!$rs->EOF)
			{
				$distrito = $rs->fields[1];
				$del 	  =	$rs->fields[2];
				$seccion  = $rs->fields[3];
				$casilla  = $rs->fields[4];
				$pan      = $rs->fields[5];
				$pri	  = $rs->fields[6];
				$prd	  = $rs->fields[7];
				$pt		  = $rs->fields[8];
				$pvem	  = $rs->fields[9];
				$mc		  = $rs->fields[10];
				$na		  = $rs->fields[11];
				$cc1	  = $rs->fields[12];
				$cc2	  = $rs->fields[13];
				$nulos	  = $rs->fields[14];
				$votos	  = $rs->fields[15];
				$lista	  = $rs->fields[16];


				$sql3 = "insert into dmr2015diffp (distrito,del,seccion,casilla,pan,pri,pvem,na,cc1,cc2,nulos,votos,lista) ";
				$sql3 .= "values ('".$distrito."'"; 	//distrito
				$sql3 .= ",".$del;						//delegacion
				$sql3 .= ",".$seccion;					//seccion
				$sql3 .= ",'".$casilla."'";				//casilla

				$sql3 .= ",".$pan;						//pan
				$sql3 .= ",".$vpri;						//pri
				$sql3 .= ",".$vpvem;					//pvem
				$sql3 .= ",".$na;						//na
				$sql3 .= ",".$sumcc1;					//cc1 - PRI - PVEM
				$sql3 .= ",".$sumcc2;					//cc2 - PRD, PT, MC

				$sql3 .= ",".$nulos;					//nulos
				$sql3 .= ",".$votos;					//votos
				$sql3 .= ",".$lista.")";				//lista

				//echo $sql3."<br/>";

				if ($db->Execute($sql3) === false) {
					print 'error al insertar: '.$db->ErrorMsg().'<BR>';
				}

				$rs->MoveNext();
			}
		} //if - Saltar

	// Contar el total de registros
	$total_lineas++;
	} //While

fclose($file);

} //if

$total_lineas = $total_lineas - 1;
echo "Total de Registros: ". $total_lineas;
?>