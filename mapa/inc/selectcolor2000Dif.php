<?php
if($partido == 'APC') {
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
elseif($partido == 'CDPPN') {
	if($difp>0 and $difp<=5) {$color='#FE9A2E'; }
	if($difp>5 and $difp<=10) {$color='#FF8000'; }
	if($difp>10 and $difp<=20) {$color='#DF7401'; }
	if($difp>20) {$color='#B45F04'; }
}
elseif($partido == 'PCD') {
	if($difp>0 and $difp<=5) {$color='#0396AD'; }
	if($difp>5 and $difp<=10) {$color='#0F8DA1'; }
	if($difp>10 and $difp<=20) {$color='#198494'; }
	if($difp>20) {$color='#006678'; }
}
elseif($partido == 'PSN') {
	if($difp>0 and $difp<=5) {$color='#8946A8'; }
	if($difp>5 and $difp<=10) {$color='#793599'; }
	if($difp>10 and $difp<=20) {$color='#622080'; }
	if($difp>20) {$color='#480863'; }
}
elseif($partido == 'PARM') {
	if($difp>0 and $difp<=5) {$color='#62D6AD'; }
	if($difp>5 and $difp<=10) {$color='#46BD93'; }
	if($difp>10 and $difp<=20) {$color='#2AA67A'; }
	if($difp>20) {$color='#009765'; }
}
elseif($partido == 'PAS') {
	if($difp>0 and $difp<=5) {$color='#8F4D4D'; }
	if($difp>5 and $difp<=10) {$color='#8F4040'; }
	if($difp>10 and $difp<=20) {$color='#8F2929'; }
	if($difp>20) {$color='#960303'; }
}
elseif($partido == 'DSPPN') {
	if($difp>0 and $difp<=5) {$color='#BD9E75'; }
	if($difp>5 and $difp<=10) {$color='#BD945E'; }
	if($difp>10 and $difp<=20) {$color='#BD873B'; }
	if($difp>20) {$color='#BD7B10'; }
}
elseif($partido == 'CC1') {
	if($difp>0 and $difp<=5) {$color='#E8CD8D'; }
	if($difp>5 and $difp<=10) {$color='#E8CB74'; }
	if($difp>10 and $difp<=20) {$color='#E8C55C'; }
	if($difp>20) {$color='#E8C141'; }
}
else { $color='#000'; }?>