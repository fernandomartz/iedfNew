<?php
//Quinta
include('../../adodb/adodb.inc.php');
include('ConnIedf.inc');
$db = ADONewConnection('mysql'); # ej. 'mysql' o 'oci8'
$db->debug = false; // true o false
$conectado = mysqli_connect($servidor, $usuario, $password, $bd);
if(!$conectado) {echo "<br/>La Aplicación no se ha conecto a la Base de Datos<br/>";}
//else {echo "<br/>Conectado a la Base de Datos<br/>";}

//Cuatro
/*include('../adodb/adodb.inc.php');
include('../conn/ConnIedf.inc');
$db = ADONewConnection('mysql'); # ej. 'mysql' o 'oci8'
$db->debug = true; // true o false
$conectado = mysqli_connect($servidor, $usuario, $password, $bd);
//$conectado = $db->Connect($servidor, $usuario, $password, $bd);
if(!$conectado) {
	echo "<br/>La Aplicación no se ha conecto a la Base de Datos<br/>";
	} else {
		//echo "<br/>Conectado a la Base de Datos<br/>";
	}*/

//Tres
/*$conexion = mysql_connect("localhost", "root", "YoEl+21436587");
mysql_select_db("iedf", $conexion);

$queEmp = "SELECT * FROM dmr2012";
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

if ($totEmp> 0) {
   while ($rowEmp = mysql_fetch_assoc($resEmp)) {
      echo "<strong>".$rowEmp[0]."</strong><br>";
      echo "Direccion: ".$rowEmp[1]."<br>";
      echo "Telefono: ".$rowEmp[2]."<br><br>";
   }
}

//Dos
/*include('../adodb/adodb.inc.php');
$db = ADONewConnection('mysql'); # ej. 'mysql' o 'oci8'
$db->debug = true; // true o false
$conectado = $db->Connect('localhost', 'root', 'YoEl+21436587', 'iedf');
if(!$conectado) {echo "<br/>No se conecto a la Base de Datos<br/>";} else {echo "<br/>Conectado a la Base de Datos<br/>";}

$rs = $db->execute('select * from dmr2012');
/*
echo "<table>";
while(!$rs->EOF)
{
	echo "<tr><td>".$rs->fields[0]."</td><td>".$rs->fields[1]."</td><td>".$rs->fields[2]."</td><td>".$rs->fields[3]."</td></tr>";
	$rs->MoveNext();
}
echo "</table>";
*/

//Uno
/*include('../adodb/adodb.inc.php');
include('conn/ConnIedf.inc');
$db = ADONewConnection('mysql'); # ej. 'mysql' o 'oci8'
$db->debug = false; // true o false
$conectado = $db->Connect($servidor, $usuario, $password, $bd);
if(!$conectado) {echo "<br/>La Aplicación no se ha conecto a la Base de Datos<br/>";}*/
// else {echo "<br/>Conectado a la Base de Datos<br/>";}
?>