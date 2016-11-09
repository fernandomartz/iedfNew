<?php
include('adodb/adodb.inc.php');
include('conn/ConnIedf.inc');
$db = ADONewConnection('mysql'); # ej. 'mysql' o 'oci8'
$db->debug = false; // true o false
$conectado = $db->Connect($servidor, $usuario, $password, $bd);
if(!$conectado) {echo "<br/>La Aplicación no se ha conecto a la Base de Datos<br/>";}
// else {echo "<br/>Conectado a la Base de Datos<br/>";}

?>