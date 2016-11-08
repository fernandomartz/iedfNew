<?php
if($partido == 'PAN') {
	if($difp>0 and $difp<=5) {$color='#819FF7'; }
	if($difp>5 and $difp<=10) {$color='#2E64FE'; }
	if($difp>10 and $difp<=20) {$color='#013ADF'; }
	if($difp>20) {$color='#08298A'; }
}
elseif($partido == 'PRI') {
	if($difp>0 and $difp<=5) {$color='#FA5858'; }
	if($difp>5 and $difp<=10) {$color='#FF0000'; }
	if($difp>10 and $difp<=20) {$color='#DF0101'; }
	if($difp>20) {$color='#B40404'; }
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
elseif($partido == 'PVEM') {
	if($difp>0 and $difp<=5) {$color='#00FF00'; }
	if($difp>5 and $difp<=10) {$color='#01DF01'; }
	if($difp>10 and $difp<=20) {$color='#04B404'; }
	if($difp>20) {$color='#088A08'; }
}
elseif($partido == 'CONV') {
	if($difp>0 and $difp<=5) {$color='#FE9A2E'; }
	if($difp>5 and $difp<=10) {$color='#FF8000'; }
	if($difp>10 and $difp<=20) {$color='#DF7401'; }
	if($difp>20) {$color='#B45F04'; }
}
elseif($partido == 'PSN') {
	if($difp>0 and $difp<=5) {$color='#8946A8'; }
	if($difp>5 and $difp<=10) {$color='#793599'; }
	if($difp>10 and $difp<=20) {$color='#622080'; }
	if($difp>20) {$color='#480863'; }
}
elseif($partido == 'PAS') {
	if($difp>0 and $difp<=5) {$color='#8F4D4D'; }
	if($difp>5 and $difp<=10) {$color='#8F4040'; }
	if($difp>10 and $difp<=20) {$color='#8F2929'; }
	if($difp>20) {$color='#960303'; }
}
elseif($partido == 'MP') {
	if($difp>0 and $difp<=5) {$color='#B0E086'; }
	if($difp>5 and $difp<=10) {$color='#B0E05C'; }
	if($difp>10 and $difp<=20) {$color='#AFE034'; }
	if($difp>20) {$color='#B2E605'; }
}
elseif($partido == 'PLM') {
	if($difp>0 and $difp<=5) {$color='#EEBCAA'; }
	if($difp>5 and $difp<=10) {$color='#EEA48B'; }
	if($difp>10 and $difp<=20) {$color='#EE855E'; }
	if($difp>20) {$color='#EE6533'; }
}
elseif($partido == 'FC') {
	if($difp>0 and $difp<=5) {$color='#FCD49F'; }
	if($difp>5 and $difp<=10) {$color='#FFC87F'; }
	if($difp>10 and $difp<=20) {$color='#FFB95D'; }
	if($difp>20) {$color='#FFAB2E'; }
}
//Faltan los colores de las candidaturas comunes
elseif($partido == 'CC1') {
	if($difp>0 and $difp<=5) {$color='#FA5858'; }
	if($difp>5 and $difp<=10) {$color='#FF0000'; }
	if($difp>10 and $difp<=20) {$color='#DF0101'; }
	if($difp>20) {$color='#B40404'; }
}
elseif($partido == 'CC2') {
	if($difp>0 and $difp<=5) {$color='#FA5858'; }
	if($difp>5 and $difp<=10) {$color='#FF0000'; }
	if($difp>10 and $difp<=20) {$color='#DF0101'; }
	if($difp>20) {$color='#B40404'; }
}
elseif($partido == 'CC3') {
	if($difp>0 and $difp<=5) {$color='#FA5858'; }
	if($difp>5 and $difp<=10) {$color='#FF0000'; }
	if($difp>10 and $difp<=20) {$color='#DF0101'; }
	if($difp>20) {$color='#B40404'; }
}
elseif($partido == 'CC4') {
	if($difp>0 and $difp<=5) {$color='#CC2EFA'; }
	if($difp>5 and $difp<=10) {$color='#BF00FF'; }
	if($difp>10 and $difp<=20) {$color='#A901DB'; }
	if($difp>20) {$color='#8904B1'; }
}
elseif($partido == 'CC5') {
	if($difp>0 and $difp<=5) {$color='#CC2EFA'; }
	if($difp>5 and $difp<=10) {$color='#BF00FF'; }
	if($difp>10 and $difp<=20) {$color='#A901DB'; }
	if($difp>20) {$color='#8904B1'; }
}
elseif($partido == 'CC6') {
	if($difp>0 and $difp<=5) {$color='#CC2EFA'; }
	if($difp>5 and $difp<=10) {$color='#BF00FF'; }
	if($difp>10 and $difp<=20) {$color='#A901DB'; }
	if($difp>20) {$color='#8904B1'; }
}
elseif($partido == 'CC7') {
	if($difp>0 and $difp<=5) {$color='#8F4D4D'; }
	if($difp>5 and $difp<=10) {$color='#8F4040'; }
	if($difp>10 and $difp<=20) {$color='#8F2929'; }
	if($difp>20) {$color='#960303'; }
}
elseif($partido == 'CC8') {
	if($difp>0 and $difp<=5) {$color='#CC2EFA'; }
	if($difp>5 and $difp<=10) {$color='#BF00FF'; }
	if($difp>10 and $difp<=20) {$color='#A901DB'; }
	if($difp>20) {$color='#8904B1'; }
}
elseif($partido == 'CC9') {
	if($difp>0 and $difp<=5) {$color='#FE9A2E'; }
	if($difp>5 and $difp<=10) {$color='#FF8000'; }
	if($difp>10 and $difp<=20) {$color='#DF7401'; }
	if($difp>20) {$color='#B45F04'; }
}
elseif($partido == 'CC10') {
	if($difp>0 and $difp<=5) {$color='#FE9A2E'; }
	if($difp>5 and $difp<=10) {$color='#FF8000'; }
	if($difp>10 and $difp<=20) {$color='#DF7401'; }
	if($difp>20) {$color='#B45F04'; }
}
elseif($partido == 'CC11') {
	if($difp>0 and $difp<=5) {$color='#CC2EFA'; }
	if($difp>5 and $difp<=10) {$color='#BF00FF'; }
	if($difp>10 and $difp<=20) {$color='#A901DB'; }
	if($difp>20) {$color='#8904B1'; }
}
else { $color='#000'; }

?>