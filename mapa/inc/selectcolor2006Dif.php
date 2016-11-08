<?php
if($partido == 'PAN') {
	if($difp>0 and $difp<=5) {$color='#819FF7'; }
	if($difp>5 and $difp<=10) {$color='#2E64FE'; }
	if($difp>10 and $difp<=20) {$color='#013ADF'; }
	if($difp>20) {$color='#08298A'; }
}
elseif($partido == 'C1') {
	if($difp>0 and $difp<=5) {$color='#FA5858'; }
	if($difp>5 and $difp<=10) {$color='#FF0000'; }
	if($difp>10 and $difp<=20) {$color='#DF0101'; }
	if($difp>20) {$color='#B40404'; }
}
elseif($partido == 'C2') {
	if($difp>0 and $difp<=5) {$color='#F4FA58'; }
	if($difp>5 and $difp<=10) {$color='#FFFF00'; }
	if($difp>10 and $difp<=20) {$color='#D7DF01'; }
	if($difp>20) {$color='#AEB404'; }
}
elseif($partido == 'NA') {
	if($difp>0 and $difp<=5) {$color='#2ECCFA'; }
	if($difp>5 and $difp<=10) {$color='#00BFFF'; }
	if($difp>10 and $difp<=20) {$color='#01A9DB'; }
	if($difp>20) {$color='#0489B1'; }
}
elseif($partido == 'PASC') {
	if($difp>0 and $difp<=5) {$color='#FA58F4'; }
	if($difp>5 and $difp<=10) {$color='#FF00FF'; }
	if($difp>10 and $difp<=20) {$color='#DF01D7'; }
	if($difp>20) {$color='#B404AE'; }
}
else { $color='#000'; }?>