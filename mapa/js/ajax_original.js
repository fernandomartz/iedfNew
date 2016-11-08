function loadXMLDoc(seccion, distrito, tipo, anio)
{
var xmlhttp;
var cadena;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("datos").innerHTML=xmlhttp.responseText;
    }
  }
  if(datos==1)  { cadena= "datos"+anio+"CC"; } else { cadena= "datos"+anio+"PP"; }

var url = cadena+".php?distrito="+distrito+"&seccion="+seccion+"&tipo="+tipo+"&anio="+anio;
//alert(url);
xmlhttp.open("GET",url,true);
xmlhttp.send();
}

function loadXMLDoc2(seccion, distrito, datos, dato, ram, tipo, anio)
{
var xmlhttp;
var cadena;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("datos").innerHTML=xmlhttp.responseText;
    }
  }
  if(datos==1)  { cadena= "datos"+anio+"CC"; } else { cadena= "datos"+anio+"PP"; }

ran = Math.floor((Math.random()*10000000000)+1);
var url = cadena+".php?distrito="+distrito+"&seccion="+seccion+"&dato="+dato+"&ram="+ran+"&tipo="+tipo+"&anio="+anio;
//alert("2 "+url);
xmlhttp.open("GET",url,true);
xmlhttp.send();
}

function loadXMLDoc3(seccion, distrito, datos, dato, ruta, ram, tipo, anio)
{
var xmlhttp;
var cadena;
var ran;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("datos").innerHTML=xmlhttp.responseText;
    }
  }
  if(ruta==1)  { cadena= "datos"+anio+"CC"; } else { cadena= "datos"+anio+"PP"; }
ran = Math.floor((Math.random()*10000000000)+1);
var url = cadena+".php?distrito="+distrito+"&seccion="+seccion+"&dato="+dato+"&ram="+ran+"&tipo="+tipo+"&anio="+anio;
//alert("3 "+url);
xmlhttp.open("GET",url,true);
xmlhttp.send();
}




