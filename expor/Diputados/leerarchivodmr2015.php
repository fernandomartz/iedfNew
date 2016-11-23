<?php
//CONEXION BD
include("../../../adodb/adodb.inc.php");
$db = ADONewConnection("mysql");
$db->debug = "true";
$conectado = $db->Connect("localhost", "root", "123", "iedf");
if(!$conectado) {echo "<br/>No se conecto a la Base de Datos<br/>";
 } else {
 	echo "<br/>Conectado a la Base de Datos<br/>";
}
$cantidad=999;

//Verifica que la Tabla este Vacia
$rs0 = $db->execute("select count(*) from dmr2015");
$cantidad=$rs0->fields[0];
echo "Registro existentes en la Tabla: ".$cantidad."<br/>";

if($cantidad < 1)
{

	//Abrir archivo
	$file = fopen("../../2015/Diputados/dmr2015.csv", "r") or exit("Unable to open file!");
	$total_lineas=0;
	//Recorrer el archivo linea por linea.
	while(!feof($file))
	{

		$cadena = fgets($file);
		//Dividir en un arreglo los valores de la fila
		$arreglo = explode(",", $cadena);
			//echo $total_lineas ." ". fgets($file). "<br />"; // Muestra los datos de la base de datos
		if($total_lineas==0)
		{
			echo "Salta<br/>";
		} else {

			//dmr2015
			//DIS,DEL,SECC,CASILLA,PAN,PRI,PRD,PVEM,PT,MC,NA,MORENA,PH,ES,CC1,CC2,CC3,CC4,NULOS,VOTOS,LISTA
			//0   1    2   3       4   5   6   7    8  9  10 11     12 13 14  15  16  17  18    19    20   
	  		$sql = "insert into dmr2015 (distrito,del,seccion,casilla,pan,pri,prd,pvem,pt,mc,na,morena,ph,es,cc1,cc2,cc3,cc4,nulos,votos,lista) ";
			$sql .= "values ('".$arreglo[0]."'"; //distrito
			$sql .= ",".$arreglo[1];		//del
			$sql .= ",".$arreglo[2];		//seccion
			$sql .= ",'".$arreglo[3]."'";	//casilla
			$sql .= ",".$arreglo[4];		//PAN
			$sql .= ",".$arreglo[5];		//PRI
			$sql .= ",".$arreglo[6];		//PRD
			$sql .= ",".$arreglo[7];		//PVEM
			$sql .= ",".$arreglo[8];		//PT
			$sql .= ",".$arreglo[9];		//MC
			$sql .= ",".$arreglo[10];		//NA
			$sql .= ",".$arreglo[11]; 		//MORENA
			$sql .= ",".$arreglo[12];		//PH
			$sql .= ",".$arreglo[13];		//ES
			$sql .= ",".$arreglo[14];		//CC1
			$sql .= ",".$arreglo[15];		//CC2
			$sql .= ",".$arreglo[16];       //CC3
			$sql .= ",".$arreglo[17];		//CC4
			$sql .= ",".$arreglo[18];		//nulos
			$sql .= ",".$arreglo[19];		//votos
			$sql .= ",".$arreglo[20].")";	//lista


			//echo $total_lineas ." ". $arreglo[16]. "<br />";
			//echo $sql. "<br />";

			// Verificar si la base de datos inserto los los registros
			if ($db->Execute($sql) === false) { 
				print 'error al insertar: '.$db->ErrorMsg().'<BR>';
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