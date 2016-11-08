<?php
if($partido == 'PAN') {
	if($difp>0 and $difp<=5) {$color='#819FF7'; }
	if($difp>5 and $difp<=10) {$color='#2E64FE'; }
	if($difp>10 and $difp<=20) {$color='#013ADF'; }
	if($difp>20) {$color='#08298A'; }
}
elseif($partido == 'CC2') {
	if($difp>0 and $difp<=5) {$color='#FACC2E'; }
	if($difp>5 and $difp<=10) {$color='#FFBF00'; }
	if($difp>10 and $difp<=20) {$color='#DBA901'; }
	if($difp>20) {$color='#B18904'; }
}
elseif($partido == 'PRD') {
	if($difp>0 and $difp<=5) {$color='#F4FA58'; }
	if($difp>5 and $difp<=10) {$color='#FFFF00'; }
	if($difp>10 and $difp<=20) {$color='#D7DF01'; }
	if($difp>20) {$color='#AEB404'; }
}
elseif($partido == 'PT') {
	if($difp>0 and $difp<=5) {$color='#CC2EFA'; }
	if($difp>5 and $difp<=10) {$color='#BF00FF'; }
	if($difp>10 and $difp<=20) {$color='#A901DB'; }
	if($difp>20) {$color='#8904B1'; }
}
elseif($partido == 'MC') {
	if($difp>0 and $difp<=5) {$color='#FE9A2E'; }
	if($difp>5 and $difp<=10) {$color='#FF8000'; }
	if($difp>10 and $difp<=20) {$color='#DF7401'; }
	if($difp>20) {$color='#B45F04'; }
}
elseif($partido == 'PRI' or $partido == 'CC1') {
	if($difp>0 and $difp<=5) {$color='#FA5858'; }
	if($difp>5 and $difp<=10) {$color='#FF0000'; }
	if($difp>10 and $difp<=20) {$color='#DF0101'; }
	if($difp>20) {$color='#B40404'; }
}
elseif($partido == 'PVEM') {
	if($difp>0 and $difp<=5) {$color='#00FF00'; }
	if($difp>5 and $difp<=10) {$color='#01DF01'; }
	if($difp>10 and $difp<=20) {$color='#04B404'; }
	if($difp>20) {$color='#088A08'; }
}
elseif($partido == 'NA') {
	if($difp>0 and $difp<=5) {$color='#2ECCFA'; }
	if($difp>5 and $difp<=10) {$color='#00BFFF'; }
	if($difp>10 and $difp<=20) {$color='#01A9DB'; }
	if($difp>20) {$color='#0489B1'; }
}
else { $color='#000'; }
?>